import { environment } from 'src/environments/environment';
const siteUrl = environment.backend.baseURL;

export const QUEST_URL = siteUrl + 'comrad/v1/get-questionaire';
export const QUEST_LIST_URL = siteUrl + 'comrad/v1/get-filenames';
export const CREATE_OR_DELETE_XML = siteUrl + 'comrad/v1/create-or-delete-xml';
export const CREATE_OR_UPDATE_XML = siteUrl + 'comrad/v1/xml';
export const DELETE_XML = siteUrl + 'comrad/v1/xml-delete';
export const CSV_LIST_URL = siteUrl + 'comrad/v1/get-csv-data';

export const POSSIBLE_LANGUAGES = {
    "sq": "Albanian",
    "ar": "Arabic",
    "hy": "Armenian",
    "eu": "Basque",
    "bg": "Bulgarian",
    "ca": "Catalan",
    "hr": "Croatian",
    "cs": "Czech",
    "da": "Danish",
    "nl": "Dutch",
    "en": "English",
    "et": "Estonian",
    "fo": "Faroese",
    "fi": "Finnish",
    "fr": "French",
    "gd": "Gaelic; Scottish Gaelic",
    "gl": "Galician",
    "ka": "Georgian",
    "de": "German",
    "de-du": "German - Du",
    "el": "Greek",
    "he": "Hebrew",
    "hu": "Hungarian",
    "is": "Icelandic",
    "ga": "Irish",
    "it": "Italian",
    "ja": "Japanese",
    "kl": "Kalaallisut; Greenlandic",
    "kk": "Kazakh",
    "ko": "Korean",
    "lv": "Latvian",
    "lt": "Lithuanian",
    "lb": "Luxembourgish; Letzeburgesch",
    "mk": "Macedonian",
    "mr": "Marathi",
    "fa": "Persian",
    "pl": "Polish",
    "pt": "Portuguese - Portugal",
    "pt-br": "Portuguese - Brazil",
    "ro": "Romanian",
    "ru": "Russian",
    "sr-cr": "Serbian (Cyrillic)",
    "sr-lt": "Serbian (Latin)",
    "zh-cn": "Simplified Chinese",
    "sk": "Slovak",
    "sl": "Slovenian",
    "es": "Spanish",
    "es-mx": "Spanish - Mexico",
    "sv": "Swedish",
    "zh-tw": "Traditional Chinese",
    "tr": "Turkish",
    "uk": "Ukrainian",
    "cy": "Welsh",
    "fy": "Western Frisian"
  }
