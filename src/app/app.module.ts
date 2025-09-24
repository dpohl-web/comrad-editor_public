import { KeysPipe } from './pipes/keys-pipe';
import { GeneralService } from './general/general.service';
import { MyOwnCustomMaterialModule } from './material.module';
import { BrowserModule } from '@angular/platform-browser';
import { DragDropModule } from '@angular/cdk/drag-drop';
import { NgModule } from '@angular/core';

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { BrowserAnimationsModule } from '@angular/platform-browser/animations';
import { SettingsPageComponent } from './settingspage/settingspage.component';
import { HomepageComponent } from './homepage/homepage.component';
import { HttpClient, provideHttpClient, withInterceptorsFromDi } from '@angular/common/http';
import { GeneralComponent } from './general/general.component';
import { QuestHeaderComponent } from './quest-header/quest-header.component';
import { QuestFormComponent } from './quest-form/quest-form.component';
import { QuestResultComponent } from './quest-result/quest-result.component';
import { FormsModule, ReactiveFormsModule } from '@angular/forms';
import { TranslateModule, TranslateLoader } from '@ngx-translate/core';
import { TranslateHttpLoader } from '@ngx-translate/http-loader';
import { LanguageModalComponent } from './language-modal/language-modal.component';
import { ColorPickerModule } from 'ngx-color-picker';
import { FinishComponent } from './finish/finish.component';
import { EditorModule } from '@tinymce/tinymce-angular';
import { FooterComponent } from './footer/footer.component';
import { environment } from 'src/environments/environment';
import { NgxUiLoaderModule } from "ngx-ui-loader";
import { NoUiSliderComponent } from './no-ui-slider/no-ui-slider.component';
import { APP_BASE_HREF } from '@angular/common';

const ASSETS_URL = environment.assetsUrl;

// AoT requires an exported function for factories
export function HttpLoaderFactory(http: HttpClient) {
	return new TranslateHttpLoader(http, `${ASSETS_URL}/i18n/`, '.json');
}

@NgModule({
    declarations: [
        AppComponent,
        SettingsPageComponent,
        HomepageComponent,
        GeneralComponent,
        QuestHeaderComponent,
        QuestFormComponent,
        QuestResultComponent,
        KeysPipe,
        LanguageModalComponent,
        FinishComponent,
        FooterComponent,
        NoUiSliderComponent
    ],
    bootstrap: [AppComponent],
    imports: [BrowserModule,
        AppRoutingModule,
        BrowserAnimationsModule,
        MyOwnCustomMaterialModule,
        FormsModule,
        ReactiveFormsModule,
        TranslateModule.forRoot({
            loader: {
                provide: TranslateLoader,
                useFactory: HttpLoaderFactory,
                deps: [HttpClient]
            }
        }),
        ColorPickerModule,
        EditorModule,
        DragDropModule,
        NgxUiLoaderModule],
    providers:[
        GeneralService, provideHttpClient(withInterceptorsFromDi()),
        // { provide: APP_BASE_HREF, useValue: '/wp-admin/admin.php?page=comrad-editor-page' }
    ],
 })
export class AppModule {}
