import { Graph, ResultPage, AdditionlInfosFromBackend } from './../interfaces';
import { HeroesService } from './../connector.service';
import { UntypedFormBuilder, UntypedFormGroup, Validators, UntypedFormArray, FormControl } from '@angular/forms';
import { Component, OnInit, OnDestroy, EventEmitter, Output } from '@angular/core';
import FormHelperClass from '../formHelperClass';
import { POSSIBLE_LANGUAGES } from '../../config';
import { cloneDeep } from 'lodash';
import { Subscription, Subject } from 'rxjs';
import * as helpers from '../helpers';
import { CdkDragDrop, moveItemInArray } from '@angular/cdk/drag-drop';
import { takeUntil } from 'rxjs/operators';
import { MyErrorStateMatcher } from '../MyErrorStateMatcherClass';

@Component({
	selector: 'app-quest-result',
	templateUrl: './quest-result.component.html',
	styleUrls: ['./quest-result.component.scss'],
})
export class QuestResultComponent extends FormHelperClass implements OnInit, OnDestroy {
	@Output() initialisedFormToParentComponent = new EventEmitter<any>();
	resultForm: UntypedFormGroup;
	questionnaireData;
	possibleGraphs: Graph[] = [
		{ short: 'radar', long: 'radar' },
		{ short: 'doughnut', long: 'doughnut' },
		{ short: 'polar', long: 'polar' },
		{ short: 'bar', long: 'bar' },
	];
	possibleDefaulGraphs: Graph[];
	graphDefault: string;
	resultFormStatus: string;
	resultFormStatusIsValidSubscription: Subscription;
	possibleLanguages: any = POSSIBLE_LANGUAGES;
	tinyMceSettings = {
		...helpers.tinyMceSettings,
		plugins: ['advlist', 'fullscreen', 'image', 'code', 'lists', 'table', 'link', 'pagebreak'],
		toolbar: [
			'undo redo | forecolor backcolor | image | code | numlist bullist table | hr link unlink',
			'alignleft aligncenter alignright alignjustify | bold italic underline formatselect fontsizeselect',
		],
	};
	additionalBackendInfos: AdditionlInfosFromBackend;
    matcher = new MyErrorStateMatcher();

	constructor(protected connector: HeroesService, protected fb: UntypedFormBuilder) {
		super(fb, connector);
	}

	private unsubscribe: Subject<void> = new Subject();

	get resultPageTitle(): UntypedFormGroup {
		return this.resultForm.get('resultPageTitle') as UntypedFormGroup;
	}

	get resultPageDescription(): UntypedFormGroup {
		return this.resultForm.get('resultPageDescription') as UntypedFormGroup;
	}

	get resultPageInterpretations(): UntypedFormArray {
		return this.resultForm.get('interpretations') as UntypedFormArray;
	}

    get resultPageCompareButtonString(): UntypedFormGroup {
		return this.resultForm.get(['graphSwitchGroup', 'resultPageCompareButtonString']) as UntypedFormGroup;
	}

    getResultPageDescriptionControl(index: number): FormControl {
		return this.resultForm.get(['resultPageDescription', index]) as FormControl;
	}

    get resultPageCompareGraphs(): FormControl {
		return this.resultForm.get(['graphSwitchGroup', 'compareGraphs']) as FormControl;
	}

	resultPageInterpretationDescriptions(interpretationIndex): UntypedFormGroup {
		return this.resultForm.get(['interpretations', interpretationIndex, 'interpretationDescription']) as UntypedFormGroup;
	}

	resultPageInterpretationImageCategories(interpretationIndex: number): UntypedFormArray {
		return this.resultForm.get(['interpretations', interpretationIndex, 'imageCategories']) as UntypedFormArray;
	}

	resultPageInterpretationImageCategoryGroups(interpretationIndex: number, imageCategoryIndex: number): UntypedFormGroup {
		return this.resultForm.get(['interpretations', interpretationIndex, 'imageCategories', imageCategoryIndex]) as UntypedFormGroup;
	}

