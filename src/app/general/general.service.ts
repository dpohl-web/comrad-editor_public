import { Injectable } from '@angular/core';
import * as Confs from '../../config';

@Injectable()
export class GeneralService {
	mode;
	selected;
	questNames;

	constructor() {}

	getMode() {
		return this.mode;
	}

	setMode(mode) {
		this.mode = mode;
	}

	getSelected() {
		return this.mode;
	}

	setSelected(selected) {
		this.selected = selected;
	}

	getQuestNames() {
		return this.questNames;
	}

	setQuestNames(questNames) {
		this.questNames = questNames;
	}
}
