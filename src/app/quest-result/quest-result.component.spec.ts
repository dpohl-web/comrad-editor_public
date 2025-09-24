import { ComponentFixture, TestBed, waitForAsync } from '@angular/core/testing';

import { QuestResultComponent } from './quest-result.component';

describe('QuestResultComponent', () => {
  let component: QuestResultComponent;
  let fixture: ComponentFixture<QuestResultComponent>;

  beforeEach(waitForAsync(() => {
    TestBed.configureTestingModule({
      declarations: [ QuestResultComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(QuestResultComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
