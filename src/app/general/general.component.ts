import { QuestName } from './questnames.model';
import { AdditionlInfosFromBackend } from './../interfaces';
import { GeneralService } from './general.service';
import { HeroesService, QuestFilenamesParams } from './../connector.service';
import { POSSIBLE_LANGUAGES } from '../../config';
import { Component, OnInit, Output, EventEmitter, ViewChild, OnDestroy } from '@angular/core';
import { UntypedFormControl, UntypedFormBuilder, UntypedFormGroup, Validators } from '@angular/forms';
import { Observable, Subscription, Subject } from 'rxjs';
import { map, startWith } from 'rxjs/operators';
import { MatAutocompleteTrigger } from '@angular/material/autocomplete';
import { MatDialog } from '@angular/material/dialog';
import { MatStepper } from '@angular/material/stepper';
import { LanguageModalComponent } from '../language-modal/language-modal.component';
import { QuestData } from '../interfaces';
import FormHelperClass from '../formHelperClass';
import { takeUntil } from 'rxjs/operators';

@Component({
	selector: 'app-general',
	templateUrl: './general.component.html',
	styleUrls: ['./general.component.scss'],
})
export class GeneralComponent extends FormHelperClass implements OnInit, OnDestroy {
	@ViewChild(MatAutocompleteTrigger) auto: MatAutocompleteTrigger;
	// @Input() childFormsAreDirty: boolean;
	@Output() modeChanged = new EventEmitter<void>();
	@Output() initialisedFormToParentComponent = new EventEmitter<any>();
	firstFormGroup: UntypedFormGroup;
	secondFormGroup: UntypedFormGroup;
	languageFormGroup: UntypedFormGroup;
	languagesSelectBox: UntypedFormControl;
	defaultLanguagesSelectBox: UntypedFormControl;
	filteredOptions: Observable<QuestName[]>;
	isLinear = true;
	selected: string;
	mode;
	loadingQuestNames: boolean;
	loadingQuestData: boolean;
	questNames: QuestName[] = [];
	questionnaireData: QuestData;
	languageDefault: string;
	languages;
	settedlLanguages;
	getQuestDataValid = false;
	questFetched = false;
	possibleDefaultLanguages;
	languageChanged = false;
	deleteQuest = false;
	childFormsAreDirty: boolean;
	languageFormGroupIsValidSubscription: Subscription;
	languageFormGroupStatus: string;
	surveyIsSavedSubscription: Subscription;
	options: string[] = [];
	showAllQuestNames = false;
	userIsAdmin: boolean;
	userIsEditor: boolean;
	additionalBackendInfos: AdditionlInfosFromBackend;

	constructor(connector: HeroesService, private generalService: GeneralService, fb: UntypedFormBuilder, public dialog: MatDialog) {
		super(fb, connector);
		this.userIsAdmin = connector.userIsAdmin;
		this.userIsEditor = connector.userIsEditor;
	}

	private unsubscribe: Subject<void> = new Subject();

	/**
	 * initialize the quest data and subscribes it. When the data arrives, the form will be generated. The html waits for this form.
	 * Checks Form status and send it to the service.
	 */
	ngOnInit(): void {
		this.additionalBackendInfos = this.connector.additionalBackendInfos;
		this.connector.emitQuestionnaireData.pipe(takeUntil(this.unsubscribe)).subscribe(questData => {
			this.questionnaireData = questData;
			this.settedlLanguages = (questData.config.language?.languages && Object.keys(questData.config.language.languages).length > 0)
                ? questData.config.language.languages
                : [{ short: 'en', long: 'English' }];

            this.languageDefault = (questData.config.language?.default && Object.keys(questData.config.language.default).length > 0)
                ? questData.config.language.default
                : 'en';

			this.setDefaultsInPossibleLanguages();
			console.log('getQuestData subscribe');
			console.log('this.languageDefault');
			console.log(this.languageDefault);

			console.log('this.firstFormGroup before emitFormValidStaus');
			console.log(this.firstFormGroup);

			console.log('this.secondFormGroup  before emitFormValidStaus');
			console.log(this.secondFormGroup);

			console.log('this.languageFormGroup before emitFormValidStaus');
			console.log(this.languageFormGroup);

			this.emitFormValidStatus();
			this.loadingQuestData = false;
			console.log('this.languageFormGroup after default setting');
			console.log(this.languageFormGroup);
			this.initialisedFormToParentComponent.emit({
				formName: 'languageFormGroup',
				form: this.languageFormGroup,
			});

			this.checkFormvalidStatus(
				this.languageFormGroupIsValidSubscription,
				this.languageFormGroup,
				'languageFormGroup'
			);
		});

		this.firstFormGroup = this.fb.group({
			firstCtrl: ['', Validators.required],
		});
		this.secondFormGroup = this.fb.group({
			secondCtrl: ['', Validators.required],
		});

		this.languageFormGroup = this.fb.group({
			languagesSelectBox: [null, [Validators.required]],
			defaultLanguagesSelectBox: [null, [Validators.required]],
		});

		this.firstFormGroup.controls.firstCtrl.valueChanges.pipe(takeUntil(this.unsubscribe)).subscribe(newMode => {
			this.mode = newMode;
			console.log('newMode');
			console.log(this.mode);
		});

		// this.surveyIsSavedSubscription =
		this.connector.surveyIsSaved.pipe(takeUntil(this.unsubscribe)).subscribe((isSaved: boolean) => {
			this.getQuestList(this.createShowAllQuestNamesParams());
		});

		console.log('this.languageFormGroup');
		console.log(this.languageFormGroup);
	}

