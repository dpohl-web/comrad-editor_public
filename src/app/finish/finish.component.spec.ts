import { Component } from '@angular/core';
import { ComponentFixture, TestBed, fakeAsync, tick } from '@angular/core/testing';
import { UntypedFormBuilder, ReactiveFormsModule, UntypedFormControl } from '@angular/forms';
import { of, Subject } from 'rxjs';
import { FinishComponent } from './finish.component';
import { HeroesService } from '../connector.service';
import { MatDialog } from '@angular/material/dialog';
import { QuestData, AdditionlInfosFromBackend } from '../interfaces';
import { Pipe, PipeTransform } from '@angular/core';
import { MatSlideToggleModule } from '@angular/material/slide-toggle';

@Pipe({ name: 'translate' })
class TranslatePipeStub implements PipeTransform {
  transform(value: any, ...args: any[]): any {
    return value;
  }
}

// Dummy-Komponente für den Dialog (LanguageModalComponent)
@Component({ selector: 'app-language-modal', template: '' })
class DummyLanguageModalComponent {}

// Verbesserter Dummy-Datensatz, angepasst an das aktualisierte ConfigData-Interface
const dummyQuestData: QuestData = {
  categories: {
    identifier: 'cat1',
    catcolor: '#ff0000',
    categoryName: 'Category 1',
    evaluateCategory: 'eval',
    categoryPages: []
  },
  config: {
    graphs: {
      default: 'defaultGraph',
      graphSwitchOptions: { options: ['option1', 'option2'] },
      showGraphSwitch: '1'
    },
    language: {
      default: 'en',
      languages: [
        { short: 'en', long: 'English' }
      ]
    },
    showHeaderButton: '1',
    mainColors: {
      primaryColor: '#000000',
      secondaryColor: '#ffffff'
    },
    questionnaireFileName: 'testfile',
    priorityListObject: { priority1: 'High', priority2: 'Low' },
    recommendationsIsUsed: '1',
    pdfGroup: { 
      pdfDirectly: '1', 
      pdfAsEmail: '0'
    }
  },
  head: {
    button: { link: '', text: '' },
    title: ''
  },
  metaData: {
    resultWasViewed: 1,
    pdfAsEmailPassword: 'initialPassword'
  },
  resultpage: {
    body: { interpretation: [], showtomsstyle: '1', literature: {} },
    header: { description: '', title: '' }
  },
  footer: {
    footerLogo: { footerLogoUrl: '', showFooterLogo: '1' },
    footerText: '',
    footerRight: '',
    fontColor: '#000',
    backgroundColor: '#fff'
  }
};

