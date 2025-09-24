import { HeroesService, TooglePanelParams } from './connector.service';
import { Component, OnInit, OnDestroy } from '@angular/core';
import { AdditionlInfosFromBackend } from './interfaces';
import { TranslateService } from '@ngx-translate/core';
import { OverlayContainer } from '@angular/cdk/overlay';
import { Subject } from 'rxjs';
import { takeUntil } from 'rxjs/operators';
import 'tinymce/icons/default';
// import {appRoutes} from 'app-routing.module';

@Component({
	selector: 'app-root',
	templateUrl: './app.component.html',
	styleUrls: ['./app.component.scss'],
})
export class AppComponent implements OnInit, OnDestroy {
	navLinks = [
		{ label: 'Home', path: '/home' },
		{ label: 'Settings', path: '/test' },
	];
	title = 'questionnaire-form';
	theme = 'my-theme';
	showFullScreenSpinner: boolean = false;
	constructor(private translate: TranslateService, private connector: HeroesService, private overlayContainer: OverlayContainer) {
		// this language will be used as a fallback when a translation isn't found in the current language
		translate.setDefaultLang('en');

		// the lang to use, if the lang isn't available, it will use the current loader to get them
		translate.use(connector.appLanguage);
	}

	private unsubscribe: Subject<void> = new Subject();

	ngOnInit(): void {
		this.addPolyfills();
		this.overlayContainer.getContainerElement().classList.add(this.theme);
		this.connector.emitTheme.pipe(takeUntil(this.unsubscribe)).subscribe(value => {
			this.theme = value;
			// remove old theme class and add new theme class
			// we're removing any css class that contains '-theme' string but your theme classes can follow any pattern
			const overlayContainerClasses = this.overlayContainer.getContainerElement().classList;
			const themeClassesToRemove = Array.from(overlayContainerClasses).filter((item: string) => item.includes('-theme'));
			if (themeClassesToRemove.length) {
				overlayContainerClasses.remove(...themeClassesToRemove);
			}
			overlayContainerClasses.add(value);
		});

		this.connector.appLanguageEvent.pipe(takeUntil(this.unsubscribe)).subscribe(newLanguage => {
			this.translate.use(newLanguage);
			this.translate.get('settings').subscribe((translatedSettings: string) => {
				this.navLinks[1].label = translatedSettings;
			});
		});

		this.connector.getAdditinalInfos()
		.subscribe((infos: AdditionlInfosFromBackend) => {
		});
	}

	addPolyfills() {
		// closest
		if (window.Element && !Element.prototype.closest) {
			Element.prototype.closest = 
			function(s) {
				console.log('use poly');
				var matches = (this.document || this.ownerDocument).querySelectorAll(s),
					i,
					el = this;
				do {
					i = matches.length;
					while (--i >= 0 && matches.item(i) !== el) {};
				} while ((i < 0) && (el = el.parentElement)); 
				return el;
			};
		}
	}

	ngOnDestroy(): void {
		this.unsubscribe.next();
		this.unsubscribe.complete();
	}
}
