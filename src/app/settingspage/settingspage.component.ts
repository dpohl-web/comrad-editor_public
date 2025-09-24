import { UntypedFormBuilder, UntypedFormGroup, Validators } from '@angular/forms';
import { HeroesService } from './../connector.service';
import { Component, OnInit } from '@angular/core';
import { Router, ActivatedRoute, ParamMap } from '@angular/router';
import { switchMap } from 'rxjs/operators';

@Component({
	selector: 'app-settingspage',
	templateUrl: './settingspage.component.html',
	styleUrls: ['./settingspage.component.scss']
})
export class SettingsPageComponent implements OnInit {
	test: string;
	settingsFormGroup: UntypedFormGroup;

	languageOptions = [
		{ value: 'en', viewValue: 'english' },
		{ value: 'de', viewValue: 'deutsch' }
	];

	constructor(private route: ActivatedRoute, private router: Router,
		private connector: HeroesService, private fb: UntypedFormBuilder) {}

	ngOnInit(): void {
		this.route.paramMap.subscribe(params => {
			this.test = params.get('id');
		});

		this.settingsFormGroup = this.fb.group({
			themeControl: [this.connector.themeMode, Validators.required],
			appLanguagesSelectBox: [this.connector.appLanguage, Validators.required]
		});
	}

	themeChangeAction(value: string): void {
		this.connector.themeEmitter(value);
	}

	emitAppLanguageStatus(e) {
		console.log('app langugage change');
		console.log(e);
		this.connector.emitAppLanguageChange(e.value);
	}
}
