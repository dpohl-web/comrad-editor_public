// This file can be replaced during build by using the `fileReplacements` array.
// `ng build --prod` replaces `environment.ts` with `environment.prod.ts`.
// The list of file replacements can be found in `angular.json`.

export const environment = {
	production: false,
	backend: {
		baseURL: '/api'
	},
	assetsUrl: 'assets',
	reactQuestUrl: 'http://localhost'
};

(<any>window).__QUESTIONNAIRE_ANGULAR_INITIAL_STATE__ = {};
(<any>window).__QUESTIONNAIRE_ANGULAR_INITIAL_STATE__.userId = '1';
(<any>window).__QUESTIONNAIRE_ANGULAR_INITIAL_STATE__.userIsAdmin = '1';
(<any>window).__QUESTIONNAIRE_ANGULAR_INITIAL_STATE__.userIsEditor = null;
(<any>window).__QUESTIONNAIRE_ANGULAR_INITIAL_STATE__.userIsAuthor = null;
(<any>window).__QUESTIONNAIRE_ANGULAR_INITIAL_STATE__.restRoot = null;
(<any>window).__QUESTIONNAIRE_ANGULAR_INITIAL_STATE__.nonce = '';

/*
 * For easier debugging in development mode, you can import the following file
 * to ignore zone related error stack frames such as `zone.run`, `zoneDelegate.invokeTask`.
 *
 * This import should be commented out in production mode because it will have a negative impact
 * on performance if an error is thrown.
 */
// import 'zone.js/plugins/zone-error';  // Included with Angular CLI.
