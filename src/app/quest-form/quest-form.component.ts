import { TranslateService } from '@ngx-translate/core';
import { AdditionlInfosFromBackend } from './../interfaces';
import { HeroesService } from './../connector.service';
import { Component, OnInit, OnDestroy, Output, EventEmitter, ChangeDetectorRef } from '@angular/core';
import { UntypedFormGroup, UntypedFormControl, UntypedFormArray, Validators, UntypedFormBuilder, FormArray, FormControl, AbstractControl } from '@angular/forms';
import FormHelperClass from '../formHelperClass';
import { MatDialog } from '@angular/material/dialog';
import { MatSelectChange } from '@angular/material/select';
import { MatSlideToggleChange } from '@angular/material/slide-toggle';
import { LanguageModalComponent } from '../language-modal/language-modal.component';
import { Languages, AnswerData, BlockData, PageData, CatData } from '../interfaces';
import { cloneDeep } from 'lodash';
import { Subscription, Subject } from 'rxjs';
import { MyErrorStateMatcher } from '../MyErrorStateMatcherClass';
import { POSSIBLE_LANGUAGES } from '../../config';
import * as helpers from '../helpers';
import { NgxUiLoaderService, SPINNER } from "ngx-ui-loader";
import { CdkDragDrop } from "@angular/cdk/drag-drop";
import { EditorComponent } from '@tinymce/tinymce-angular';

export interface RecommendationsConfig {
		connect?: boolean[];
		tooltips: boolean;
		start: string[];
		step: number;
		margin: number;
		range: {
			min: number[];
			max: number[];
		};
		pips: {
			mode: string;
			density: number;
			filter: Function;
		}
}

const emptyAnswerData: AnswerData = {
	identifier: '',
	blockAnswer: {},
	answerValue: 5,
};

const emptyBlockData: BlockData = {
	identifier: '',
	'@attributes': { type: 'radio' },
	blockAnswers: [emptyAnswerData],
	blockQuestion: {},
	blockShortQuestion: {},
	weight: '1',
};

const emptyPageData: PageData = {
	identifier: '',
	blocks: [emptyBlockData],
	pageEvaluate: '1',
	pageInformations: {
		'@attributes': {
			position_to_catname: 'before',
		},
		showPageInformations: '0',
		pageInformationsDescription: {},
		pageInformationsSubtitle: {},
	},
};

const emptyCatData: CatData = {
	identifier: '',
	catcolor: 'rgb(187,45,62)',
	categoryName: {},
	evaluateCategory: '1',
	categoryPages: [emptyPageData],
};

@Component({
	selector: 'app-quest-form',
	templateUrl: './quest-form.component.html',
	styleUrls: ['./quest-form.component.scss'],
})
export class QuestFormComponent extends FormHelperClass implements OnInit, OnDestroy {
	@Output() initialisedFormToParentComponent = new EventEmitter<any>();
	// @ViewChildren ('recommendationsRange') recommendationsRangeList: QueryList<any>;
	// @ViewChildren("recommendationsRange", { read: ElementRef }) recommendationsRangeList: QueryList<ElementRef>;
	mainForm: UntypedFormGroup;
	questionnaireData;
	languages: Languages[] = [];
	deleteSegmentSubscription: Subscription;
	emitQuestionnaireDataSubscription: Subscription;
	mainFormStatusIsValidSubscription: Subscription;
	mainFormStatus: string;
	toggleCatColor: boolean[] = [];
	matcher = new MyErrorStateMatcher();
	tinyMceSettings: EditorComponent['init'] = helpers.tinyMceSettings;
	possibleLanguages = POSSIBLE_LANGUAGES;
	categoryNamesForUniqueTest = [];
	additionalBackendInfos: AdditionlInfosFromBackend;

	showRecommendationsRange = [false];
	recommendationsConfig: RecommendationsConfig[] = [];
	categoryExtensionPanelExpanded: number = -1;
	categoryPageExtensionPanelExpanded: string = '-1';

	spinner;

	private unsubscribe: Subject<void> = new Subject();

	constructor(
		protected connector: HeroesService,
		fb: UntypedFormBuilder,
		public dialog: MatDialog,
		private changeDetectorRef: ChangeDetectorRef,
		public ngxLoaderService: NgxUiLoaderService,
		private translateService: TranslateService) {
		super(fb, connector);
		this.spinner = SPINNER;
	}

	/**
	 * Set questdata
	 * form status valid with this.checkFormvalidStatus is checked and subscribed if form value changes.
	 * Initialize the mainForm with this.initCategories()
	 */
	ngOnInit(): void {
		console.log('init main');
		console.log('mainForm');
		console.log(this.mainForm);
		this.additionalBackendInfos = this.connector.additionalBackendInfos;

		this.emitQuestionnaireDataSubscription = this.connector.emitQuestionnaireData.subscribe(questData => {
			console.log('questData');
			console.log(questData);
			this.questionnaireData = questData;
			this.categoryNamesForUniqueTest = [];

			this.mainForm = this.fb.group({
				categories: this.fb.array(this.initCategories()),
			});

			console.log('after subscribe');
			console.log(this.mainForm);
			console.log('this.categoryPageExtensionPanelExpanded', this.categoryPageExtensionPanelExpanded);
			this.initialisedFormToParentComponent.emit({
				formName: 'mainForm',
				form: this.mainForm,
			});

			// this.categories.controls.forEach((control: FormControl, index: number) => {
			// 	this.categoryNamesForUniqueTest[index] = control.value.categoryName;
			// });
			// console.log('this.categoryNamesForUniqueTest', this.categoryNamesForUniqueTest);

			this.checkFormvalidStatus(this.mainFormStatusIsValidSubscription, this.mainForm, 'mainForm');

		});
	}

