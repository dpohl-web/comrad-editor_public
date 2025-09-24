import { Subscription } from 'rxjs';
import { HeroesService } from './../connector.service';
import { Component, OnInit, ViewChild, ElementRef, OnChanges, OnDestroy, EventEmitter, Output } from '@angular/core';
import { UntypedFormControl, FormGroupDirective, NgForm, Validators, UntypedFormGroup, UntypedFormBuilder } from '@angular/forms';
import FormHelperClass from '../formHelperClass';
import { HeaderFormData } from '../interfaces';
import { MatSlideToggleChange } from '@angular/material/slide-toggle';
import { MyErrorStateMatcher } from '../MyErrorStateMatcherClass';
import { POSSIBLE_LANGUAGES } from '../../config';

@Component({
	selector: 'app-quest-header',
	templateUrl: './quest-header.component.html',
	styleUrls: ['./quest-header.component.scss']
})
export class QuestHeaderComponent extends FormHelperClass implements OnInit, OnDestroy {
	headerForm: UntypedFormGroup;
	headerFormIsReady = false;
	matcher = new MyErrorStateMatcher();
	questionnaireData;
	wantHeaderButton = false;
	emitQuestionnaireDataSubscription: Subscription;
	headerFormStatus: string;
	headerFormStatusIsValidSubscription: Subscription;
	possibleLanguages: any = POSSIBLE_LANGUAGES;
	@Output() initialisedFormToParentComponent = new EventEmitter<any>();

	LinkControl = new UntypedFormControl('', [Validators.required]);
	LinkTitleControl = new UntypedFormControl('', [Validators.required]);

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

			this.headerForm = this.fb.group({
				questionnaireTitle: this.fb.group({}),
				logo: this.fb.group({
					showLogo: this.fb.control(questData.head.logo.showLogo === '0' ? false : true, Validators.required),
					url: this.fb.control(questData.head.logo.url, questData.head.logo.showLogo === '1' ? [Validators.required, this.validateEmptyField] : null)
				}),
				backgroundImage: this.fb.group({
					showBackgroundImage: this.fb.control(questData.head.backgroundImage.showBackgroundImage === '0' ? false : true, Validators.required),
					backgroundUrl: this.fb.control(
						questData.head.backgroundImage.backgroundUrl,
						questData.head.backgroundImage.showBackgroundImage === '1' ? [Validators.required, this.validateEmptyField] : null
					)
				}),
				isHeaderButton: this.fb.control(questData.config.showHeaderButton === '0' ? false : true, Validators.required),
				headerButtonUrl: this.fb.control(questData.head.button.link, questData.config.showHeaderButton === '1' ? [Validators.required, this.validateEmptyField] : null),
				headerButtonText: this.fb.group({})
			});
			const headerButtonTextGroup = this.headerForm.get('headerButtonText');
			this.addLanguageFormControll(headerButtonTextGroup, questData.head.button.text, questData.config.showHeaderButton === '0' ? true : false);

			const questionnaireTitleGroup = this.headerForm.get('questionnaireTitle');
			this.addLanguageFormControll(questionnaireTitleGroup, questData.head.title);
			this.headerFormIsReady = true;

			this.initialisedFormToParentComponent.emit({
				formName: 'headerForm',
				form: this.headerForm
			});

			this.checkFormvalidStatus(this.headerFormStatusIsValidSubscription, this.headerForm, 'headerForm');
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
		if (typeof this.headerFormStatusIsValidSubscription !== 'undefined') {
			this.headerFormStatusIsValidSubscription.unsubscribe();
		}
	}

	get headerButtonControll(): UntypedFormControl {
		return this.headerForm.get('isHeaderButton') as UntypedFormControl;
	}

	get headerLogoControll(): UntypedFormControl {
		return this.headerForm.get(['logo', 'showLogo']) as UntypedFormControl;
	}

	get headerBackgroundImageControll(): UntypedFormControl {
		return this.headerForm.get(['backgroundImage', 'showBackgroundImage']) as UntypedFormControl;
	}

	get headerFormButtonText(): UntypedFormGroup {
		return this.headerForm.get('headerButtonText') as UntypedFormGroup;
	}

	get headerFormQuestionnaireTitle(): UntypedFormGroup {
		return this.headerForm.get('questionnaireTitle') as UntypedFormGroup;
	}

	// ngOnChanges() {
	// 	console.log('this.formReference.nativeElement.value');
	// 	console.log(this.formReference.nativeElement);
	// }

	/**
   * If we want a header link button, form is visible in template and validators are enabled. Otherwise they are hidden in the form and we disable the validators,
   * to have no dirty form.
   *
   * @param event the change event
   */
	toggle(event: MatSlideToggleChange): void {
		// this.wantHeaderButton = event.checked;

		if (event.checked) {
			// this.headerForm
			// 	.get('headerButtonUrl')
			// 	.setValidators([Validators.required]);
			this.switchValidatorsinControl(this.headerForm.get('headerButtonUrl') as UntypedFormControl, true);
			this.switchValidatorsinGroup(this.headerForm.get('headerButtonText') as UntypedFormGroup, true);
		} else {
			this.switchValidatorsinControl(this.headerForm.get('headerButtonUrl') as UntypedFormControl, false);
			// this.headerForm.get('headerButtonUrl').setValidators(null);
			// this.headerForm.get('headerButtonUrl').setErrors(null);
			this.switchValidatorsinGroup(this.headerForm.get('headerButtonText') as UntypedFormGroup, false);
		}
		console.log('toggle event');
		console.log(event);
		console.log('toggle event form');
		console.log(this.headerForm);
	}

	toggleLogo(event: MatSlideToggleChange): void {
		if (event.checked) {
			this.switchValidatorsinControl(this.headerForm.get(['logo', 'url']) as UntypedFormControl, true);
		} else {
			this.switchValidatorsinControl(this.headerForm.get(['logo', 'url']) as UntypedFormControl, false);
		}
	}

	toggleBackgroundImage(event: MatSlideToggleChange): void {
		if (event.checked) {
			this.switchValidatorsinControl(this.headerForm.get(['backgroundImage', 'backgroundUrl']) as UntypedFormControl, true);
		} else {
			this.switchValidatorsinControl(this.headerForm.get(['backgroundImage', 'backgroundUrl']) as UntypedFormControl, false);
		}
	}

	/**
   * All data from the form is send to the home component. If the language is switched, we need to save the changed values.
   * So the new generated form has the values back. We also need it to send all data to the php backend and to create the xml file.
   *
   * @returns the formgroup with the header data
   */
	sendAllHeaderFormData(): HeaderFormData {
		const data: HeaderFormData = {
			button: {
				link: this.headerForm.value.headerButtonUrl,
				text: this.headerForm.value.headerButtonText
			},
			title: this.headerForm.value.questionnaireTitle,
			isHeaderButton: this.headerForm.value.isHeaderButton ? '1' : '0',
			logo: {
				showLogo: this.headerForm.value.logo.showLogo ? '1' : '0',
				url: this.headerForm.value.logo.url
			},
			backgroundImage: {
				showBackgroundImage: this.headerForm.value.backgroundImage.showBackgroundImage ? '1' : '0',
				backgroundUrl: this.headerForm.value.backgroundImage.backgroundUrl
			}
		};
		return data;
	}

	/**
   * Check if headerform is dirty
   */
	isHeaderFormDirty(): boolean {
		console.log('this.headerForm dirty');
		console.log(this.headerForm);

		return this.headerForm && this.headerForm.dirty;
	}

	changetest() {
		console.log('changed header');
	}
}
