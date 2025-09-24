import { Subscription } from 'rxjs';
import { cloneDeep } from 'lodash';
import { HeroesService } from './../connector.service';
import { Component, OnInit, OnDestroy, EventEmitter, Output } from '@angular/core';
import { UntypedFormControl, Validators, UntypedFormGroup, UntypedFormBuilder } from '@angular/forms';
import FormHelperClass from '../formHelperClass';
import { FooterFormData } from '../interfaces';
import { MatSlideToggleChange } from '@angular/material/slide-toggle';
import { MyErrorStateMatcher } from '../MyErrorStateMatcherClass';
import { POSSIBLE_LANGUAGES } from '../../config';


@Component({
	selector: 'app-footer',
	templateUrl: './footer.component.html',
	styleUrls: ['./footer.component.scss']
})
export class FooterComponent extends FormHelperClass implements OnInit, OnDestroy {
	footerForm: UntypedFormGroup;
	footerFormIsReady = false;
	matcher = new MyErrorStateMatcher();
	questionnaireData;
	wantfooterLogo = false;
	emitQuestionnaireDataSubscription: Subscription;
	footerFormStatus: string;
	footerFormStatusIsValidSubscription: Subscription;
	possibleLanguages: any = POSSIBLE_LANGUAGES;
	@Output() initialisedFormToParentComponent = new EventEmitter<any>();
	toggleFooterFontcolor = false;
	toggleFooterBackGroundcolor = false;
	urlPattern = 'https?:\/\/.+';

	// LinkControl = new FormControl('', [Validators.required]);
	// LinkTitleControl = new FormControl('', [Validators.required]);

	constructor(protected connector: HeroesService, fb: UntypedFormBuilder) {
		super(fb, connector);
	}

	/**
   * Init Catagory data.
   * Init the header form with the data after they arrived
   */
	ngOnInit(): void {

		this.emitQuestionnaireDataSubscription = this.connector.emitQuestionnaireData.subscribe(questData => {
			// this.questionnaireData = questData;
			// this.wantHeaderButton =
			// 	questData.config.showHeaderButton === '1' ? true : false;
			// this.questionnaireData = questData;

			this.footerForm = this.fb.group({
				footerLogo: this.fb.group({
					showFooterLogo: this.fb.control(questData.footer.footerLogo.showFooterLogo === '0' ? false : true, Validators.required),
					footerLogoUrl: this.fb.control(
						questData.footer.footerLogo.footerLogoUrl,
						questData.footer.footerLogo.showFooterLogo === '1'
							?
							[
								Validators.required,
								this.validateEmptyField,
								Validators.pattern(this.urlPattern)
							] : null
					)
				}),
				footerText: this.fb.group({}),
				footerRight: this.fb.group({}),
				fontColor: this.fb.control(questData.footer.fontColor, Validators.required),
				backgroundColor: this.fb.control(questData.footer.backgroundColor, Validators.required)
			});

			const footerTextGroup = this.footerForm.get('footerText');
			this.addLanguageFormControll(footerTextGroup, questData.footer.footerText, true);

			const footerRight = this.footerForm.get('footerRight');
			this.addLanguageFormControll(footerRight, questData.footer.footerRight, true);
			this.footerFormIsReady = true;

			this.initialisedFormToParentComponent.emit({
				formName: 'footerForm',
				form: this.footerForm
			});

			this.checkFormvalidStatus(this.footerFormStatusIsValidSubscription, this.footerForm, 'footerForm');
		});

		// this.connector.emitQuestionnaireData.subscribe(questData => {
		// 	this.questionnaireData = questData;
		// 	this.wantHeaderButton =
		// 		questData.config.showHeaderButton === '1' ? true : false;
		// });
	}

	/**
   * Only some unsubscriptions
   */
	ngOnDestroy(): void {
		this.emitQuestionnaireDataSubscription.unsubscribe();
		if (typeof this.footerFormStatusIsValidSubscription !== 'undefined') {
			this.footerFormStatusIsValidSubscription.unsubscribe();
		}
	}

	get footerWantLogoControll(): UntypedFormControl {
		return this.footerForm.get(['footerLogo', 'showFooterLogo']) as UntypedFormControl;
	}

	get footerLogoUrl(): UntypedFormControl {
		return this.footerForm.get(['footerLogo', 'footerLogoUrl']) as UntypedFormControl;
	}

	get footerFormText(): UntypedFormGroup {
		return this.footerForm.get('footerText') as UntypedFormGroup;
	}

	get footerFormRight(): UntypedFormGroup {
		return this.footerForm.get('footerRight') as UntypedFormGroup;
	}

    // Getter und Setter für fontColor
    get fontColor(): string {
        return this.footerForm.get(['fontColor']).value;
    }
    set fontColor(value: string) {
        this.footerForm.get(['fontColor']).setValue(value);
    }

    get backgroundColor(): string {
        return this.footerForm.get(['backgroundColor']).value;
    }
    set backgroundColor(value: string) {
        this.footerForm.get(['backgroundColor']).setValue(value);
    }

	// ngOnChanges() {
	// 	console.log('this.formReference.nativeElement.value');
	// 	console.log(this.formReference.nativeElement);
	// }

	/**
   * If we want a Logo in footer, form is visible in template and validators are enabled. Otherwise they are hidden in the form and we disable the validators,
   * to have no dirty form.
   *
   * @param event the change event
   */
	toggleLogo(event: MatSlideToggleChange): void {
		if (event.checked) {
			this.switchValidatorsinControl(this.footerLogoUrl, true, this.urlPattern, true);
		} else {
			this.switchValidatorsinControl(this.footerLogoUrl, false);
		}
	}

	/**
   * All data from the form is send to the home component. If the language is switched, we need to save the changed values.
   * So the new generated form has the values back. We also need it to send all data to the php backend and to create the xml file.
   *
   * @returns the formgroup with the header data
   */
	sendAllFooterFormData(): FooterFormData {
		const footerValues = cloneDeep(this.footerForm.value);
		console.log('footerValues first');
		console.log(this.footerForm);
		footerValues.footerLogo.showFooterLogo = footerValues.footerLogo.showFooterLogo === true ? '1' : '0';
		console.log('footerValues');
		console.log(this.footerForm);
		return footerValues;
	}

	/**
   * Check if footerform is dirty
   */
	isfooterFormDirty(): boolean {
		console.log('this.footerForm dirty');
		console.log(this.footerForm);

		return this.footerForm && this.footerForm.dirty;
	}

	colorChanged(value: string, controlName: string): void {
		const colorControl = this.footerForm.get([controlName]) as UntypedFormControl;
		colorControl.setValue(value);
	}
}