	/**
	 * Unsubscriptions
	 */
	ngOnDestroy(): void {
		if (typeof this.languageFormGroupIsValidSubscription !== 'undefined') {
			this.languageFormGroupIsValidSubscription.unsubscribe();
		}
		this.unsubscribe.next();
		this.unsubscribe.complete();
	}

	stepperGoForward(stepper: MatStepper): void {
		stepper.next();
	}

	stepperGoBack(stepper: MatStepper): void {
		stepper.previous();
	}

	/**
	 * For the selectbox for the list of quest names. Finds the matching object from this questnames and returns it.
	 * We need it for the case insensitive autocomplete selectbox.
	 *
	 * @param value the quest name
	 * @returns Array with the questname includes value and viewvalue
	 */
	private _filter(value: string): QuestName[] {
		const filterValue = value.toLowerCase();
		console.log('filterValue');
		console.log(filterValue);
		console.log('firstFormGroup');
		console.log(this.firstFormGroup);

		console.log('this.questNames');
		console.log(this.questNames);

		return this.questNames.filter(questName => questName.viewValue.toLowerCase().includes(filterValue));
	}

	/**
	 * Gets all possible languages and sets them in the multi select box 'defaultLanguagesSelectBox'
	 */
	setDefaultsInPossibleLanguages(): void {
		const anotherList: any[] = [];
		const allLanguages: any[] = Object.keys(POSSIBLE_LANGUAGES).map(key => {
			return { short: key, long: POSSIBLE_LANGUAGES[key] };
		});

		this.languages = allLanguages;

		this.languages.forEach((language, index) => {
			this.settedlLanguages.forEach(settedLanguage => {
				if (settedLanguage.short === language.short) {
					anotherList.push(this.languages[index]);
				}
			});
		});
		this.possibleDefaultLanguages = anotherList;
		this.languageFormGroup.get('languagesSelectBox').setValue(anotherList);
		const setLanguageDefault = this.possibleDefaultLanguages.find(language => {
			return language.short === this.languageDefault;
		});
		this.languageFormGroup.get('defaultLanguagesSelectBox').setValue(setLanguageDefault);
		this.languageChanged = false;
		this.emitFormValidStatus();
		// console.log('this.languagesSelectBox');
		// console.log(this.languagesSelectBox);
	}

	/**
	 * If decide to edit, new or delete in form.
	 * To prevent overriding an existing form a dialog opens, if there are dirty forms ind the app.
	 * The mode (delete, edit, new) will be emitted to the other components.
	 * If no dirty form exists, edit and new gets quest data. Delete will open the selectbox for the quests to delete.
	 *
	 * @param mode delete, edit or new
	 * @param stepper the stepper instance which we want do move
	 */
	editNewDeleteAction(mode: string, stepper: MatStepper): void {
		this.selected = '';
		switch (mode) {
			case 'edit':
				if (this.questFetched) {
					this.connector.generalInfoIsValidEmitter(true);
				}
				this.deleteQuest = false;
				this.modeChanged.emit();
				if (this.childFormsAreDirty) {
					this.openDialogNewOrEdit(stepper, true);
				} else {
					this.getQuestList(this.createShowAllQuestNamesParams());
					this.stepperGoForward(stepper);
				}

				break;
			case 'new':
				this.deleteQuest = false;
				this.modeChanged.emit();
				if (this.childFormsAreDirty) {
					this.openDialogNewOrEdit(stepper);
				} else {
					this.getQuestData('new', stepper, true);
					setTimeout(() => {
						this.stepperGoForward(stepper);
					}, 0);
				}

				break;
			case 'delete':
				this.deleteQuest = true;
				this.connector.generalInfoIsValidEmitter(false);
				this.getQuestList(this.createShowAllQuestNamesParams());
				this.stepperGoForward(stepper);
				break;
			default:
				this.getQuestData('new', stepper);
				setTimeout(() => {
					this.stepperGoForward(stepper);
				}, 0);
		}
	}

