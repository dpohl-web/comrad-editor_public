import { Injectable, EventEmitter } from '@angular/core';
import { HttpClient, HttpParams } from '@angular/common/http';
import { HttpHeaders } from '@angular/common/http';

import { Observable, forkJoin, of } from 'rxjs';
import { catchError, map } from 'rxjs/operators';
import { cloneDeep } from 'lodash';

import { HttpErrorHandler, HandleError } from './http-error-handler.service';
import * as Confs from '../config.js';
import { HeaderFormData, QuestData, AdditionlInfosFromBackend } from './interfaces';
import { MatSnackBar } from '@angular/material/snack-bar';

import { TranslateService } from '@ngx-translate/core';
import { environment } from 'src/environments/environment';
const isProduction = environment.production;

export interface QuestFilenamesParams {
	key: string;
	value: string;
}

export interface TooglePanelParams {
	mode: string;
}

const prodHeaders = {
	headers: new HttpHeaders({
		'Content-Type': 'application/x-www-form-urlencoded',
        // X-WP-Nonce wird in PHP via wp_localize_script() übergeben:
        'X-WP-Nonce': (window as any).__QUESTIONNAIRE_ANGULAR_INITIAL_STATE__.nonce,
	}),
	//   params: null,
	withCredentials: true
};

const devHeaders = {
	headers: new HttpHeaders({
		'Content-Type': 'application/x-www-form-urlencoded',
	}),
};
const httpOptions = isProduction ? prodHeaders : devHeaders;

@Injectable({
	providedIn: 'root',
})
export class HeroesService {
	heroesUrl = Confs.QUEST_URL; // URL to the quest data json
	// createOrDeleteXmlUrl = Confs.CREATE_OR_DELETE_XML; // URL to the quest data json

	emitQuestionnaireData = new EventEmitter<any>();
	emitGeneralFormValidInfo = new EventEmitter<boolean>();
	emitLanguageChangeEvent = new EventEmitter<void>();
	allSegmentsLoaded = new EventEmitter<void>();
	questFileName = new EventEmitter<string>();
	sendFormValidStatus = new EventEmitter<any>();
	additionalBackendInfos: AdditionlInfosFromBackend = {
		is_compare: false,
		is_recommendations: false
	};
	questionnaireData;
	questNames;
	headerFormIsValid = false;
	mainFormIsValid = false;
	footerFormIsValid = false;
	resultFormIsValid = false;
	finishFormGroupIsValid = false;
	languageFormGroupIsValid = false;
	saveFormEvent = new EventEmitter<string>();
	emitTheme = new EventEmitter<string>();
	themeMode = 'my-theme';
	surveyIsSaved = new EventEmitter<boolean>();
	appLanguageEvent = new EventEmitter<string>();
	appLanguage = 'en';
	saveSpinner = { show: false };
	userIsAdmin: boolean = (<any>window).__QUESTIONNAIRE_ANGULAR_INITIAL_STATE__.userIsAdmin === '1' ? true : false;
	userIsEditor: boolean = (<any>window).__QUESTIONNAIRE_ANGULAR_INITIAL_STATE__.userIsEditor === '1' ? true : false;

	constructor(
		private http: HttpClient,
		httpErrorHandler: HttpErrorHandler,
		private snackBar: MatSnackBar,
		private translate: TranslateService
	) {
		this.handleError = httpErrorHandler.createHandleError('HeroesService');
	}

	private generalLoaded = false;
	private headerLoaded = false;
	private mainLoaded = false;
	private resultLoaded = false;
	private handleError: HandleError;

	allSegmentsLoadedInformer(segment: string): void {
		switch (segment) {
			case 'general':
				this.generalLoaded = true;
				break;
			case 'header':
				this.headerLoaded = true;
				break;
			case 'main':
				this.mainLoaded = true;
				break;
			case 'result':
				this.resultLoaded = true;
				break;
			default:
				break;
		}
		if (this.generalLoaded && this.headerLoaded && this.mainLoaded && this.resultLoaded) {
			this.generalLoaded = false;
			this.headerLoaded = false;
			this.mainLoaded = false;
			this.resultLoaded = false;
			this.allSegmentsLoaded.emit();
		}
	}

	/** GET heroes from the server */
	getQuestList(param?: QuestFilenamesParams[]): Observable<any> {
		let params = new HttpParams();
		if (param) {
			param.forEach(oneParam => {
				params = params.append(oneParam.key, oneParam.value);
			});
		}
		console.log('getquestlist');
		return this.http
			.get<any>(Confs.QUEST_LIST_URL, { params, ...httpOptions })
			.pipe(
				map(response => {
					// NOTE: response is of type SomeType
					console.log('map');
					console.log(response);
					const trimmedQuestNames = response.map(questName => {
						const newQuestName = questName.substring(0, questName.indexOf('.xml'));
						const value = { value: newQuestName, viewValue: newQuestName };
						return value;
					});
					return trimmedQuestNames;
				}),
				catchError(this.handleError('getQuestList', []))
			);
	}