describe('FinishComponent', () => {
  let component: FinishComponent;
  let fixture: ComponentFixture<FinishComponent>;
  let mockConnector: any;
  let mockDialog: any;
  let fb: UntypedFormBuilder;

  beforeEach(async () => {
    // Erstelle einen Mock für den HeroesService (connector)
    mockConnector = {
      saveSpinner: {},
      additionalBackendInfos: { is_compare: false, is_recommendations: false } as AdditionlInfosFromBackend,
      emitQuestionnaireData: new Subject<any>(),
      sendFormValidStatus: new Subject<any>(),
      getQuestList: jasmine.createSpy('getQuestList'),
      saveWholeForm: jasmine.createSpy('saveWholeForm'),
      getCsvList: jasmine.createSpy('getCsvList'),
      updateFormValidsAndEmit: jasmine.createSpy('updateFormValidsAndEmit')
    };

    // Erstelle einen Mock für MatDialog
    mockDialog = {
      open: jasmine.createSpy('open').and.returnValue({
        afterClosed: () => of(true)
      })
    };

    await TestBed.configureTestingModule({
      declarations: [FinishComponent, DummyLanguageModalComponent, TranslatePipeStub],
      imports: [ReactiveFormsModule, MatSlideToggleModule],
      providers: [
        { provide: HeroesService, useValue: mockConnector },
        { provide: MatDialog, useValue: mockDialog },
        UntypedFormBuilder
      ]
    }).compileComponents();

    fb = TestBed.inject(UntypedFormBuilder);
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(FinishComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create the component', () => {
    expect(component).toBeTruthy();
  });

  it('should initialize the finishFormGroup and emit the form on ngOnInit', () => {
    let emittedData: any;
    component.initialisedFormToParentComponent.subscribe((data) => emittedData = data);
    mockConnector.emitQuestionnaireData.next(dummyQuestData);
    fixture.detectChanges();
    expect(component.finishFormGroup).toBeDefined();
    expect(component.questFileName).toEqual(dummyQuestData.config.questionnaireFileName);
    expect(emittedData.formName).toBe('finishFormGroup');
    expect(emittedData.form).toEqual(component.finishFormGroup);
  });

  it('should change color via colorChanged', () => {
    mockConnector.emitQuestionnaireData.next(dummyQuestData);
    fixture.detectChanges();
    const newPrimaryColor = '#123456';
    component.colorChanged(newPrimaryColor, 'primaryColor');
    const control = component.finishFormGroup.get(['mainColorGroup', 'primaryColor']) as UntypedFormControl;
    expect(control.value).toBe(newPrimaryColor);
  });

  it('should reset the filename with resetFileName', () => {
    mockConnector.emitQuestionnaireData.next(dummyQuestData);
    fixture.detectChanges();
    component.finishFormGroup.get('questionnaireFileName').setValue('geändert');
    component.resetFileName();
    expect(component.finishFormGroup.get('questionnaireFileName').value).toBe(component.questFileName);
  });

  describe('getQuestListAndSave', () => {
    beforeEach(() => {
      mockConnector.emitQuestionnaireData.next(dummyQuestData);
      component.wholeFormIsValid = true;
      fixture.detectChanges();
    });

    it('should call saveWholeForm if the file does not exist', fakeAsync(() => {
      mockConnector.getQuestList.and.returnValue(of([]));
      component.finishFormGroup.get('questionnaireFileName').setValue('newFile');
      component.questionnaireData = { ...dummyQuestData };
      component.getQuestListAndSave();
      tick();
      expect(mockConnector.saveWholeForm).toHaveBeenCalledWith('newFile');
    }));

    it('should open dialog if the file already exists', fakeAsync(() => {
      mockConnector.getQuestList.and.returnValue(of([{ value: 'existingFile' }]));
      component.finishFormGroup.get('questionnaireFileName').setValue('existingFile');
      component.questionnaireData = { ...dummyQuestData, config: { ...dummyQuestData.config, questionnaireFileName: 'existingFile' } };
      spyOn(component, 'openDialogFileAlreadyThere').and.callThrough();
      component.getQuestListAndSave();
      tick();
      expect(component.openDialogFileAlreadyThere).toHaveBeenCalledWith('existingFile');
    }));
  });

  describe('openDialogFileAlreadyThere', () => {
    beforeEach(() => {
      mockConnector.emitQuestionnaireData.next(dummyQuestData);
      fixture.detectChanges();
    });

    it('should open dialog and save form when result is true', fakeAsync(() => {
      component.openDialogFileAlreadyThere('existingFile');
      tick();
      expect(mockDialog.open).toHaveBeenCalled();
      expect(mockConnector.saveWholeForm).toHaveBeenCalledWith('existingFile');
    }));
  });

  it('should transform form values in sendAllFinishFormData', () => {
    mockConnector.emitQuestionnaireData.next(dummyQuestData);
    fixture.detectChanges();
    component.finishFormGroup.patchValue({
      finishMetaDataGroup: { resultWasViewed: 0 },
      pdfGroup: { pdfDirectly: true, pdfAsEmail: false }
    });
    const result = component.sendAllFinishFormData();
    expect(result.finishMetaDataGroup.resultWasViewed).toBe(0);
    expect(result.pdfGroup.pdfDirectly).toBe('1');
    expect(result.pdfGroup.pdfAsEmail).toBe('0');
  });

  it('should trim and format the questionnaire filename in trimQuestName', () => {
    mockConnector.emitQuestionnaireData.next(dummyQuestData);
    fixture.detectChanges();
    const formControl = component.finishFormGroup.get('questionnaireFileName');
    formControl.patchValue('Test@File!');
    component.trimQuestName({});
    expect(formControl.value).toBe('testfile');
  });

  it('should generate a password of default length', () => {
    const password = component.generatePassword();
    expect(password.length).toBe(8);
  });

  it('should change the email password in changeEmailPassword', () => {
    mockConnector.emitQuestionnaireData.next(dummyQuestData);
    fixture.detectChanges();
    const oldPassword = component.finishFormGroup.get(['finishMetaDataGroup', 'pdfAsEmailPassword']).value;
    component.changeEmailPassword();
    const newPassword = component.finishFormGroup.get(['finishMetaDataGroup', 'pdfAsEmailPassword']).value;
    expect(newPassword).not.toBe(oldPassword);
  });

  it('should set and get primary and secondary colors using getters and setters', () => {
    mockConnector.emitQuestionnaireData.next(dummyQuestData);
    fixture.detectChanges();
    component.primaryColor = '#111111';
    expect(component.finishFormGroup.get(['mainColorGroup', 'primaryColor']).value).toBe('#111111');
    expect(component.primaryColor).toBe('#111111');
    component.secondaryColor = '#222222';
    expect(component.finishFormGroup.get(['mainColorGroup', 'secondaryColor']).value).toBe('#222222');
    expect(component.secondaryColor).toBe('#222222');
  });

  describe('getCsvList', () => {
    beforeEach(() => {
      mockConnector.emitQuestionnaireData.next(dummyQuestData);
      fixture.detectChanges();
    });

    it('should set csvStringAreaStatus true on success and call downloadBlobFromString', fakeAsync(() => {
      const response = { status: 'success', message: 'CSV ok', data: 'csv data' };
      mockConnector.getCsvList.and.returnValue(of(response));
      spyOn(component, 'downloadBlobFromString').and.callThrough();
      component.finishFormGroup.get('questionnaireFileName').setValue('testfile');
      component.getCsvList();
      tick();
      expect(component.isLoadingCsv).toBeFalse();
      expect(component.csvStringAreaStatus).toBeTrue();
      expect(component.csvStringArea).toBe('CSV ok');
      expect(component.downloadBlobFromString).toHaveBeenCalledWith('csv data');
    }));

    it('should set csvStringAreaStatus false on error', fakeAsync(() => {
      const response = { status: 'error', message: 'CSV error' };
      mockConnector.getCsvList.and.returnValue(of(response));
      component.finishFormGroup.get('questionnaireFileName').setValue('testfile');
      component.getCsvList();
      tick();
      expect(component.isLoadingCsv).toBeFalse();
      expect(component.csvStringAreaStatus).toBeFalse();
      expect(component.csvStringArea).toBe('CSV error');
    }));
  });

  describe('downloadBlobFromString', () => {
    it('should create a download link and trigger a click', () => {
      const appendChildSpy = spyOn(document.body, 'appendChild').and.callThrough();
      const removeChildSpy = spyOn(document.body, 'removeChild').and.callThrough();
      const createObjectURLSpy = spyOn(URL, 'createObjectURL').and.callThrough();
      component.downloadBlobFromString('dummy csv data');
      expect(createObjectURLSpy).toHaveBeenCalled();
      expect(appendChildSpy).toHaveBeenCalled();
      expect(removeChildSpy).toHaveBeenCalled();
    });
  });

  it('should unsubscribe all subscriptions on ngOnDestroy', () => {
    component.formIsValidSubscription = { unsubscribe: jasmine.createSpy('unsubscribe') } as any;
    component.getQuestListSubscription = { unsubscribe: jasmine.createSpy('unsubscribe') } as any;
    component.getCsvListSubscription = { unsubscribe: jasmine.createSpy('unsubscribe') } as any;
    const unsubscribeSpy = spyOn((component as any).unsubscribe, 'next').and.callThrough();
    const completeSpy = spyOn((component as any).unsubscribe, 'complete').and.callThrough();
  
    component.ngOnDestroy();
  
    expect(component.formIsValidSubscription.unsubscribe).toHaveBeenCalled();
    expect(component.getQuestListSubscription.unsubscribe).toHaveBeenCalled();
    expect(component.getCsvListSubscription.unsubscribe).toHaveBeenCalled();
    expect(unsubscribeSpy).toHaveBeenCalled();
    expect(completeSpy).toHaveBeenCalled();
  });
  
});
