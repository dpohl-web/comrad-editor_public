import { ComponentFixture, TestBed, waitForAsync } from '@angular/core/testing';

import { QuestFormComponent } from './quest-form.component';

describe('QuestFormComponent', () => {
	let component: QuestFormComponent;
	let fixture: ComponentFixture<QuestFormComponent>;

	beforeEach(waitForAsync(() => {
		TestBed.configureTestingModule({
			declarations: [QuestFormComponent]
		}).compileComponents();
	}));

	beforeEach(() => {
		fixture = TestBed.createComponent(QuestFormComponent);
		component = fixture.componentInstance;
		fixture.detectChanges();
	});

	it('should create', () => {
		expect(component).toBeTruthy();
	});
});