	/**
	 * Some unsubscribes if exist
	 */
	ngOnDestroy(): void {
		this.emitQuestionnaireDataSubscription.unsubscribe();
		if (typeof this.deleteSegmentSubscription !== 'undefined') {
			this.deleteSegmentSubscription.unsubscribe();
		}
		if (typeof this.mainFormStatusIsValidSubscription !== 'undefined') {
			this.mainFormStatusIsValidSubscription.unsubscribe();
		}
		this.unsubscribe.next();
		this.unsubscribe.complete();
	}

	get categories() {
		return this.mainForm.get('categories') as UntypedFormArray;
	}

	get categoryNames() {
		console.log('categoryNames');
		console.log(this.mainForm.get('categories'));
		return this.mainForm.get(['categories', 0, 'categoryName']) as UntypedFormArray;
	}

	getRecommendationsContentArray(oneCat: any): UntypedFormArray {
		return oneCat.get(['recommendationsGroup', 'recommendationsContentArray']) as UntypedFormArray;
	}

	getRecommendationsContentArrayGroup(content: any): UntypedFormGroup {
		return content.get('recommendationContent') as UntypedFormGroup;
	}

	getCategoryNames(index: number): UntypedFormGroup {
		return this.mainForm.get(['categories', index, 'categoryName']) as UntypedFormGroup;
	}

	getCategoryPages(index: number): UntypedFormArray {
		return this.mainForm.get(['categories', index, 'categoryPages']) as UntypedFormArray;
		// return this.mainForm['controls']['categories']['controls'][index]['controls'].categoryPages as FormArray;
	}

	getCategoryPagesBlocksProperties(
		CatIndex: number,
		PageIndex: number,
		blockIndex?: number,
		allBlockQuestions?: boolean,
		blockQuestionIndex?: number,
		allBlockAnswers?: boolean,
		blockAnswersIndex?: number,
		allAnswersInOneBlock?: boolean,
		allBlockShortQuestions?: boolean
	): any {
		if (allAnswersInOneBlock) {
			return this.mainForm.get([
				'categories',
				CatIndex,
				'categoryPages',
				PageIndex,
				'blocks',
				blockIndex,
				'blockAnswers',
				blockAnswersIndex,
				'blockAnswer',
			]) as UntypedFormGroup;
		}

		if (blockAnswersIndex === 0 || blockAnswersIndex) {
			return this.mainForm.get([
				'categories',
				CatIndex,
				'categoryPages',
				PageIndex,
				'blocks',
				blockIndex,
				'blockAnswers',
				blockAnswersIndex,
			]) as UntypedFormGroup;
		}
		if (allBlockAnswers) {
			return this.mainForm.get([
				'categories',
				CatIndex,
				'categoryPages',
				PageIndex,
				'blocks',
				blockIndex,
				'blockAnswers',
			]) as UntypedFormArray;
		}

		if (blockQuestionIndex) {
			return this.mainForm.get([
				'categories',
				CatIndex,
				'categoryPages',
				PageIndex,
				'blocks',
				blockIndex,
				'blockQuestion',
				blockQuestionIndex,
			]) as UntypedFormGroup;
		}

		if (allBlockQuestions) {
			return this.mainForm.get([
				'categories',
				CatIndex,
				'categoryPages',
				PageIndex,
				'blocks',
				blockIndex,
				'blockQuestion',
			]) as UntypedFormArray;
		}

		if (blockIndex && !allBlockShortQuestions) {
			return this.mainForm.get(['categories', CatIndex, 'categoryPages', PageIndex, 'blocks', blockIndex]) as UntypedFormGroup;
		}

		if (allBlockShortQuestions) {
			return this.mainForm.get([
				'categories',
				CatIndex,
				'categoryPages',
				PageIndex,
				'blocks',
				blockIndex,
				'blockShortQuestion',
			]) as UntypedFormArray;
		}

		return this.mainForm.get(['categories', CatIndex, 'categoryPages', PageIndex, 'blocks']) as UntypedFormArray;
	}

	getCategoryPagesInformationsProperties(CatIndex: number, PageIndex: number, property: string): UntypedFormGroup {
		return this.mainForm.get(['categories', CatIndex, 'categoryPages', PageIndex, 'pageInformations', property]) as UntypedFormGroup;
	}

    getCategoryPagesInformationsPropertiesControl(i: number, onePageIndex: number, formArrayName: string, pageInformationsDescriptionKey: number): FormControl {
        return this.getCategoryPagesInformationsProperties(
            i,
            onePageIndex,
            'pageInformationsDescription'
        ).controls[pageInformationsDescriptionKey] as FormControl
    }

	getCategoryPagesBlocksAttributes(CatIndex, PageIndex, BlockIndex): UntypedFormGroup {
		return this.mainForm.get([
			'categories',
			CatIndex,
			'categoryPages',
			PageIndex,
			'blocks',
			BlockIndex,
			'@attributes',
		]) as UntypedFormGroup;
	}

    getrecommendationContentControl(content: AbstractControl, recommendationContentKey: number): FormControl {
		return this.getRecommendationsContentArrayGroup(content).controls[recommendationContentKey] as FormControl;
	}

