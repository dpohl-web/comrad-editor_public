import { ComponentFixture, TestBed, waitForAsync } from '@angular/core/testing';

import { LanguageModalComponent } from './language-modal.component';

describe('LanguageModalComponent', () => {
  let component: LanguageModalComponent;
  let fixture: ComponentFixture<LanguageModalComponent>;

  beforeEach(waitForAsync(() => {
    TestBed.configureTestingModule({
      declarations: [ LanguageModalComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(LanguageModalComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
