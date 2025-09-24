export const devBuild = true;
const { restRoot } = (window as any).__QUESTIONNAIRE_ANGULAR_INITIAL_STATE__;

export const environment = {
	production: true,
	backend: {
		baseURL: restRoot
		// baseURL: devBuild ? 'http://wp.gsd.lokal' : 'https://reveal-eu.org'
	},
	assetsUrl: '/wp-content/plugins/comrad/admin/assets/angular/assets',
	reactQuestUrl: devBuild ? 'http://wp.gsd.lokal' : 'https://reveal-eu.org/survey'
	// reactQuestUrl: devBuild ? 'http://localhost' : 'http://localhost/survey'
	// reactQuestUrl: devBuild ? 'http://lh72/survey' : 'http://localhost/survey'
};