	get categoryPages() {
		console.log('categoryNames');
		console.log(this.mainForm.get('categories'));
		return this.mainForm.get(['categories', 0, 'categoryName']) as UntypedFormArray;
	}

	getBlockPropValueLength(CatIndex: number, PageIndex: number, blockIndex: number, blockShortQuestionKey: string): number {
		const blockControlValue: string | null = this.mainForm.get([
			'categories',
			CatIndex,
			'categoryPages',
			PageIndex,
			'blocks',
			blockIndex,
			'blockShortQuestion',
			blockShortQuestionKey,
		]).value;

		return blockControlValue === null ? 0 : blockControlValue.length;
	}

	/**
	 * Create one category in form group
	 *
	 * @param oneCat the category data
	 * @returns the formgroup wit one category
	 */
	initCategoryGroup(oneCat: any, index: number): UntypedFormGroup {
		// Myabe the values are not there cause of missing recommendatins plugin. So we have to check and give default values
		const recommendationsIsUsed: boolean = (typeof(oneCat.recommendationsIsUsed) !== 'undefined') && (oneCat.recommendationsIsUsed === '1') ? true : false;
		let recommendationsRanges: string | string[] = typeof(oneCat.recommendationsGroup) !== 'undefined' ? oneCat.recommendationsGroup.recommendationsRanges : ['50'];
		if (typeof recommendationsRanges === 'string') {
			recommendationsRanges = [recommendationsRanges] as string[];
		}
		const recommendationsActive: boolean[] = typeof(oneCat.recommendationsGroup) !== 'undefined' ? this.getRecommendationsConnect(oneCat.recommendationsGroup.recommendationsContentArray) : [true,true];
		const recommendationsContentArray: boolean[] = typeof(oneCat.recommendationsGroup) !== 'undefined' ? oneCat.recommendationsGroup.recommendationsContentArray : [{isActive: '1', recommendationContent: {}},{isActive: '1', recommendationContent: {}}];

		// Now we create the options for the nouislider for this category
		this.recommendationsConfig[index] = {
			connect: recommendationsActive,
			tooltips: true,
			start: recommendationsRanges, // Handle start position
			step: 1, // Slider moves in increments of '5'
			margin: 1,
			range: {
				min: [0],
				max: [100]
			},
			pips: {
				mode: 'steps',
				density: 1,
				filter: this.filterPips
			}
		}

		const group = this.fb.group({
			identifier: this.fb.control(oneCat.identifier ? oneCat.identifier : this.translateService.instant('category')),
			categoryName: this.fb.group({}),
			recommendationsIsUsed: this.fb.control(recommendationsIsUsed),
			recommendationsGroup: this.fb.group({
				recommendationsRanges: this.fb.control(recommendationsRanges),
				recommendationsContentArray: this.fb.array(this.initRecommendationsArray(recommendationsContentArray)),
			}),
			evaluateCategory: this.fb.control(oneCat.evaluateCategory === '0' ? false : true, Validators.required),
			categoryPages: this.fb.array(this.initPages(oneCat.categoryPages, index)),
			// categoryPages: this.fb.array([this.fb.group({})])
		});
		console.log('group init');
		console.log(group);

		const categoryNameGroup = group.get('categoryName');

		console.log('categoryNameGroup', categoryNameGroup);

		// if (this.categoryNamesForUniqueTest[index]) {
			this.categoryNamesForUniqueTest.splice(index, 0, oneCat.categoryName);
		// } else {
		// 	this.categoryNamesForUniqueTest[index] = categoryNameGroup.value;
		// }
		// this.categoryNamesForUniqueTest[index] = categoryNameGroup.value;

		console.log('this.categoryNamesForUniqueTest', this.categoryNamesForUniqueTest);

		this.addLanguageFormControll(categoryNameGroup, oneCat.categoryName, false, 0, {
			catNames: this.categoryNamesForUniqueTest,
		});

		if (oneCat.catcolor) {
			const control = this.fb.control(oneCat.catcolor, Validators.required);
			group.addControl('catcolor', control);
		}

		// Init catRecommendations
		// if (!typeof(oneCat.catRecommendationsIsUsed) {
		// 	console.log('categoryPage.pageInformations');
		// 	console.log(categoryPage.pageInformations);
		// 	pageInformationsAttributesGroup = group.get('pageInformations').get('@attributes') as FormGroup;

		// 	this.setAttributes(pageInformationsAttributesGroup, categoryPage.pageInformations['@attributes'], true);
		// 	console.log('pageInformationsAttributesGroup');
		// 	console.log(pageInformationsAttributesGroup);
		// 	// TODO: information must be there and we need a toggler for them
		// 	if (categoryPage.pageInformations.pageInformationsDescription) {
		// 		pageInformationsDescriptionGroup = group.get('pageInformations').get('pageInformationsDescription') as FormGroup;
		// 		this.addLanguageFormControll(
		// 			pageInformationsDescriptionGroup,
		// 			categoryPage.pageInformations.pageInformationsDescription,
		// 			true
		// 		);
		// 	}

		// 	if (categoryPage.pageInformations.pageInformationsSubtitle) {
		// 		pageInformationsSubtitleGroup = group.get('pageInformations').get('pageInformationsSubtitle') as FormGroup;
		// 		this.addLanguageFormControll(
		// 			pageInformationsSubtitleGroup,
		// 			categoryPage.pageInformations.pageInformationsSubtitle,
		// 			true
		// 		);
		// 	}
		// }

		return group;
	}