	/** GET additional infos from te backend. If plugins are missing, convert the response object*/
	getAdditinalInfos(): Observable<any> {
		console.log('additional infos before #########');
		const additionalInfosParams = new HttpParams().set('infos', 'true');
		return this.http.post<any>(this.heroesUrl, additionalInfosParams, httpOptions ).pipe(
			map((response: AdditionlInfosFromBackend) => {
				this.additionalBackendInfos.is_compare = typeof(response.is_compare) === 'undefined' ? false : response.is_compare;
				this.additionalBackendInfos.is_recommendations = typeof(response.is_recommendations) === 'undefined'? false : response.is_recommendations;
			}),
			catchError(this.handleError('getAdditinalInfos', []))
		);
	}

	//   POST: add a new hero to the database */
	getQuest(questName: any, template?: boolean): Observable<any> {
		const folder = template ? 'xmlTemplates' : 'xmlfiles';
		const params = new HttpParams().set('name', questName).set('folder', folder);
		const metaDataParams = new HttpParams().set('name', questName).set('folder', 'datafiles');
		const getQuestData = this.http.post<any>(this.heroesUrl, params, httpOptions );
		const getQuestMetaData = this.http.post<any>(this.heroesUrl, metaDataParams, httpOptions );

		return forkJoin([getQuestData, getQuestMetaData]).pipe(
			map(response => {
				this.questFileName.emit(questName);
				// return the modified data:
				return this.dataConverter(response[0], response[1]); // kind of useless
			}),
			catchError(this.handleError('getQuest', questName))
		);

	}

	emitQuestData(questData): void {
		this.questionnaireData = questData;
		this.emitQuestionnaireData.emit(this.questionnaireData);
	}

	emitLanguageChange(): void {
		this.emitLanguageChangeEvent.emit();
	}

	emitAppLanguageChange(language: string): void {
		this.appLanguageEvent.emit(language);
	}

	emitQuestLanguage(languageData, defaultLanguage) {
		console.log('this.questionnaireData.config.language');
		console.log(this.questionnaireData.config.language);

		console.log('defaultLanguage');
		console.log(defaultLanguage);

		console.log('languageData');
		console.log(languageData);
		this.questionnaireData.config.language.languages = languageData;
		this.questionnaireData.config.language.default = defaultLanguage;
		// console.log('this.questionnaireData.config.language');
		// console.log(this.questionnaireData.config.language);

		this.emitQuestionnaireData.emit(this.questionnaireData);
	}

	generalInfoIsValidEmitter(bool) {
		this.emitGeneralFormValidInfo.emit(bool);
	}

	themeEmitter(value: string): void {
		this.themeMode = value;
		this.emitTheme.emit(value);
	}

	dataConverter(data, metaData) {
		data = JSON.parse(JSON.stringify(data).replace(/"\s+|\s+"/g, '"'));
		metaData = JSON.parse(JSON.stringify(metaData).replace(/"\s+|\s+"/g, '"'));
		data.metaData = metaData;

		if (data.config.language.languages instanceof Array === false) {
			data.config.language.languages = [{ ...data.config.language.languages }];
		}

		if (data.config.graphs.graphSwitchOptions.options instanceof Array === false) {
			data.config.graphs.graphSwitchOptions.options = [data.config.graphs.graphSwitchOptions.options];
		}

        // Create fallback for old ownbar.
        const indexOfOwnbar = data.config.graphs.graphSwitchOptions.options.indexOf('ownbar');
        if (indexOfOwnbar !== -1) {
            data.config.graphs.graphSwitchOptions.options.splice(indexOfOwnbar, 1);
        }

		// data.number_of_blocks_overall = 0;
		if (data.categories instanceof Array === false) {
			const categories = cloneDeep(data.categories);
			data.categories = [];
			data.categories[0] = categories;
		}
		data.categories.forEach(category => {
			if (category.categoryPages instanceof Array === false) {
				const categoryPages = cloneDeep(category.categoryPages);
				category.categoryPages = [];
				category.categoryPages[0] = categoryPages;
			}
			category.categoryPages.forEach(currentPage => {
				if (currentPage.blocks instanceof Array === false) {
					const blocks = cloneDeep(currentPage.blocks);
					currentPage.blocks = [];
					currentPage.blocks[0] = blocks;
				}

				currentPage.blocks.forEach(currentBlock => {
					// data.number_of_blocks_overall += 1;
					// let max = 0; // max value from all blockAnswers of the block (if radio or input) or all values together (if checkbox)
					if (currentBlock.blockAnswers instanceof Array === false) {
						const blockAnswers = cloneDeep(currentBlock.blockAnswers);
						currentBlock.blockAnswers = [];
						currentBlock.blockAnswers[0] = blockAnswers;
					}
					currentBlock.blockAnswers.forEach((one_answer, a) => {
						currentBlock.blockAnswers[a].answerValue = parseInt(one_answer.answerValue, 10);
					});

				});
			});
		});
		console.log('moddata');
		console.log(data);
		return data;
	}

