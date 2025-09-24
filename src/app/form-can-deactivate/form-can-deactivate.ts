import { ComponentCanDeactivate } from '../can-deactivate/component-can-deactivate';
import { NgForm, UntypedFormGroup } from '@angular/forms';
import { Directive } from "@angular/core";

@Directive()
export abstract class FormCanDeactivate extends ComponentCanDeactivate {
	abstract get generalForm(): UntypedFormGroup;
	abstract get headerForm(): UntypedFormGroup;
	abstract get mainForm(): UntypedFormGroup;
	abstract get resultForm(): UntypedFormGroup;
	abstract get finishForm(): UntypedFormGroup;

	canDeactivate(): boolean {
		// return this.form && !this.form.dirty;
		// TODO: check if form is not submitted and dirty

		console.log('mainForm in desactivate');
		console.log(this.mainForm);
		if (
			(this.generalForm && this.generalForm.dirty) ||
			(this.headerForm && this.headerForm.dirty) ||
			(this.mainForm && this.mainForm.dirty) ||
			(this.resultForm && this.resultForm.dirty) ||
			(this.finishForm && this.finishForm.dirty)
		) {
			return false;
		}
		return true;
	}
}