	/**
	 * Creates an array with all formgroups which contains categories
	 *
	 * @returns the array with all formgroups which contains categories
	 */
	initCategories(): UntypedFormGroup[] {
		// console.log('this.categories');
		// 	console.log(this.categories);
		const groups = [];
		// const categoryControlArray = this.categories;
		if (this.questionnaireData && this.questionnaireData.categories) {
			this.questionnaireData.categories.forEach((oneCat, index) => {
				// this.toggleCatColor[index] = false;
				// const group = this.fb.group({
				// 	categoryName: this.fb.group({}),
				// 	evaluateCategory: this.fb.control(
				// 		oneCat.evaluateCategory === '0' ? false : true,
				// 		Validators.required
				// 	),
				// 	categoryPages: this.fb.array(this.initPages(oneCat.categoryPages))
				// 	// categoryPages: this.fb.array([this.fb.group({})])
				// });
				// console.log('group init');
				// console.log(group);

				// const categoryNameGroup = group.get('categoryName');
				// this.addLanguageFormControll(categoryNameGroup, oneCat.categoryName);

				// if (oneCat.catcolor) {
				// 	const control = this.fb.control(
				// 		`rgb(${oneCat.catcolor.red},${oneCat.catcolor.green},${
				// 			oneCat.catcolor.blue
				// 		})`,
				// 		Validators.required
				// 	);
				// 	group.addControl('catcolor', control);
				// }
				const group = this.initCategoryGroup(oneCat, index);
				groups.push(group);
				// this.mainFormReady = true;
				console.log('groups init');
				console.log(groups);
			});
		}
		return groups;
	}

	getRecommendationsConnect(contentArray: any[]): boolean[] {
		let connect: boolean[] = [];
		contentArray.forEach((content: any) => {
			const isActive = content.isActive === '1' ? true : false;
			connect.push(isActive);
		});

		return connect;
	}

	initRecommendationsArray(contentArray: any[]): UntypedFormGroup[] {
		const groups: UntypedFormGroup[] = [];
		contentArray.forEach((content: any) => {
			const group: UntypedFormGroup = this.initRecommendationsArrayGroup(content);
			groups.push(group);
		});
		return groups;
	}

	initRecommendationsArrayGroup(content: any): UntypedFormGroup {
		let recommendationContentGroup: UntypedFormGroup;
		const isActive = content.isActive === '1' ? true : false;
		const group: UntypedFormGroup = this.fb.group({
			isActive: this.fb.control(isActive),
			recommendationContent: this.fb.group({}), // Group for the diferent languages
		});
		recommendationContentGroup = group.get('recommendationContent') as UntypedFormGroup;
		this.addLanguageFormControll(
			recommendationContentGroup,
			content.recommendationContent,
			true
		);
		return group;
	}

	/**
	 * Create one page in form group
	 *
	 * @param categoryPage the page data
	 * @returns the formgroup with one page
	 */
	initPageGroup(categoryPage: PageData, catIndex: number): UntypedFormGroup {
		let pageInformationsAttributesGroup: UntypedFormGroup,
			pageInformationsDescriptionGroup: UntypedFormGroup,
			pageInformationsSubtitleGroup: UntypedFormGroup;
		const group = this.fb.group({
			identifier: this.fb.control(categoryPage.identifier ? categoryPage.identifier : this.translateService.instant('page')),
			pageInformations: this.fb.group({
				'@attributes': this.fb.group({}),
				showPageInformations: this.fb.control(
					categoryPage.pageInformations.showPageInformations === '0' ? false : true,
					Validators.required
				),
				pageInformationsDescription: this.fb.group({}),
				pageInformationsSubtitle: this.fb.group({}),
			}),
			blocks: this.fb.array(this.initBlocks(categoryPage.blocks, catIndex)),
			pageEvaluate: this.fb.control(categoryPage.pageEvaluate === '0' ? false : true, Validators.required),
		});
		console.log('group init');
		console.log(group);

		// Object.keys(oneCat.categoryName).forEach(index => {
		// 	this.addLanguageFormControll(
		// 		group.get('categoryName'),
		// 		index,
		// 		oneCat.categoryName[index]
		// 	);
		// });

		// Init pageInformationsAttributes
		if (categoryPage.pageInformations) {
			console.log('categoryPage.pageInformations');
			console.log(categoryPage.pageInformations);
			pageInformationsAttributesGroup = group.get('pageInformations').get('@attributes') as UntypedFormGroup;

			this.setAttributes(pageInformationsAttributesGroup, categoryPage.pageInformations['@attributes'], true);
			console.log('pageInformationsAttributesGroup');
			console.log(pageInformationsAttributesGroup);
			// TODO: information must be there and we need a toggler for them
			if (categoryPage.pageInformations.pageInformationsDescription) {
				pageInformationsDescriptionGroup = group.get('pageInformations').get('pageInformationsDescription') as UntypedFormGroup;
				this.addLanguageFormControll(
					pageInformationsDescriptionGroup,
					categoryPage.pageInformations.pageInformationsDescription,
					true
				);
			}

			if (categoryPage.pageInformations.pageInformationsSubtitle) {
				pageInformationsSubtitleGroup = group.get('pageInformations').get('pageInformationsSubtitle') as UntypedFormGroup;
				this.addLanguageFormControll(
					pageInformationsSubtitleGroup,
					categoryPage.pageInformations.pageInformationsSubtitle,
					true
				);
			}
		}
		return group;
	}