	sendQuestDataToWp(questData: QuestData, fileName: string): Observable<void | QuestData> {
		console.log('questData sendQuestDataToWp');
		console.log(questData);
		const questDataWithoutMetaData = cloneDeep(questData);
		questDataWithoutMetaData.metaData = undefined;
		let jsonQuestData = JSON.stringify(questDataWithoutMetaData);
		console.log('jsonQuestData');
		console.log(jsonQuestData);
		jsonQuestData = encodeURIComponent(jsonQuestData).replace(/'/g, '%27');

		const params = new HttpParams()
			.set('jsonstring', jsonQuestData)
			.set('filename', fileName)
			.set('counterValue', questData.metaData.resultWasViewed)
			.set('pdfAsEmailPassword', questData.metaData.pdfAsEmailPassword)
			.set('counter', 'change');
		// const params = new HttpParams().set('jsonstring', questData);
		console.log('params');
		console.log(params);
		// return this.http.post<any>(Confs.CREATE_OR_UPDATE_XML, params, httpOptions).pipe(
        return this.http.post<any>(Confs.CREATE_OR_UPDATE_XML, params, httpOptions).pipe(
			map(response => {
				this.translate.get(response.message).subscribe((translatedMessage: string) => {
					this.snackBar.open(`${response.filename} ${translatedMessage}`, 'close', {
						duration: 2000,
					});
				});
				console.log('questData sendQuestDataToWp response');
				console.log(response);
				// Load questnames again to have the new created quest in it
				this.saveSpinner.show = false;
				if (response.status === 'success') {
					this.surveyIsSaved.emit(true);
				}
			}),
			catchError((error, caught) => {
				// intercept the respons error and displace it to the console
				console.log('catchError in send data', error);
				this.translate.get('connectionError').subscribe((translatedMessage: string) => {
					this.snackBar.open(`ERROR: ${translatedMessage}`, 'close', {
						duration: 8000,
					});
				});
				this.saveSpinner.show = false;
				return of(error);
			}) as any
		);
	}

	deleteQuest(filename) {
		const params = new HttpParams().set('delete', 'true').set('filename', filename);
		// const params = new HttpParams().set('jsonstring', questData);
		console.log('params in delete quest');
		console.log(params);
		return this.http.post<any>(Confs.DELETE_XML, params, httpOptions).pipe(
			map(response => {
				console.log('questData delete Quest');
				console.log(response);
				this.translate.get(response.message).subscribe((translatedMessage: string) => {
					this.snackBar.open(`${response.filename} ${translatedMessage}`, 'close', {
						duration: 2000,
					});
				});
			}),
			catchError(this.handleError('deleteQuest', filename))
		);
	}

	updateFormValidsAndEmit(form: string, isValid: boolean): void {
		this[form + 'IsValid'] = isValid;
		console.log('form is valid', this[form + 'IsValid']);
		const allFormsStatus: any = {
			language: this.languageFormGroupIsValid,
			header: this.headerFormIsValid,
			main: this.mainFormIsValid,
			footer: this.footerFormIsValid,
			result: this.resultFormIsValid,
			finish: this.finishFormGroupIsValid,
		};

		if (
			this.headerFormIsValid &&
			this.mainFormIsValid &&
			this.footerFormIsValid &&
			this.resultFormIsValid &&
			this.finishFormGroupIsValid &&
			this.languageFormGroupIsValid
		) {
			allFormsStatus.allForms = true;
			this.sendFormValidStatus.emit(allFormsStatus);
		} else {
			allFormsStatus.allForms = false;
			this.sendFormValidStatus.emit(allFormsStatus);
		}
	}

	saveWholeForm(fileName: string): void {
		this.saveSpinner.show = true;
		console.log('this.showSaveSpinner: ', this.saveSpinner);
		this.saveFormEvent.emit(fileName);
	}

    /** GET CSV LIST from the server */
	getCsvList(questName: string): Observable<any> {
		let params = new HttpParams();

		if (questName) {
			params = params.append('questname', questName);
		}
		// console.log('getquestlist');
		return this.http
			.get<any>(Confs.CSV_LIST_URL, { params, ...httpOptions })
			.pipe(
				map(response => {
					// NOTE: response is of type SomeType
					console.log('map getCsvList response,', response);
					// const trimmedQuestNames = response.map(questName => {
					// 	const newQuestName = questName.substring(0, questName.indexOf('.xml'));
					// 	const value = { value: newQuestName, viewValue: newQuestName };
					// 	return value;
					// });
					return response;
				}),
				catchError(this.handleError('getHeroes', []))
			);
	}
}
