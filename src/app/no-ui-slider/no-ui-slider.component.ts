import {
    Component,
    ElementRef,
    EventEmitter,
    Input,
    AfterViewInit,
    Output,
    OnDestroy
  } from '@angular/core';
  import * as noUiSlider from 'nouislider';

@Component({
  selector: 'app-no-ui-slider',
  templateUrl: './no-ui-slider.component.html',
  styleUrls: ['./no-ui-slider.component.scss']
})
export class NoUiSliderComponent implements AfterViewInit, OnDestroy {
    @Input() config: any;  // Konfiguration des Sliders (z. B. start, range, step, pips, etc.)
    @Output() change = new EventEmitter<any>();  // Gibt Änderungen des Sliders weiter
    sliderInstance: noUiSlider.API;
  
    constructor(private el: ElementRef) {}
  
    ngAfterViewInit(): void {
      const sliderElem = this.el.nativeElement.querySelector('.no-ui-slider');
      // Slider initialisieren
      noUiSlider.create(sliderElem, this.config);
  
      // Slider-Instanz speichern
      this.sliderInstance = sliderElem.noUiSlider;
  
      // Listener hinzufügen, um Änderungen weiterzureichen
      this.sliderInstance.on('change', (values, handle) => {
        this.change.emit({ values, handle });
      });
    }
  
    ngOnDestroy(): void {
      // Slider zerstören, um Speicherlecks zu vermeiden
      if (this.sliderInstance) {
        this.sliderInstance.destroy();
      }
    }
  }
