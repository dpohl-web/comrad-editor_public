import { NgModule } from '@angular/core';
import { MatMomentDateModule } from '@angular/material-moment-adapter';

import { MatAutocompleteModule } from '@angular/material/autocomplete';
import { MatButtonModule } from '@angular/material/button';
import { MatCardModule } from '@angular/material/card';
import { MatCheckboxModule } from '@angular/material/checkbox';
import { MatNativeDateModule, MatOptionModule } from '@angular/material/core';
import { MatDatepickerModule } from '@angular/material/datepicker';
import { MatDialogModule } from '@angular/material/dialog';
import { MatExpansionModule } from '@angular/material/expansion';
import { MatFormFieldModule } from '@angular/material/form-field';
import { MatIconModule } from '@angular/material/icon';
import { MatInputModule } from '@angular/material/input';
import { MatListModule } from '@angular/material/list';
import { MatProgressSpinnerModule } from '@angular/material/progress-spinner';
import { MatRadioModule } from '@angular/material/radio';
import { MatSelectModule } from '@angular/material/select';
import { MatSlideToggleModule } from '@angular/material/slide-toggle';
import { MatSnackBarModule } from '@angular/material/snack-bar';
import { MatStepperModule } from '@angular/material/stepper';
import { MatTabsModule } from '@angular/material/tabs';

@NgModule({
	imports: [
		MatButtonModule,
		MatIconModule,
		MatCardModule,
		MatFormFieldModule,
		MatInputModule,
		MatListModule,
		MatDatepickerModule,
		MatNativeDateModule,
		MatMomentDateModule,
		MatSelectModule,
		MatOptionModule,
		MatCheckboxModule,
		MatRadioModule,
		MatExpansionModule,
		MatStepperModule,
		MatProgressSpinnerModule,
		MatAutocompleteModule,
		MatSlideToggleModule,
		MatTabsModule,
		MatDialogModule,
		MatSnackBarModule
	],
	exports: [
		MatButtonModule,
		MatIconModule,
		MatCardModule,
		MatFormFieldModule,
		MatInputModule,
		MatListModule,
		MatDatepickerModule,
		MatNativeDateModule,
		MatMomentDateModule,
		MatSelectModule,
		MatOptionModule,
		MatCheckboxModule,
		MatRadioModule,
		MatExpansionModule,
		MatStepperModule,
		MatProgressSpinnerModule,
		MatAutocompleteModule,
		MatSlideToggleModule,
		MatTabsModule,
		MatDialogModule,
		MatSnackBarModule
	]
})
export class MyOwnCustomMaterialModule {}