	/**
	 * Creates an array with all formgroups which contains pages
	 *
	 * @param categoryPages the page data
	 * @returns the array with all formgroups which contains pages
	 */
	initPages(categoryPages: any, catIndex: number): UntypedFormGroup[] {
		const groups: UntypedFormGroup[] = [];
		if (this.questionnaireData && this.questionnaireData.categories) {
			categoryPages.forEach(categoryPage => {
				const group = this.initPageGroup(categoryPage, catIndex);

				groups.push(group);
				console.log('groups init');
				console.log(groups);
			});
		}
		return groups;
	}

	/**
	 * Creates a Formgroup with all block data
	 *
	 * @param block the block data
	 * @returns The group with the block data
	 */
	initBlockGroup(block: any, catIndex: number): UntypedFormGroup {
		let blockQuestionGroup: UntypedFormGroup, blockShortQuestionGroup: UntypedFormGroup;

		const group = this.fb.group({
			identifier: this.fb.control(block.identifier ? block.identifier : this.translateService.instant('block')),
			'@attributes': this.fb.group({}),
			blockQuestion: this.fb.group({}),
			blockShortQuestion: this.fb.group({}),
			blockAnswers: this.fb.array(this.initBlockAnswers(block.blockAnswers, block['@attributes'].type)),
		});
		const blockGroup = group.get('@attributes') as UntypedFormGroup;
		this.setAttributes(blockGroup, block['@attributes'], true);

		blockQuestionGroup = group.get('blockQuestion') as UntypedFormGroup;
		this.addLanguageFormControll(blockQuestionGroup, block.blockQuestion);

		blockShortQuestionGroup = group.get('blockShortQuestion') as UntypedFormGroup;
		this.addLanguageFormControll(
			blockShortQuestionGroup,
			typeof block.blockShortQuestion === 'undefined' || block.blockShortQuestion === ''
				? block.blockQuestion
				: block.blockShortQuestion,
			false,
			40,
			false,
			catIndex
		);
		return group;
	}

	/**
	 * Creates an array with all formgroups which contains blocks
	 *
	 * @param blocks the block data
	 * @returns the array with all formgroups which contains blocks
	 */
	initBlocks(blocks: any, catIndex: number): UntypedFormGroup[] {
		// console.log('this.categories');
		// 	console.log(this.categories);
		const groups: UntypedFormGroup[] = [];
		// const categoryControlArray = this.categories;
		if (this.questionnaireData && this.questionnaireData.categories) {
			blocks.forEach(block => {
				const group = this.initBlockGroup(block, catIndex);

				groups.push(group);
				// this.mainFormReady = true;
				console.log('groups init');
				console.log(groups);
			});
		}
		return groups;
		// categoryControlArray.push(this.fb.control(''));
		// console.log('categoryControlArray');
		// console.log(categoryControlArray);
		// return group;
	}

	/**
	 * Creates a Formgroup with all answer data
	 *
	 * @param answer the answer data
	 * @returns The group with the answer data
	 */
	initAnswerGroup(answer: AnswerData, inputType?: string): UntypedFormGroup {
		console.log('initanswer answer', answer);
		const initValue = this.attributes.values.find(value => {
			return answer.answerValue === value.value;
		});
		let blockAnswerGroup: UntypedFormGroup;
		const group = this.fb.group({
			identifier: this.fb.control(answer.identifier ? answer.identifier : this.translateService.instant('answer')),
			blockAnswer: this.fb.group({}),
			answerValue: this.fb.control(null, Validators.required),
		});

		const values = group.get('answerValue') as UntypedFormControl;
		values.setValue(initValue.value);
		blockAnswerGroup = group.get('blockAnswer') as UntypedFormGroup;

		this.addLanguageFormControll(
			blockAnswerGroup,
			answer.blockAnswer,
			(inputType === 'input') || (inputType === 'inputrange') ? true : false // Validators not required?
		);

		return group;
	}

	/**
	 * Creates an array with all formgroups which contains answers
	 *
	 * @param blockAnswers the answers data
	 * @returns the array with all formgroups which contains answers
	 */
	initBlockAnswers(blockAnswers: any, inputType: string): UntypedFormGroup[] {
		const groups: UntypedFormGroup[] = [];
		if (this.questionnaireData && this.questionnaireData.categories) {
			blockAnswers.forEach(answer => {
				// gives one AnswerGroup
				const group = this.initAnswerGroup(answer, inputType);
				groups.push(group);
			});
		}
		return groups;
	}

	/**
	 * Creates a new answer Formgroup in the answerformarray after the given answer index
	 *
	 * @param i category index
	 * @param onePageIndex page index
	 * @param oneBlockIndex block index
	 * @param blockAnswerIndex answer index
	 */
	addAnswerControl(i: number, onePageIndex: number, oneBlockIndex: number, blockAnswerIndex: number): void {
		const answerFormArray: UntypedFormArray = this.getCategoryPagesBlocksProperties(
			i,
			onePageIndex,
			oneBlockIndex,
			false,
			null,
			true
		) as UntypedFormArray;
		const group = this.initAnswerGroup(cloneDeep(emptyAnswerData), 'radio');
		answerFormArray.insert(blockAnswerIndex + 1, group);
		// answerFormArray.push(group);
	}

