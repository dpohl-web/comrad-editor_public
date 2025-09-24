import { ComponentFixture, TestBed } from '@angular/core/testing';

import { NoUiSliderComponent } from './no-ui-slider.component';

describe('NoUiSliderComponent', () => {
  let component: NoUiSliderComponent;
  let fixture: ComponentFixture<NoUiSliderComponent>;

  beforeEach(() => {
    TestBed.configureTestingModule({
      declarations: [NoUiSliderComponent]
    });
    fixture = TestBed.createComponent(NoUiSliderComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
