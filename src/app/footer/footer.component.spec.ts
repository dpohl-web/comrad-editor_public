import { ComponentFixture, TestBed, fakeAsync, tick } from '@angular/core/testing';
import { ReactiveFormsModule, UntypedFormBuilder, UntypedFormControl, UntypedFormGroup } from '@angular/forms';
import { of, Subject } from 'rxjs';
import { FooterComponent } from './footer.component';
import { HeroesService } from '../connector.service';
import { MatSlideToggleChange } from '@angular/material/slide-toggle';
import { NO_ERRORS_SCHEMA, Pipe, PipeTransform } from '@angular/core';

/** Stub für den translate-Pipe */
@Pipe({ name: 'translate' })
class TranslatePipeStub implements PipeTransform {
  transform(value: any, ...args: any[]): any {
    return value;
  }
}

/** Stub für den keys-Pipe */
@Pipe({ name: 'keys' })
class KeysPipeStub implements PipeTransform {
  transform(value: any, ...args: any[]): any {
    return Object.keys(value || {});
  }
}

describe('FooterComponent', () => {
  let component: FooterComponent;
  let fixture: ComponentFixture<FooterComponent>;
  let mockConnector: any;
  let fb: UntypedFormBuilder;
  let dummyQuestData: any;

  beforeEach(async () => {
    // Erstelle einen Mock für den HeroesService
    mockConnector = {
      emitQuestionnaireData: new Subject<any>()
    };

    await TestBed.configureTestingModule({
      declarations: [FooterComponent, TranslatePipeStub, KeysPipeStub],
      imports: [ReactiveFormsModule],
      providers: [
        { provide: HeroesService, useValue: mockConnector },
        UntypedFormBuilder
      ],
      // Mit NO_ERRORS_SCHEMA werden unbekannte Elemente/Attribute ignoriert (z. B. colorPicker)
      schemas: [NO_ERRORS_SCHEMA]
    }).compileComponents();

    fb = TestBed.inject(UntypedFormBuilder);
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(FooterComponent);
    component = fixture.componentInstance;
    // Dummy-Daten, die dem erwarteten FooterFormData entsprechen
    dummyQuestData = {
        config: {
          language: {
            default: 'en',
            languages: [
              { short: 'en', long: 'English' },
              { short: 'de', long: 'German' }
            ]
          }
        },
        footer: {
          footerLogo: {
            showFooterLogo: '1', // entspricht true
            footerLogoUrl: 'http://dummy.url/logo.png'
          },
          footerText: {
            en: 'Footer text EN',
            de: 'Footer text DE'
          },
          footerRight: {
            en: 'Footer right EN',
            de: 'Footer right DE'
          },
          fontColor: '#000000',
          backgroundColor: '#ffffff'
        }
      };
    fixture.detectChanges();
  });

  it('should create the component', () => {
    expect(component).toBeTruthy();
  });

  it('should initialize footerForm on ngOnInit and emit form to parent', fakeAsync(() => {
    let emittedData: any;
    component.initialisedFormToParentComponent.subscribe((data) => emittedData = data);
    // Simuliere den Emitt von QuestData
    mockConnector.emitQuestionnaireData.next(dummyQuestData);
    tick();
    fixture.detectChanges();

    expect(component.footerFormIsReady).toBeTrue();
    expect(component.footerForm).toBeDefined();
    expect(emittedData.formName).toBe('footerForm');
    expect(emittedData.form).toEqual(component.footerForm);

    // Überprüfe, ob die Untergruppen vorhanden sind
    const footerLogoGroup = component.footerForm.get('footerLogo') as UntypedFormGroup;
    expect(footerLogoGroup).toBeDefined();
    expect(footerLogoGroup.get('showFooterLogo')).toBeDefined();
    expect(footerLogoGroup.get('footerLogoUrl')).toBeDefined();

    const footerTextGroup = component.footerForm.get('footerText') as UntypedFormGroup;
    expect(footerTextGroup).toBeDefined();
    const footerRightGroup = component.footerForm.get('footerRight') as UntypedFormGroup;
    expect(footerRightGroup).toBeDefined();
  }));

  it('should toggle logo validators in toggleLogo', () => {
    // Initialisiere das Formular
    mockConnector.emitQuestionnaireData.next(dummyQuestData);
    fixture.detectChanges();

    // Überwache den Aufruf der switchValidatorsinControl-Methode (definiert in der Basisklasse)
    const spySwitch = spyOn((component as any), 'switchValidatorsinControl').and.callThrough();

    // Simuliere ein Event, bei dem checked true ist
    const eventTrue: MatSlideToggleChange = { checked: true, source: null } as any;
    component.toggleLogo(eventTrue);
    expect(spySwitch).toHaveBeenCalledWith(component.footerLogoUrl, true, component.urlPattern, true);

    // Simuliere ein Event, bei dem checked false ist
    const eventFalse: MatSlideToggleChange = { checked: false, source: null } as any;
    component.toggleLogo(eventFalse);
    expect(spySwitch).toHaveBeenCalledWith(component.footerLogoUrl, false);
  });

  it('should send all footer form data with conversion of showFooterLogo', fakeAsync(() => {
    mockConnector.emitQuestionnaireData.next(dummyQuestData);
    tick();
    fixture.detectChanges();

    // Setze den Wert des FormControls auf true
    (component.footerForm.get(['footerLogo', 'showFooterLogo']) as UntypedFormControl).setValue(true);
    const data = component.sendAllFooterFormData();
    expect(data.footerLogo.showFooterLogo).toBe('1');

    // Setze den Wert auf false und teste erneut
    (component.footerForm.get(['footerLogo', 'showFooterLogo']) as UntypedFormControl).setValue(false);
    const data2 = component.sendAllFooterFormData();
    expect(data2.footerLogo.showFooterLogo).toBe('0');
  }));

  it('should return true for isfooterFormDirty if form is dirty', fakeAsync(() => {
    mockConnector.emitQuestionnaireData.next(dummyQuestData);
    tick();
    fixture.detectChanges();

    // Anfangs ist das Formular nicht dirty
    expect(component.isfooterFormDirty()).toBeFalse();

    // Markiere das Formular als dirty
    component.footerForm.markAsDirty();
    expect(component.isfooterFormDirty()).toBeTrue();
  }));

  it('should change color using colorChanged', fakeAsync(() => {
    mockConnector.emitQuestionnaireData.next(dummyQuestData);
    tick();
    fixture.detectChanges();

    // Ändere den Wert des fontColor-Feldes
    component.colorChanged('#123456', 'fontColor');
    expect(component.footerForm.get('fontColor').value).toBe('#123456');
  }));

  it('should get and set fontColor and backgroundColor using getters and setters', fakeAsync(() => {
    mockConnector.emitQuestionnaireData.next(dummyQuestData);
    tick();
    fixture.detectChanges();

    // Getter prüfen
    expect(component.fontColor).toBe(dummyQuestData.footer.fontColor);
    expect(component.backgroundColor).toBe(dummyQuestData.footer.backgroundColor);

    // Setter prüfen
    component.fontColor = '#111111';
    expect(component.footerForm.get('fontColor').value).toBe('#111111');

    component.backgroundColor = '#222222';
    expect(component.footerForm.get('backgroundColor').value).toBe('#222222');
  }));

  it('should unsubscribe subscriptions on ngOnDestroy', fakeAsync(() => {
    // Initialisiere das Formular
    mockConnector.emitQuestionnaireData.next(dummyQuestData);
    tick();
    fixture.detectChanges();

    // Erzeuge Dummy-Abonnements
    component.footerFormStatusIsValidSubscription = { unsubscribe: jasmine.createSpy('unsubscribe') } as any;
    component.emitQuestionnaireDataSubscription = { unsubscribe: jasmine.createSpy('unsubscribe') } as any;

    component.ngOnDestroy();

    expect(component.emitQuestionnaireDataSubscription.unsubscribe).toHaveBeenCalled();
    expect(component.footerFormStatusIsValidSubscription.unsubscribe).toHaveBeenCalled();
  }));
});