	/**
	 * Fetches the list of names of existing quests. Uses 'valuechanges' function to set the selectbox with new data.
	 */
	getQuestList(param?: QuestFilenamesParams[]): void {
		this.loadingQuestNames = true;
		this.connector
			.getQuestList(param)
			.pipe(takeUntil(this.unsubscribe))
			.subscribe(questNames => {
				this.questNames = questNames;
				// this.generalService.setQuestNames(questNames);
				this.loadingQuestNames = false;
				this.filteredOptions = this.secondFormGroup.controls.secondCtrl.valueChanges.pipe(
					// TODO: might be better in the init?
					startWith(''),
					map(value => {
						console.log('value');
						console.log(value);
						return this._filter(value);
					})
				);
			});
	}

	/**
	 * Opens Dialog for deleting and loads questdata.
	 *
	 * @param value Name of the quest file
	 * @param stepper The stepper instance to move
	 */
	deleteOrGetQuestAction(value: string, stepper: MatStepper): void {
		if (this.deleteQuest) {
			// this.deleteQuestAction(value);
			// this.stepperGoBack(stepper);
			this.openDialogDeleteFile(value, stepper);
		} else {
			this.modeChanged.emit(); // only to check if at least one form in a child is dirty
			if (this.childFormsAreDirty) {
				this.openDialogChangeQuest(stepper, value);
			} else {
				this.getQuestData(value, stepper);
			}
		}
	}

	/**
	 * Deletes the quest and reloads the questlist selectbox
	 *
	 * @param fileName Name of the quest file
	 */
	deleteQuestAction(fileName: string): void {
		this.loadingQuestData = true;
		this.connector
			.deleteQuest(fileName)
			.pipe(takeUntil(this.unsubscribe))
			.subscribe(response => {
				console.log('response delete quest');
				console.log(response);
				this.secondFormGroup.get('secondCtrl').patchValue('');
				this.getQuestList(this.createShowAllQuestNamesParams());
				this.loadingQuestData = false;
				this.questFetched = true;
			});
	}

	/**
	 * Fetches the quest or quest-template and moves the stepper
	 *
	 * @param value Name of the quest file
	 * @param stepper Stepper instance to move
	 * @param template if the file is in template folder or not (for the other path in php backend)
	 */
	getQuestData(value: string, stepper: MatStepper, template?: boolean): void {
		this.loadingQuestData = true;

		this.connector
			.getQuest(value, template ? true : false)
			.pipe(takeUntil(this.unsubscribe))
			.subscribe(questData => {
				this.connector.emitQuestData(questData);
				this.questFetched = true;
				setTimeout(() => {
					this.stepperGoForward(stepper);
				}, 0);
			});
		console.log('this.secondFormGroup');
		console.log(this.secondFormGroup);
	}

	/**
	 * Sets the default language. If there is only one language in the languages multi selectbox enabled,
	 * the default language switches to this language. Sets the default language to undefined,
	 * if the language is not yet enabled in the multi languages selectbox.
	 */
	refreshDefaultLanguageSelectBox(): void {
		const value = this.languageFormGroup.get('defaultLanguagesSelectBox').value;

		if (this.possibleDefaultLanguages.length === 1) {
			this.languageFormGroup.get('defaultLanguagesSelectBox').setValue(this.possibleDefaultLanguages[0]);
			this.languageDefault = this.languageFormGroup.get('defaultLanguagesSelectBox').value.short;
			this.emitFormValidStatus();

			return;
		}

		// set default language from same object as pssibleDefaultlanguages
		const selectedLanguageDefault = this.possibleDefaultLanguages.find(language => {
			return language.short === value.short;
		});
		if (!selectedLanguageDefault) {
			this.languageFormGroup.get('defaultLanguagesSelectBox').setValue('');
			this.languageDefault = this.languageFormGroup.get('defaultLanguagesSelectBox').value.short;
		}
		this.emitFormValidStatus();
	}