	/**
	 * Creates a new block Formgroup in the blockformarray after the given block index
	 *
	 * @param i category index
	 * @param onePageIndex page index
	 * @param oneBlockIndex block index
	 */
	addBlockControl(i: number, onePageIndex: number, oneBlockIndex: number): void {
		const blockFormArray: UntypedFormArray = this.getCategoryPagesBlocksProperties(i, onePageIndex) as UntypedFormArray;
		const group = this.initBlockGroup(cloneDeep(emptyBlockData), i);
		blockFormArray.insert(oneBlockIndex + 1, group);
		// answerFormArray.push(group);
	}

	/**
	 * Creates a new page Formgroup in the pageformarray after the given page index
	 *
	 * @param i category index
	 * @param onePageIndex page index
	 */
	addPageControl(index: number, onePageIndex: number): void {
		const pageFormArray: UntypedFormArray = this.getCategoryPages(index) as UntypedFormArray;
		const group = this.initPageGroup(cloneDeep(emptyPageData), index);
		pageFormArray.insert(onePageIndex + 1, group);
		// answerFormArray.push(group);
	}

	/**
	 * Creates a new category Formgroup in the catsformarray after the given category index
	 *
	 * @param index category index
	 */
	addCatControl(index: number): void {
		const catFormArray: UntypedFormArray = this.categories;
		const group = this.initCategoryGroup(cloneDeep(emptyCatData), index + 1);
		catFormArray.insert(index + 1, group);
	}

	/**
	 * Removes a form element at the given index
	 *
	 * @param formArray the formarray
	 * @param index the index to remove from the array
	 */
	removeFormElementAtIndex(formArray: UntypedFormArray, index: number): void {
		formArray.removeAt(index);
	}

	/**
	 * Removes a category or page or block or answer from the given form array
	 *
	 * @param i the index of category
	 * @param onePageIndex the index of page if we want to delete a page
	 * @param oneBlockIndex the index of category if we want to delete a block
	 * @param blockAnswerIndex the index of category if we want to delete an answer
	 */
	deleteSegment(i: number, onePageIndex?: number, oneBlockIndex?: number, blockAnswerIndex?: number): void {
		let formArray: UntypedFormArray, index: number;
		const data = { modalString: '' };
		if (blockAnswerIndex === 0 || blockAnswerIndex) {
			index = blockAnswerIndex;
			formArray = this.getCategoryPagesBlocksProperties(i, onePageIndex, oneBlockIndex, false, null, true) as UntypedFormArray;
			data.modalString = 'deleteAnswerSegment';
		} else if (oneBlockIndex === 0 || oneBlockIndex) {
			index = oneBlockIndex;
			formArray = this.getCategoryPagesBlocksProperties(i, onePageIndex) as UntypedFormArray;
			data.modalString = 'deleteBlockSegment';
		} else if (onePageIndex === 0 || onePageIndex) {
			index = onePageIndex;
			formArray = this.getCategoryPages(i) as UntypedFormArray;
			data.modalString = 'deletePageSegment';
		} else if (typeof onePageIndex === 'undefined') {
			index = i;
			formArray = this.categories as UntypedFormArray;
			data.modalString = 'deleteCategorySegment';
		}

		const dialogRef = this.dialog.open(LanguageModalComponent, {
			data: data,
		});

		this.deleteSegmentSubscription = dialogRef.afterClosed().subscribe(result => {
			console.log(`Dialog result: ${result}`);
			if (result === true) {
				if (data.modalString === 'deleteCategorySegment') {
					console.log('cat is deleted', data.modalString);
					console.log('cat is deleted this.categoryNamesForUniqueTest before', this.categoryNamesForUniqueTest);
					this.categoryNamesForUniqueTest.splice(i, 1);
					console.log('cat is deleted this.categoryNamesForUniqueTest after', this.categoryNamesForUniqueTest);
				}
				this.removeFormElementAtIndex(formArray, index);
			}
		});
	}

	/**
	 * All data from the form is send to the home component. If the language is switched, we need to save the changed values.
	 * So the new generated form has the values back. We also need it to send all data to the php backend and to create the xml file.
	 *
	 * @returns the formgroup with all category data
	 */
	sendAllMainFormData(): CatData {
		// let catCounter = 0;
		let formCategories: any = cloneDeep(this.mainForm.value.categories);

		console.log('formCategegories group');
		console.log(this.mainForm);

		console.log('formCategegories blalaelfaefasef');
		console.log(formCategories);

		// for (catCounter; catCounter < formCategories.length; catCounter++) {
		// 	let pageCounter = 0;
		// 	formCategories[catCounter].evaluateCategory = formCategories[catCounter].evaluateCategory ? '1' : '0';

		// 	for (pageCounter; pageCounter < formCategories[catCounter].categoryPages.length; pageCounter++) {
		// 		// let blockCounter = 0;
		// 		formCategories[catCounter].categoryPages[pageCounter].pageEvaluate = formCategories[catCounter].categoryPages[
		// 			pageCounter
		// 		].pageEvaluate
		// 			? '1'
		// 			: '0';

		// 		formCategories[catCounter].categoryPages[pageCounter].pageInformations.showPageInformations = formCategories[
		// 			catCounter
		// 		].categoryPages[pageCounter].pageInformations.showPageInformations
		// 			? '1'
		// 			: '0';
		// 	}
		// }

		formCategories = formCategories.map((formCategory) => {
			formCategory.evaluateCategory = formCategory.evaluateCategory ? '1' : '0';
			formCategory.recommendationsIsUsed = formCategory.recommendationsIsUsed ? '1' : '0';
			formCategory.recommendationsGroup.recommendationsContentArray.forEach((content: any, index: number): void => {
				formCategory.recommendationsGroup.recommendationsContentArray[index].isActive = content.isActive ? '1' : '0';
			});

			formCategory.categoryPages = formCategory.categoryPages.map((categoryPage) => {
				categoryPage.pageEvaluate = categoryPage.pageEvaluate ? '1' : '0';
				categoryPage.pageInformations.showPageInformations = categoryPage.pageInformations.showPageInformations ? '1' : '0';

				categoryPage.blocks = categoryPage.blocks.map((block) => {
					if (block['@attributes'].type === 'inputrange') {
						block.blockAnswers = block.blockAnswers.slice(0, 2);
					}
					return block;
				});
				return categoryPage;
			});
			return formCategory;
		});
		console.log('formCategegories after map', formCategories);

		return formCategories;
	}