	ngOnInit(): void {
		this.additionalBackendInfos = this.connector.additionalBackendInfos;
		this.connector.emitQuestionnaireData.pipe(takeUntil(this.unsubscribe)).subscribe(questData => {

			// If we have recommendations plugin, we need the recomm segment in the priority list for the resultpage.
			// We do not want it, if we have not the plugin.
			// Also we need a fallback for the old xml files
			const indexOfRecommendationsInArray = questData.config.priorityListObject.priorityList.indexOf('recommendations');
			if (this.additionalBackendInfos.is_recommendations) {
				if (indexOfRecommendationsInArray === -1) {
					questData.config.priorityListObject.priorityList.push('recommendations');
				}
			} else { // If we switch from recommendationsplugin to no plugin
				if (indexOfRecommendationsInArray > -1) {
					questData.config.priorityListObject.priorityList.splice(indexOfRecommendationsInArray, 1);
				}
			}

			// Myabe the values are not there cause of missing recommendatins plugin or old xml file. So we have to check and give default values
			const recommendationsIsUsed: boolean = (typeof(questData.config.recommendationsIsUsed) !== 'undefined') && (questData.config.recommendationsIsUsed === '1') ? true : false;

			this.questionnaireData = questData;
			console.log('questdata in result: ', this.questionnaireData);
			this.graphDefault = questData.config.graphs.default;
			this.resultForm = this.fb.group({
				resultPageTitle: this.fb.group({}),
				resultPageDescription: this.fb.group({}),
				isTomsStyle: this.fb.control(questData.resultpage.body.showtomsstyle === '1' ? true : false, Validators.required),
				interpretations: this.fb.array(this.initInterpretations(questData.resultpage.body.interpretation)),
				recommendationsIsUsed: this.fb.control(recommendationsIsUsed),
                
				graphSwitchGroup: this.fb.group({
					wantGraphSwitch: this.fb.control(
						questData.config.graphs.showGraphSwitch === '1' ? true : false,
						Validators.required
					),
					possibleGraphsSelectBox: [null, [Validators.required]],
					defaultGraphSelectBox: [null, [Validators.required]],
					compareGraphs: [
						this.additionalBackendInfos.is_compare &&
						typeof questData.config.graphs.compareGraphs !== 'undefined' &&
						questData.config.graphs.compareGraphs === '1'
							? true
							: false,
						Validators.required,
					],
                    resultPageCompareButtonString: this.fb.group({}),
				}),
			});
			const resultPageTitleGroup = this.resultForm.get('resultPageTitle');
			this.addLanguageFormControll(resultPageTitleGroup, questData.resultpage.header.title);
			this.addLanguageFormControll(this.resultPageCompareButtonString, questData.config.graphs.resultpagecomparebuttonstring ?? {}, true, 50);
			const resultPageDescriptionGroup = this.resultForm.get('resultPageDescription');
			this.addLanguageFormControll(resultPageDescriptionGroup, questData.resultpage.header.description);
			this.setDefaultsInPossibleGraphs(questData.config.graphs);

			console.log('after subscibe in resul');
			console.log(this.resultForm);

			this.initialisedFormToParentComponent.emit({ formName: 'resultForm', form: this.resultForm });

			this.checkFormvalidStatus(
				this.resultFormStatusIsValidSubscription,
				this.resultForm,
				'resultForm'
			);
		});
	}

	ngOnDestroy(): void {
		this.unsubscribe.next();
		this.unsubscribe.complete();
	}

	setDefaultsInPossibleGraphs(graphs) {
		const settedGraphsList: Graph[] = [];
		this.possibleGraphs.forEach((graph, index) => {
			graphs.graphSwitchOptions.options.forEach(settedGraph => {
				if (settedGraph === graph.short) {
					settedGraphsList.push(this.possibleGraphs[index]);
				}
			});
		});
		this.possibleDefaulGraphs = settedGraphsList;

		this.resultForm.get(['graphSwitchGroup', 'possibleGraphsSelectBox']).setValue(settedGraphsList);
		const setGraphDefault = this.possibleDefaulGraphs.find(graph => {
			return graph.short === this.graphDefault;
		});
		this.resultForm.get(['graphSwitchGroup', 'defaultGraphSelectBox']).setValue(setGraphDefault);
	}

	graphChange(event) {
		this.possibleDefaulGraphs = event.value;
		this.refreshDefaultGraphSelectBox();
	}

	refreshDefaultGraphSelectBox() {
		const value = this.resultForm.get(['graphSwitchGroup', 'defaultGraphSelectBox']).value;

		if (this.possibleDefaulGraphs.length === 1) {
			this.resultForm.get(['graphSwitchGroup', 'defaultGraphSelectBox']).setValue(this.possibleDefaulGraphs[0]);
			return;
		}

		// set default graph from same object as possibleDefaulGraphs
		const selectedGraphDefault = this.possibleDefaulGraphs.find(graph => {
			return graph.short === value.short;
		});
		if (!selectedGraphDefault) {
			this.resultForm.get(['graphSwitchGroup', 'defaultGraphSelectBox']).setValue('');
		}
	}