	/**
	 * It might be useless because we have now the live vali checker for the whole form.
	 * TODO: What if a edit quest is not valid? Then the expanders doesn`t open?
	 */
	emitFormValidStatus() {
		console.log('this.secondFormGroup');
		console.log(this.firstFormGroup);
		console.log('this.secondFormGroup');
		console.log(this.secondFormGroup);
		console.log('this.secondFormGroup');
		console.log(this.secondFormGroup);
		switch (this.mode) {
			case 'edit':
				if (
					this.firstFormGroup.valid &&
					this.secondFormGroup.valid &&
					this.languageFormGroup.valid &&
					!this.languageChanged
				) {
					this.connector.generalInfoIsValidEmitter(true);
				} else {
					this.connector.generalInfoIsValidEmitter(false);
				}
				break;
			case 'new':
				if (this.firstFormGroup.valid && this.languageFormGroup.valid && !this.languageChanged) {
					this.connector.generalInfoIsValidEmitter(true);
				} else {
					this.connector.generalInfoIsValidEmitter(false);
				}
				break;
			default:
				this.connector.generalInfoIsValidEmitter(false);
		}
	}

	// defaultLanguageChange(event) {
	// 	this.languageChanged =
	// 		this.languageFormGroup.get('defaultLanguagesSelectBox').value.short ===
	// 		this.questionnaireData.config.language.default
	// 			? false
	// 			: true;
	// 	this.languageDefault = event.value.short;
	// }

	/**
	 * Adds two numbers together
	 *
	 * @param arrayOne The First Number
	 * @param arrayTwo The Second Number
	 * @returns true or false whether the arrays are equal
	 */
	arraysAreEqual(arrayOne: any[], arrayTwo: any[]): boolean {
		let isEqualObject: Boolean;
		if (arrayOne.length === arrayTwo.length) {
			for (let i = 0; i < arrayOne.length; i++) {
				isEqualObject = arrayTwo.find(arrayTwoValue => {
					return arrayOne[i].short === arrayTwoValue.short;
				});
				if (typeof isEqualObject === 'undefined') {
					return false;
				}
			}
			return true;
		} else {
			return false;
		}
	}

	/**
	 * Manages the language changing in default language und multiple default languages
	 *
	 * @param event with the value of the language
	 * @param isPossible if true the call comes from the multi select box with possible languages
	 */
	languageChange(event, isPossible?: boolean): void {
		if (
			!this.arraysAreEqual(this.languageFormGroup.get('languagesSelectBox').value, this.settedlLanguages) ||
			this.languageFormGroup.get('defaultLanguagesSelectBox').value.short !== this.questionnaireData.config.language.default
		) {
			this.languageChanged = true;
		} else {
			this.languageChanged = false;
		}
		if (isPossible) {
			this.possibleDefaultLanguages = event.value;
			this.refreshDefaultLanguageSelectBox();
		} else {
			this.languageDefault = event.value.short;
		}
		this.emitFormValidStatus();
		console.log('form valid in general');
		console.log(this.languageFormGroup);
	}

	/**
	 * We might have deleted one or more languages in the formgroup.
	 * Here we check, which languages are in this.settedlLanguages but not in the form.
	 * We want to  show them in the dialog, so the user can decide, whether he really wants to delete or not.
	 *
	 * @returns The array with the missing languages as strings.
	 */
	findMissingSelectedLanguages(): string[] {
		const languages = this.settedlLanguages;
		const formLanguages = this.languageFormGroup.get('languagesSelectBox').value;
		const missingLanguages: string[] = [];
		let testedLanguage,
			i = 0;

		for (i; i < languages.length; i++) {
			testedLanguage = formLanguages.find(formLanguage => {
				return languages[i].short === formLanguage.short;
			});

			if (typeof testedLanguage === 'undefined') {
				missingLanguages[i] = languages[i].long;
			}
		}
		return missingLanguages;
	}

