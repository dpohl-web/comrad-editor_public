export interface Languages {
	short: string;
	long: string;
}

export interface Graph {
	short: string;
	long: string;
}

export interface HeaderFormData {
	button: {
		link: string;
		text: any;
	};
	title: any;
	isHeaderButton: string;
	logo: {
		showLogo: string;
		url: string
	};
	backgroundImage: {
		showBackgroundImage: string;
		backgroundUrl: string;
	};
}

export interface AnswerData {
	identifier: string;
	blockAnswer: any;
	answerValue: number;
}

export interface BlockType {
	type: string;
}

export interface BlockData {
	identifier: string;
	'@attributes': BlockType;
	blockAnswers: AnswerData[];
	blockQuestion: any;
	blockShortQuestion: any;
	weight: string;
}

export interface PageInformationsAttribute {
	position_to_catname: string;
}

export interface PageInformations {
	'@attributes': PageInformationsAttribute;
	showPageInformations: any;
	pageInformationsDescription: any;
	pageInformationsSubtitle: any;
}

export interface PageData {
	identifier: string;
	blocks: BlockData[];
	pageEvaluate: string;
	pageInformations?: PageInformations;
}

export interface RecommendationsContentArrayElement {
	isActive: boolean;
	recommendationContent: {
		[key: string]: string;
	}
}

export interface CatData {
	identifier: string;
	catcolor?: string;
	categoryName: any;
	evaluateCategory: string;
	categoryPages: PageData[];
	recommendationsGroup?: {
		recommendationsContentArray: RecommendationsContentArrayElement[];
		recommendationsRanges: string[];
	};
	recommendationsIsUsed?: boolean;
}

export interface Interpretation {
	'@attributes': any;
	description: any;
	image_categories?: any[];
}

export interface Literature {
	'@attributes': any;
	p: string[];
}

export interface ResultBody {
	interpretation?: Interpretation[];
	showtomsstyle: string;
	literature: any;
}

export interface ResultHeader {
	description: any;
	title: any;
}

export interface ResultPage {
	body: ResultBody;
	header: ResultHeader;
}

export interface ConfigGraph {
    compareGraphs?: string;
	default: string;
	graphSwitchOptions: GraphSwitchOptions;
	showGraphSwitch: string;
    resultpagecomparebuttonstring?: {[key: string]: string};
}

export interface GraphSwitchOptions {
	options: string[];
}

export interface ConfigData {
	graphs: ConfigGraph;
	language: {
		default: string;
		languages: Languages[];
	};
	showHeaderButton: string;
	mainColors: {
		primaryColor: string;
		secondaryColor: string;
	};
	questionnaireFileName: string;
    priorityListObject: {[key: string]: string};
    recommendationsIsUsed: string;
    pdfGroup: {
        pdfAsEmail: string;
        pdfDirectly: string;
    }

}

export interface HeadData {
	button: {
		link: string;
		text: any;
	};
	title: any;
}

export interface MetaData {
	resultWasViewed: any;
	pdfAsEmailPassword: string;
}

export interface FooterFormData {
	footerLogo: {
		footerLogoUrl: string;
		showFooterLogo: string;
	};
	footerText: any;
	footerRight: any;
	fontColor: string;
	backgroundColor: string;
}

export interface QuestData {
	categories: CatData;
	config: ConfigData;
	head: HeadData;
	metaData: MetaData;
	resultpage: ResultPage;
	footer: FooterFormData;
}

export interface AdditionlInfosFromBackend {
	is_compare: boolean;
	is_recommendations: boolean;
}

export interface SelectValues {
	value: number;
	viewValue: number;
}
