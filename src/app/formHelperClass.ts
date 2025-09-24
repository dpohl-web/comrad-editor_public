import { SelectValues } from './interfaces';
import { Subscription } from 'rxjs';
import { HeroesService } from './connector.service';
import { Injectable } from '@angular/core';
import { UntypedFormBuilder, Validators, UntypedFormGroup, FormArray, UntypedFormControl, ValidatorFn, AbstractControl } from '@angular/forms';

@Injectable()
export default class FormHelperClass {
	/**
	 * The values for the selectboxes
	 */
	attributes = {
		type: [
			{ value: 'radio', viewValue: 'radio' },
			{ value: 'input', viewValue: 'input' },
			// { value: 'select', viewValue: 'select' }, // maybe later
			{ value: 'check', viewValue: 'check' },
			{ value: 'inputrange', viewValue: 'inputrange' },
		],
		position_to_catname: [
			{ value: 'before', viewValue: 'before' },
			{ value: 'after', viewValue: 'after' },
		],
		values: [],
		number: [
			{ value: '1', viewValue: 1 },
			{ value: '2', viewValue: 2 },
		],
		required: [
			{ value: '1', viewValue: 'true' },
			{ value: '0', viewValue: 'false' },
		],
	};

	constructor(protected fb: UntypedFormBuilder, protected connector: HeroesService) {
		this.attributes.values = this.getValues(0, 100);
	}

	/**
	 * The textfields have multiple languages. So we create here the controls in the passed group
	 *
	 * @param group The group in which we put the controls for every language
	 * @param values the object with the strings for every language
	 * @param validatorsNotRequired (optional) If the initial validators are disabled we set this optional flag
	 * @param maxLength (optional) If needed a maxlength is passed
	 * @param categoryNamesForUniqueTest (optional) For the categorynames we need the object containing all the names in all languages
	 */
	addLanguageFormControll(
		group: any,
		values: any,
		validatorsNotRequired?: boolean,
		maxLength?: number,
		categoryNamesForUniqueTest?: any,
		catIndex?: number
	): void {
		this.connector.questionnaireData.config.language.languages.forEach((language) => {
			let value;
			if (catIndex === 0) {
				value = 'dummy short question';
			} else {
				value = typeof (values[language.short]) !== 'undefined' ? values[language.short] : ''
			}
			const control = this.fb.control(
				value,
				validatorsNotRequired
					? null
					: [
							Validators.required,
							this.validateEmptyField,
							maxLength ? Validators.maxLength(maxLength) : Validators.maxLength(500000),
							this.validateUniqueCategoryName(categoryNamesForUniqueTest, language.short),
					  ]
			);
			group.addControl(language.short, control);
		});
	}

	getValues(start: number, end: number): SelectValues[] {
		let x: number = start;
		const arr = [];
		for (x; x <= end; x++) {
			arr.push({ value: x, viewValue: x });
		}
		return arr;
	}

	/**
	 * The attributes will be setted here. We create the controls in the passed group.
	 *
	 * @param group The group in which we put the attribute controls
	 * @param values the object with multiple different name and value pairs of the attributes
	 * @param wantOnlyValue Sometimes we only want the value or we need the whole object like {value: '', viewvalue: ''}. F.e. for the selectboxes
	 */
	setAttributes(group: UntypedFormGroup, values: any, wantOnlyValue?: boolean): void {
		console.log('values in setAttributes');
		console.log(values);
		Object.keys(values).forEach((valueKey) => {
			console.log('valueKey in setAttributes');
			console.log(valueKey);
			const selectedValue = this.attributes[valueKey].find((value) => {
				console.log('valueKey in selectedValue setAttributes');
				console.log(values[valueKey]);
				console.log('value in setAttributes');
				console.log(value.value);
				return value.value === values[valueKey];
			});

			console.log('selectedValue in setAttributes');
			console.log(selectedValue);
			// const selectedValue = this.attributes[valueKey][];
			const control = this.fb.control(null, Validators.required);
			// const selectedValue = this.attributes[valueKey].find(value => {
			// 	return value.value === valueKey;
			// });

			group.addControl(valueKey, control);
			const reference = group.get(valueKey) as UntypedFormControl;
			console.log('reference in setAttributes');
			console.log(reference);
			if (wantOnlyValue) {
				reference.setValue(selectedValue.value);
			} else {
				reference.setValue(selectedValue);
			}

			console.log('reference in setAttributes after setvalue');
			console.log(reference);
		});
	}

