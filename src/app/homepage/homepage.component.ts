import { FinishComponent } from './../finish/finish.component';
import { UntypedFormGroup } from '@angular/forms';
import { Observable, Subscription } from 'rxjs';
import { HeroesService } from './../connector.service';
import {
	Component,
	OnInit,
	ViewChild,
	ContentChild,
	AfterViewInit,
	OnDestroy
} from '@angular/core';
import { FormCanDeactivate } from '../form-can-deactivate/form-can-deactivate';
import { QuestFormComponent } from '../quest-form/quest-form.component';
import { QuestHeaderComponent } from '../quest-header/quest-header.component';
import { QuestResultComponent } from '../quest-result/quest-result.component';
import { GeneralComponent } from '../general/general.component';
import { Languages } from '../interfaces';
import { HomePageService } from './homepage.service';
import { FooterComponent } from '../footer/footer.component';

@Component({
	selector: 'app-homepage',
	templateUrl: './homepage.component.html',
	styleUrls: ['./homepage.component.scss']
})
export class HomepageComponent extends FormCanDeactivate
	implements OnInit, AfterViewInit, OnDestroy {
	@ViewChild(GeneralComponent, { static: true }) generalComponent: GeneralComponent;
	@ViewChild(QuestHeaderComponent, { static: true }) questHeaderComponent: QuestHeaderComponent;
	@ViewChild(QuestFormComponent, { static: true }) questFormComponent: QuestFormComponent;
	@ViewChild(FooterComponent, { static: true }) questFooterComponent: FooterComponent;
	@ViewChild(QuestResultComponent, { static: true }) questResultComponent: QuestResultComponent;
	@ViewChild(FinishComponent, { static: true }) questFinishComponent: FinishComponent;

	generalForm: UntypedFormGroup;
	headerForm: UntypedFormGroup;
	mainForm: UntypedFormGroup;
	resultForm: UntypedFormGroup;
	finishForm: UntypedFormGroup;
	posts;
	// subscription: Subscription;
	questNames;
	selected = 'option2';
	headerDisabled = true;
	mainDisabled = true;
	footerDisabled = true;
	resultDisabled = true;
	questionnaireData;
	childFormsAreDirty = false;
	finishDisabled = true;
	emitGeneralFormValidInfoSubscription: Subscription;
	emitQuestionnaireDataSubscription: Subscription;
	emitLanguageChangeEventSubscription: Subscription;
	sendQuestDataToWpSubscription: Subscription;
	allFormsStatus: any = {
		language: true,
		header: true,
		main: true,
		footer: true,
		result: true,
		finish: true
	};

	constructor(
		private connector: HeroesService,
		private homePageService: HomePageService
	) {
		super();
	}

	/**
   * The expanders only opens, if a form is valid. TODO: not nice. What if a edit form is not valid?
   * questionaireData are loaded
   * If langauge is changed, the complete form will be stored.
   * Status of all forms are stored
   */
	ngOnInit(): void {
		this.emitGeneralFormValidInfoSubscription = this.connector.emitGeneralFormValidInfo.subscribe(
			isFormValid => {
				if (isFormValid) {
					this.headerDisabled = false;
					this.mainDisabled = false;
					this.footerDisabled = false;
					this.resultDisabled = false;
					this.finishDisabled = false;
				} else {
					this.headerDisabled = true;
					this.mainDisabled = true;
					this.footerDisabled = true;
					this.resultDisabled = true;
					this.finishDisabled = true;
				}
			}
		);
		this.emitQuestionnaireDataSubscription = this.connector.emitQuestionnaireData.subscribe(
			questData => {
				this.questionnaireData = questData;
			}
		);

		this.emitLanguageChangeEventSubscription = this.connector.emitLanguageChangeEvent.subscribe(
			() => {
				this.completeFormSaver();
			}
		);

		this.connector.saveFormEvent.subscribe(fileName => {
			this.saveAndCreate(fileName);
		});

		this.connector.sendFormValidStatus.subscribe(allFormsStatus => {
			this.allFormsStatus = { ...allFormsStatus };
		});
	}

	/**
   * Some subscriptons if exist
   */
	ngOnDestroy(): void {
		this.emitGeneralFormValidInfoSubscription.unsubscribe();
		this.emitQuestionnaireDataSubscription.unsubscribe();
		this.emitLanguageChangeEventSubscription.unsubscribe();
		if (typeof this.sendQuestDataToWpSubscription !== 'undefined') {
			this.sendQuestDataToWpSubscription.unsubscribe();
		}
	}

	/**
   * Get the mainform of questformComponent if rendered
   */
	ngAfterViewInit(): void {
		// this.generalForm = this.generalComponent.languageFormGroup;
		// this.headerForm = this.questHeaderComponent.headerForm;
		// this.mainForm = this.questFormComponent.mainForm;
		// this.resultForm = this.questResultComponent.resultForm;
		// this.finishForm = this.questFinishComponent.finishFormGroup;
	}

	canDeactivateFormGroupSetter(formValues: any): void {
		const formName = formValues.formName;
		this[formName] = formValues.form;
	}

	/**
   * Save data in all forms in the child components and put it in this.questionnaireData
   */
	completeFormSaver(): void {
		// General data
		const generalData = this.generalComponent.sendAllGeneralFormData();
		this.questionnaireData.config.language.default =
			generalData.languageDefault;
		this.questionnaireData.config.language.languages =
			generalData.possibleDefaultLanguages;
		console.log('this.questionnaireData.config.language.languages');
		console.log(this.questionnaireData.config.language.languages);
		// HeaderData
		const headerData = this.questHeaderComponent.sendAllHeaderFormData();
		this.questionnaireData.head.button.link = headerData.button.link;
		this.questionnaireData.head.button.text = headerData.button.text;
		this.questionnaireData.head.title = headerData.title;
		this.questionnaireData.head.logo = headerData.logo;
		this.questionnaireData.head.backgroundImage = headerData.backgroundImage;
		this.questionnaireData.config.showHeaderButton = headerData.isHeaderButton;
		// MainForm Data
		const mainFormCategories = this.questFormComponent.sendAllMainFormData();
		this.questionnaireData.categories = mainFormCategories;
		// FooterForm Data
		const footerForm = this.questFooterComponent.sendAllFooterFormData();
		this.questionnaireData.footer = footerForm;
		// ResultForm Data
		const resultFormData = this.questResultComponent.sendAllResultFormData();
		this.questionnaireData.resultpage = { ...resultFormData.resultPage };
		this.questionnaireData.config.graphs = { ...resultFormData.graphs };
		this.questionnaireData.config.priorityListObject.priorityList = [ ...resultFormData.priorityList ];
		this.questionnaireData.config.recommendationsIsUsed = resultFormData.recommendationsIsUsed;
		// FinishForm Data
		const finishFormData = this.questFinishComponent.sendAllFinishFormData();
		this.questionnaireData.config.questionnaireFileName =
			finishFormData.questionnaireFileName;
		this.questionnaireData.config.mainColors = {
			...finishFormData.mainColorGroup
		};
		this.questionnaireData.config.pdfGroup = {
			...finishFormData.pdfGroup
		};
		this.questionnaireData.metaData = { ...this.questionnaireData.metaData, ...finishFormData.finishMetaDataGroup };

		console.log('home comp finishformdata');
		console.log(finishFormData);

		console.log('home comp questdata');
		console.log(this.questionnaireData);

		this.connector.emitQuestData(this.questionnaireData);
	}

	/**
   * All data of the childcomponents forms send to wp where the xml file will be builded
   *
   * @param fileName the filename for the questionnaire xml file
   */
	saveAndCreate(fileName: string): void {
		this.completeFormSaver();
		console.log('questData after save');
		console.log(this.questionnaireData);
		this.sendQuestDataToWpSubscription = this.connector
			.sendQuestDataToWp(this.questionnaireData, fileName)
			.subscribe(questData => {});
	}

	/**
   * Checks, if at least one childform is dirty and set true or false in general component.
   * Is needed to decide, if we need a dialog when  another form will be loaded.
   * TODO: might be useles because we have the status now in the connector service
   */
	areChildFormsDirty(): void {
		this.childFormsAreDirty =
			this.generalComponent.isLanguageFormDirty() ||
			this.questHeaderComponent.isHeaderFormDirty() ||
			this.questFormComponent.isMainFormDirty() ||
			this.questFooterComponent.isfooterFormDirty() ||
			this.questResultComponent.isResultFormDirty();
		this.generalComponent.setChildFormsAreDirty(this.childFormsAreDirty);
	}
}
