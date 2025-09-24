import { canDeactivateGuard } from './can-deactivate/can-deactivate.guard';
import { HomepageComponent } from './homepage/homepage.component';
import { SettingsPageComponent } from './settingspage/settingspage.component';
import { NgModule } from '@angular/core';
import { Routes, RouterModule, Route } from '@angular/router';

const appRoutes: Routes = [
	{ path: 'home', component: HomepageComponent, canDeactivate: [canDeactivateGuard] },
	{ path: 'test/:id', component: SettingsPageComponent },
	{ path: 'test', component: SettingsPageComponent },
	{ path: '', redirectTo: '/home', pathMatch: 'full' }
	// { path: '**', component: PageNotFoundComponent }
];

@NgModule({
	imports: [
		RouterModule.forRoot(
			appRoutes,
                { 
                    // enableTracing: true,
                    useHash: true
                } // <-- debugging purposes only
		)
	],
	exports: [RouterModule]
})
export class AppRoutingModule {}