	/**
	 * We find the missing languages as an array and open the dialog as confirm. Comes if the user want to delete a missing lanuguage,
	 * which would delete all the previous content of it.
	 */
	openDialog(): void {
		const missingLanguages = this.findMissingSelectedLanguages();
		if (missingLanguages.length) {
			const dialogRef = this.dialog.open(LanguageModalComponent, {
				data: {
					missingLanguages: missingLanguages,
					modalString: 'deleteLanguagesModal',
				},
			});

			dialogRef.afterClosed().subscribe(result => {
				console.log(`Dialog result: ${result}`);
				if (result === true) {
					this.connector.emitLanguageChange();
					// this.connector.emitQuestLanguage(
					// 	this.possibleDefaultLanguages,
					// 	this.languageDefault
					// );
					this.languageChanged = false;
				}
			});
		} else {
			this.connector.emitLanguageChange();
			// this.connector.emitQuestLanguage(
			// 	this.possibleDefaultLanguages,
			// 	this.languageDefault
			// );
			this.languageChanged = false;
		}
	}

	/**
	 * If the user wants to delete a quest he has to confirm in this dialog.
	 */
	openDialogDeleteFile(filename: string, stepper: MatStepper): void {
		const dialogRef = this.dialog.open(LanguageModalComponent, {
			data: {
				missingLanguages: [filename],
				modalString: this.additionalBackendInfos.is_compare ? 'modalStringDeleteFileWithCompareFeature' : 'modalStringDeleteFile',
				leftButton: 'Cancel',
				rightButton: 'Delete',
			},
		});

		dialogRef.afterClosed().subscribe(result => {
			console.log(`Dialog result: ${result}`);
			if (result === true) {
				this.deleteQuestAction(filename);
				this.stepperGoBack(stepper);
				this.auto.closePanel();
			}
		});
	}

	/**
	 * If any child form is dirty, the user has to confirm to load another quest bacuse the previous will be deleted.
	 */
	openDialogNewOrEdit(stepper: MatStepper, edit?: boolean): void {
		const dialogRef = this.dialog.open(LanguageModalComponent, {
			data: {
				modalString: 'modalString.EditOrDelete',
			},
		});

		dialogRef.afterClosed().subscribe(result => {
			if (result) {
				if (edit) {
					this.deleteQuest = false;
					this.getQuestList(this.createShowAllQuestNamesParams());
					this.stepperGoForward(stepper);
				} else {
					this.getQuestData('new', stepper);
					setTimeout(() => {
						this.stepperGoForward(stepper);
					}, 0);
				}
			} else {
				this.firstFormGroup.get('firstCtrl').reset();
			}
		});
	}

	/**
	 * If any child form is dirty, the user has to confirm to load another quest bacuse the previous will be deleted.
	 */
	openDialogChangeQuest(stepper: MatStepper, value: string): void {
		const dialogRef = this.dialog.open(LanguageModalComponent, {
			data: {
				modalString: 'modalString.EditOrDelete',
			},
		});

		dialogRef.afterClosed().subscribe(result => {
			if (result) {
				this.getQuestData(value, stepper);
				this.auto.closePanel();
				setTimeout(() => {
					this.stepperGoForward(stepper);
				}, 0);
			}
		});
	}

	/**
	 * Collects the necessary data of this form. Is called in the parent homepage where all formdata comes together
	 *
	 * @returns The object with the language data (languages and default language).
	 */
	sendAllGeneralFormData(): any {
		return {
			possibleDefaultLanguages: this.possibleDefaultLanguages,
			languageDefault: this.languageDefault,
		};
	}

	/**
	 * Is called in the parent homepage component for every component with has a form. If one form is dirty,
	 * this.setChildFormsAreDirty will be setted from the homepage as true.
	 * We need that because we only want to show the modal when the user wants to load a new quest,
	 * if a form ist dirty.
	 *
	 * @returns Boolean if the form is dirty or not.
	 */
	isLanguageFormDirty(): boolean {
		return this.languageFormGroup && this.languageFormGroup.dirty;
	}

	/**
	 * Is called in the parent homepage component if at least one form in the whole app is dirty.
	 *
	 */
	setChildFormsAreDirty(bool: boolean): void {
		console.log('setChildFormsAreDirty called');
		console.log(bool);
		this.childFormsAreDirty = bool;
	}

	handleShowAllQuestNames(event) {
		console.log('handleShowAllQuestNames', this.showAllQuestNames);
		console.log('handleShowAllQuestNames event', event);
		const param = [{key: 'showAllFileNames', value: this.showAllQuestNames ? 'true' : 'false'}];
		this.getQuestList(param);
	}

	createShowAllQuestNamesParams(): QuestFilenamesParams[] {
		const param: QuestFilenamesParams[] = [{key: 'showAllFileNames', value: this.showAllQuestNames ? 'true' : 'false'}];
		return param;
	}
}
