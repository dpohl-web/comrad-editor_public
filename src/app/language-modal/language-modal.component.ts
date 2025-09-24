import { Component, OnInit, Inject } from '@angular/core';
import { MAT_DIALOG_DATA } from '@angular/material/dialog';

@Component({
	selector: 'app-language-modal',
	templateUrl: './language-modal.component.html',
	styleUrls: ['./language-modal.component.scss']
})
export class LanguageModalComponent implements OnInit {
	constructor(@Inject(MAT_DIALOG_DATA) public data: any) {}

	ngOnInit() {
	}
}
