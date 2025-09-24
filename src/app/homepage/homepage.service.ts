import { Injectable, EventEmitter } from '@angular/core';
import * as Confs from '../../config';

@Injectable({
	providedIn: 'root'
})
export class HomePageService {

	formsAreDirtyEvent = new EventEmitter<boolean>();

	constructor() {}

	formsAreDirtyEmitter(value: boolean) {
		this.formsAreDirtyEvent.emit(value);
	}
}