	formTest() {
		console.log('this.mainForm in formTest');
		console.log(this.mainForm);
	}

	/**
	 * Check, if mainform is dirty
	 */
	isMainFormDirty(): boolean {
		return this.mainForm && this.mainForm.dirty;
	}

	/**
	 * If we want pageinformations, form is visible in template and validators are enabled. Otherwise they are hidden in the form and we disable the validators,
	 * to have no dirty form.
	 *
	 * @param event the change event
	 */
	showPageInformationToggle(event: MatSlideToggleChange, catIndex: number, pageIndex: number): void {
		// this.wantHeaderButton = event.checked;

		if (event.checked) {
			this.switchValidatorsinGroup(
				this.getCategoryPagesInformationsProperties(catIndex, pageIndex, 'pageInformationsSubtitle') as UntypedFormGroup,
				true
			);
			this.switchValidatorsinGroup(
				this.getCategoryPagesInformationsProperties(catIndex, pageIndex, 'pageInformationsDescription') as UntypedFormGroup,
				true
			);
		} else {
			this.switchValidatorsinGroup(
				this.getCategoryPagesInformationsProperties(catIndex, pageIndex, 'pageInformationsSubtitle') as UntypedFormGroup,
				false
			);
			this.switchValidatorsinGroup(
				this.getCategoryPagesInformationsProperties(catIndex, pageIndex, 'pageInformationsDescription') as UntypedFormGroup,
				false
			);
		}
	}

	/**
	 * If we need answers (checkboxes, radiobuttons) in the questions, we need validators, too. If not, we must not have them.
	 *
	 * @param event What type do we have?
	 * @param catIndex the index of the category
	 * @param pageIndex the index of the page
	 * @param blockIndex the index of the block
	 */
	inputTypeChange(event: MatSelectChange, catIndex: number, pageIndex: number, blockIndex: number): void {
		const answers: UntypedFormArray = this.getCategoryPagesBlocksProperties(
			catIndex,
			pageIndex,
			blockIndex,
			false,
			null,
			true
		) as UntypedFormArray;

		// If we switch to inputrange we need at least 2 answers
		if (event.value === 'inputrange') {
			if (answers.length < 2) {
				this.addAnswerControl(catIndex, pageIndex, blockIndex, 1);

			}
		}

		if (event.value === 'input' || event.value === 'inputrange') {
			answers.controls.forEach((answer: UntypedFormGroup) => {
				const answerFormGroup: UntypedFormGroup = answer.get('blockAnswer') as UntypedFormGroup;
				this.switchValidatorsinGroup(answerFormGroup, false);
			});
		} else {
			answers.controls.forEach((answer: UntypedFormGroup) => {
				const answerFormGroup: UntypedFormGroup = answer.get('blockAnswer') as UntypedFormGroup;
				this.switchValidatorsinGroup(answerFormGroup, true);
			});
		}
	}

	colorChanged(value: string, controlName: string, categoryId: number): void {
		const colorControl = this.mainForm.get(['categories', categoryId, controlName]) as UntypedFormControl;
		colorControl.setValue(value);
	}

	/**
	 * For the validation of unique categorynames we need the object of all category names to pass it to the validator.
	 * Also we have to revalidate all category forms after the change of the input field
	 *
	 * @param catIndex the index of the category
	 * @param language the current language of the category name (Just the name in the same language has to be unique)
	 * @param value the value in the input field
	 */
	changeCategoryName(catIndex: number, language: string, event: Event): void {
        const input = event.target as HTMLInputElement;
		this.categoryNamesForUniqueTest[catIndex][language] = input.value;
		this.categories.controls.forEach((group: UntypedFormGroup, index: number) => {
			const control: UntypedFormControl = this.mainForm.get(['categories', index, 'categoryName', language]) as UntypedFormControl;
			control.updateValueAndValidity();
		});
	}

	changeRange(event: any, index: number): void {
		const control: UntypedFormControl = this.mainForm.get(['categories', index, 'recommendationsGroup', 'recommendationsRanges']) as UntypedFormControl;
		let valuesToConvert: string[] = [...event.values];
        const values: string[] = valuesToConvert.map(item => parseFloat(item).toString());
		control.setValue(values);

	}