	initInterpretations(interpretations): UntypedFormGroup[] {
		console.log('interpretation in resul');
		console.log(interpretations);
		const groups = [];
		interpretations.forEach(interpretation => {
			const group = this.fb.group({
				// interpretationAttributes: this.fb.group({}),
				interpretationIsRequired: this.fb.control(
					interpretation['@attributes'].required === '1' ? true : false,
					Validators.required
				),
				interpretationDescription: this.fb.group({}),
			});

			// const attributesGroup = group.get('interpretationAttributes');
			// console.log('interpretation attr in resul');
			// console.log(interpretation['@attributes']);
			// this.setAttributes(attributesGroup, interpretation['@attributes']);

			const descriptionGroup = group.get('interpretationDescription');
			this.addLanguageFormControll(descriptionGroup, interpretation.description, true);

			// Not every interpretation has dynamic names for the image
			if (interpretation.image_categories) {
				const controlArray = this.fb.array(this.initImageCategoyArray(interpretation));
				group.addControl('imageCategories', controlArray);
			}
			groups.push(group);
		});
		return groups;
	}

	initImageCategoyArray(interpretation) {
		const groups: UntypedFormGroup[] = [];
		interpretation.image_categories.forEach(imageCategory => {
			const group = this.fb.group({});
			this.addLanguageFormControll(group, imageCategory, true);
			groups.push(group);
		});
		return groups;
	}

	sendAllResultFormData() {
		const resultForm = cloneDeep(this.resultForm.value);
		const resultPage: ResultPage = {
			header: {
				title: {},
				description: {},
			},
			body: {
				showtomsstyle: '',
				literature: {},
			},
		};

		resultPage.header.title = { ...resultForm.resultPageTitle };
		resultPage.header.description = { ...resultForm.resultPageDescription };

		resultPage.body.interpretation = [];

		if (resultForm.interpretations) {
			resultPage.body.interpretation = [];
			for (let i = 0; i < resultForm.interpretations.length; i++) {
				resultPage.body.interpretation[i] = {
					'@attributes': {
						required: resultForm.interpretations[i].interpretationIsRequired ? '1' : '0',
					},
					description: {
						...resultForm.interpretations[i].interpretationDescription,
					},
				};

				if (resultForm.interpretations[i].imageCategories) {
					resultPage.body.interpretation[i].image_categories = [...resultForm.interpretations[i].imageCategories];
				}
			}
		}

		resultPage.body.showtomsstyle = resultForm.isTomsStyle ? '1' : '0';

		// literature might comes later
		resultPage.body.literature = {
			'@attributes': {
				required: '0',
			},
		};

		const graphs = {
			default: resultForm.graphSwitchGroup.defaultGraphSelectBox.short,
			showGraphSwitch: this.resultForm.value.graphSwitchGroup.wantGraphSwitch ? '1' : '0',
			compareGraphs: this.resultForm.value.graphSwitchGroup.compareGraphs ? '1' : '0',
			graphSwitchOptions: {
				options: [],
			},
            resultpagecomparebuttonstring: this.resultForm.value.graphSwitchGroup.resultPageCompareButtonString
		};

		for (let y = 0; y < resultForm.graphSwitchGroup.possibleGraphsSelectBox.length; y++) {
			graphs.graphSwitchOptions.options[y] = resultForm.graphSwitchGroup.possibleGraphsSelectBox[y].short;
		}
		const recommendationsIsUsed: string = this.resultForm.value.recommendationsIsUsed ? '1' : '0';

		// // TODO: literature

		return {
			resultPage: resultPage,
			graphs: graphs,
			priorityList: this.questionnaireData.config.priorityListObject.priorityList,
			recommendationsIsUsed
		};
	}

	isResultFormDirty(): boolean {
		return this.resultForm && this.resultForm.dirty;
	}

	dropresultPageSegement(event: CdkDragDrop<string[]>) {
		moveItemInArray(this.questionnaireData.config.priorityListObject.priorityList, event.previousIndex, event.currentIndex);
		console.log('this.resultPageSegments: ', this.questionnaireData.config.priorityListObject.priorityList);
	}
}