	/**
	 * Checks if a form is valid. If the status changed, the status will be emitted to the connector service and the whole app gets the information,
	 * if the whole form (all forms in the app) is valid or not. For example the send button needs this information.
	 *
	 * @param subscription We pass it here, to be able to unsubscribe later
	 * @param form The form which is valid or not
	 * @param formName The connector needs this name to match the correct property name which has to be setted
	 */
	checkFormvalidStatus(subscription: Subscription, form: UntypedFormGroup, formName: string): void {
        // Unsubscribe from the previous subscription to prevent memory leaks
        if (subscription) {
            subscription.unsubscribe();
        }
    
        // Subscribe to form status changes
        subscription = form.statusChanges.subscribe((newStatus: string) => {
            // console.log(`${formName} valid change: ${newStatus}`);
            
            // Trigger an update only if the status changes
            this.connector.updateFormValidsAndEmit(formName, newStatus === 'VALID');
        });
    
        // Set the initial status
        this.connector.updateFormValidsAndEmit(formName, form.valid);
    }

	/**
	 * Switches the validation of all controls in a group
	 *
	 * @param group The group which has the controls
	 * @param validationRequired Validation on or off
	 */
	switchValidatorsinGroup(group: UntypedFormGroup, validationRequired: boolean): void {
		Object.values(group.controls).forEach((control) => {
			if (validationRequired) {
				control.setValidators([Validators.required]);
				control.updateValueAndValidity();
				console.log('control in true');
				console.log(control);
			} else {
				control.setValidators(null);
				control.setErrors(null);
				console.log('control in false');
				console.log(control);
			}
		});
	}

	/**
	 * Switches the validation of one control
	 *
	 * @param control The control which has the validator or not
	 * @param validationRequired Validation on or off
	 * @param pattern optional if pattern is needed
	 * @param validateEmptyField optinal if only whitespaces are not allowed
	 */
	switchValidatorsinControl(
		control: UntypedFormControl,
		validationRequired: boolean,
		pattern?: string,
		validateEmptyField?: boolean
	): void {
		console.log('control in switchValidatorsinControl', control);
		if (validationRequired) {
			if (pattern && validateEmptyField) {
				control.setValidators([Validators.required, Validators.pattern(pattern), this.validateEmptyField]);
			} else if (pattern) {
				control.setValidators([Validators.required, Validators.pattern(pattern)]);
			} else if (validateEmptyField) {
				control.setValidators([Validators.required, this.validateEmptyField]);
			} else {
				control.setValidators([Validators.required]);
			}
			control.updateValueAndValidity();
		} else {
			control.setValidators(null);
			control.setErrors(null);
		}
	}

	forbiddenPatternValidator(nameRe: RegExp): ValidatorFn {
		return (control: AbstractControl): { [key: string]: any } | null => {
			const forbidden = nameRe.test(control.value);
			return forbidden ? { forbiddenName: { value: control.value } } : null;
		};
	}

	validateEmptyField(c: UntypedFormControl) {
		return c.value && !c.value.trim()
			? {
					required: {
						valid: false,
					},
			  }
			: null;
	}

	/**
	 * Custom validator for unique category names,
	 * If more than one (the own category name) category name is found, the validator return an error
	 *
	 * @param categoryNamesForUniqueTest object containing all category names as reference in the quest-form component
	 * @param language the language which has to be tested
	 */
	validateUniqueCategoryName(categoryNamesForUniqueTest: any, language: string): ValidatorFn {
		return (control: AbstractControl): { [key: string]: any } | null => {
			if (categoryNamesForUniqueTest && categoryNamesForUniqueTest.catNames) {
				const isUnique = categoryNamesForUniqueTest.catNames.filter((nameObject) => {
					const isUni = control.value === nameObject[language];
					return isUni;
				});
				return isUnique.length < 2 ? null : { forbiddenName: { value: control.value } };
			}

			return null;
		};
	}
}