	addRange(index: number): void {
		this.showRecommendationsRange[index] = false;
		const currentLength = this.recommendationsConfig[index].start.length;
		const recommendationsRanges: UntypedFormControl = this.mainForm.get(['categories', index, 'recommendationsGroup', 'recommendationsRanges']) as UntypedFormControl;
		const recommendationsContentArray: UntypedFormArray = this.mainForm.get(['categories', index, 'recommendationsGroup', 'recommendationsContentArray']) as UntypedFormArray;

		const newValues = this.getRecommendationsRangeValues(currentLength + 1);
		this.recommendationsConfig[index].start = newValues;
		

		// Add the editors in the form
		const recommendationsArrayGroup: UntypedFormGroup = this.initRecommendationsArrayGroup({isActive: '1', recommendationContent: {}});
		recommendationsContentArray.push(recommendationsArrayGroup);

		this.recommendationsConfig[index].connect = this.getRangeConnect(index);
		this.changeDetectorRef.detectChanges();
		
		console.log('range recommendationsRanges:', recommendationsRanges);
		recommendationsRanges.setValue(newValues);
		this.showRecommendationsRange[index] = true;
		console.log('mainForm after add range', this.mainForm);
	}

	deleteRange(index: number): void {
		const dialogRef = this.dialog.open(LanguageModalComponent, {
			data: { modalString: 'deleteRecommendationsSegment' },
		});

		this.deleteSegmentSubscription = dialogRef.afterClosed().subscribe(result => {
			console.log(`Dialog result: ${result}`);
			if (result === true) {
				this.showRecommendationsRange[index] = false;
				const recommendationsRanges: UntypedFormControl = this.mainForm.get(['categories', index, 'recommendationsGroup', 'recommendationsRanges']) as UntypedFormControl;
				const recommendationsContentArray: UntypedFormArray = this.mainForm.get(['categories', index, 'recommendationsGroup', 'recommendationsContentArray']) as UntypedFormArray;
				const currentLength: number = this.recommendationsConfig[index].start.length;
				console.log('currentLength', currentLength);

				const newValues: string[] = this.getRecommendationsRangeValues(currentLength - 1);
				this.recommendationsConfig[index].start = newValues;
				

				// Delete last Element from editors content array
				recommendationsContentArray.removeAt(recommendationsContentArray.length - 1);

				this.recommendationsConfig[index].connect = this.getRangeConnect(index);
				this.changeDetectorRef.detectChanges();
				recommendationsRanges.setValue(newValues);
				this.showRecommendationsRange[index] = true;
				console.log('mainForm after adelete range', this.mainForm);
			}
		});
		
	}

	getRecommendationsRangeValues(length: number): string[] {
		let newValues = [];
		const baseValue = Math.floor(100 / (length + 1));
		
		for (let x = 1; x <= length; x++) {
			newValues.push(baseValue * x);
		}
		console.log('clac newValues', newValues);
		return newValues;
	}

	filterPips(value) {
		return value % 10 ? -1 : 2;
	}

	getRangeConnect(index: number): boolean[] {
		const recommendationsContentArrayValue = this.mainForm.get(['categories', index, 'recommendationsGroup', 'recommendationsContentArray']).value;
		const newConnect: boolean[] = [];
		recommendationsContentArrayValue.forEach((value: any): void => {
			newConnect.push(value.isActive);
		});
		return newConnect;
	}

	changeRangeConnect(event: any, catIndex: number, recommendationsContentIndex: number, oneCat: any): void {
		const value = oneCat.get(['recommendationsGroup', 'recommendationsRanges']).value;
		this.showRecommendationsRange[catIndex] = false;
		this.recommendationsConfig[catIndex].connect[recommendationsContentIndex] = event.checked;
		this.recommendationsConfig[catIndex].start = value;
		this.changeDetectorRef.detectChanges();
		this.showRecommendationsRange[catIndex] = true;
	}

	showHelp(title, description) {
		console.log('showHelp');
		this.dialog.open(LanguageModalComponent, {
			data: {
				title,
				modalString: description,
				onlyClose: true
			},
		});
	}

	togglePanel(i, event, pageIndex?: number) {
		if (typeof pageIndex === 'undefined') { // only category is toggled
			console.log('event toggle is target cat', event);
			if (this.categoryExtensionPanelExpanded !== i) {
				this.ngxLoaderService.start();
			}
			setTimeout(() => {
				this.categoryExtensionPanelExpanded = i === this.categoryExtensionPanelExpanded ? -1 : i;
			});
		}

		if (typeof pageIndex !== 'undefined') { // page is toggled
			if (this.categoryPageExtensionPanelExpanded !== `${i}_${pageIndex}`) {
				this.ngxLoaderService.start();
			}
			setTimeout(() => {
				this.categoryPageExtensionPanelExpanded = this.categoryPageExtensionPanelExpanded === `${i}_${pageIndex}` ? '-1' : `${i}_${pageIndex}`;
			});
		}
	}

	expanded() {
		this.ngxLoaderService.stop();
	}

	isTypeOf(variable: any, mode: string): boolean {
		return typeof variable === mode;
	}

	dropExpansion(event: CdkDragDrop<[]>, arrayToSwap: UntypedFormArray, formArrayType?: string): void {
		if ((event.previousContainer === event.container) && ((formArrayType !== 'category') || (event.previousIndex > 0 && event.currentIndex > 0))) {
			const controlToMove = arrayToSwap.at(event.previousIndex);
			arrayToSwap.removeAt(event.previousIndex);
			if (formArrayType === 'category') {
				this.showRecommendationsRange[event.previousIndex] = false;
				this.showRecommendationsRange[event.currentIndex] = false;
				this.changeDetectorRef.detectChanges();
				this.showRecommendationsRange[event.previousIndex] = true;
				this.showRecommendationsRange[event.currentIndex] = true;
			}
			this.changeDetectorRef.detectChanges();
			arrayToSwap.insert(event.currentIndex, controlToMove);
		}
	}

	clickOnHeaderInput(event): void {
		event.stopPropagation();
	}
}
