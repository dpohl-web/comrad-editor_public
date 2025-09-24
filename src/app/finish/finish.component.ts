import { LanguageModalComponent } from './../language-modal/language-modal.component';
import { MatDialog } from '@angular/material/dialog';
import { UntypedFormGroup, UntypedFormBuilder, Validators, UntypedFormControl, FormControl } from '@angular/forms';
import { HeroesService } from './../connector.service';
import { Component, OnInit, OnDestroy, EventEmitter, Output } from '@angular/core';
import { AdditionlInfosFromBackend, QuestData } from '../interfaces';
import { Subscription, Subject } from 'rxjs';
import FormHelperClass from '../formHelperClass';
import { cloneDeep } from 'lodash';
import { MyErrorStateMatcher } from '../MyErrorStateMatcherClass';

import { environment } from 'src/environments/environment';
const siteUrl = environment.reactQuestUrl;

@Component({
  selector: 'app-finish',
  templateUrl: './finish.component.html',
  styleUrls: ['./finish.component.scss']
})
export class FinishComponent extends FormHelperClass implements OnInit, OnDestroy {
  @Output() initialisedFormToParentComponent = new EventEmitter<any>();
  questionnaireData: QuestData;
  finishFormGroup: UntypedFormGroup;
  questFileName: string;
  formIsValidSubscription: Subscription;
  finishFormStatus: string;
  wholeFormIsValid: boolean;
  getQuestListSubscription: Subscription;
  getCsvListSubscription: Subscription;
  togglePrimarycolor = false;
  toggleSecondarycolor = false;
  matcher = new MyErrorStateMatcher();
  urlToQuest = siteUrl;
  saveSpinner: any;
  additionalBackendInfos: AdditionlInfosFromBackend;
  csvStringArea: string = '';
  csvStringAreaStatus: boolean = false;
  isLoadingCsv: boolean = false;

  private unsubscribe: Subject<void> = new Subject();

  constructor(connector: HeroesService, fb: UntypedFormBuilder, public dialog: MatDialog) {
    super(fb, connector);
  }

  /**
   * Initialize the finish form and creates the quest file name. Initialize the quest data. Subscribes the Form is valid status.
   */
  ngOnInit(): void {
    this.saveSpinner = this.connector.saveSpinner;
    this.additionalBackendInfos = this.connector.additionalBackendInfos;

    this.connector.emitQuestionnaireData.subscribe((questData) => {
      console.log('finish form group questData');
      console.log(questData);

    this.csvStringArea = '';
    this.csvStringAreaStatus = false;

      // New feature pdf as email. Für alte XML-Dateien Fallback auf direkten Button
      let pdfDirectly: boolean;
      let pdfAsEmail: boolean;
      if (questData.config.pdfGroup) {
        pdfDirectly = questData.config.pdfGroup.pdfDirectly === '1';
        pdfAsEmail = questData.config.pdfGroup.pdfAsEmail === '1';
      } else {
        pdfDirectly = true;
        pdfAsEmail = false;
      }
      this.questionnaireData = questData;
      this.questFileName = questData.config.questionnaireFileName;
      this.finishFormGroup = this.fb.group({
        questionnaireFileName: this.fb.control(questData.config.questionnaireFileName, [
          Validators.required,
          Validators.minLength(3),
          Validators.maxLength(30),
          this.forbiddenPatternValidator(/[^a-z0-9_]/)
        ]),
        mainColorGroup: this.fb.group({
          primaryColor: this.fb.control(questData.config.mainColors.primaryColor, Validators.required),
          secondaryColor: this.fb.control(questData.config.mainColors.secondaryColor, Validators.required)
        }),
        finishMetaDataGroup: this.fb.group({
          resultWasViewed: this.fb.control(questData.metaData.resultWasViewed ? questData.metaData.resultWasViewed : 0, Validators.required),
          pdfAsEmailPassword: this.fb.control({ value: questData.metaData.pdfAsEmailPassword ? questData.metaData.pdfAsEmailPassword : this.generatePassword(), disabled: true }),
        }),
        pdfGroup: this.fb.group({
          pdfDirectly: this.fb.control(pdfDirectly, Validators.required),
          pdfAsEmail: this.fb.control(pdfAsEmail, Validators.required),
        }),
      });

      console.log('finish form group');
      console.log(this.finishFormGroup);

      this.initialisedFormToParentComponent.emit({
        formName: 'finishFormGroup',
        form: this.finishFormGroup
      });

      this.checkFormvalidStatus(this.formIsValidSubscription, this.finishFormGroup, 'finishFormGroup');
    });

    this.connector.sendFormValidStatus.subscribe((allFormsStatus) => {
      this.wholeFormIsValid = allFormsStatus.allForms;
    });
  }

  /**
   * Unsubscribing
   */
  ngOnDestroy(): void {
    if (typeof this.formIsValidSubscription !== 'undefined') {
      this.formIsValidSubscription.unsubscribe();
    }
    if (typeof this.getQuestListSubscription !== 'undefined') {
      this.getQuestListSubscription.unsubscribe();
    }
    if (typeof this.getCsvListSubscription !== 'undefined') {
        this.getCsvListSubscription.unsubscribe();
      }
    this.unsubscribe.next();
    this.unsubscribe.complete();
  }

  colorChanged(value: string, controlName: string): void {
    const colorControl = this.finishFormGroup.get(['mainColorGroup', controlName]) as UntypedFormControl;
    colorControl.setValue(value);
  }

  getMainColorGroup(): UntypedFormGroup {
    return this.finishFormGroup.get(['mainColorGroup']) as UntypedFormGroup;
  }

  get pdfAsEmailPassword(): UntypedFormControl {
    return this.finishFormGroup.get('finishMetaDataGroup.pdfAsEmailPassword') as UntypedFormControl;
  }


  /**
   * resets the filename from the last request
   */
  resetFileName(): void {
    this.finishFormGroup.get('questionnaireFileName').patchValue(this.questFileName);
  }

  /**
   * Checks if the filename of the quest already exists. If yes, dialog opens and asks if you really want, and if not, quest will be safed.
   */
  getQuestListAndSave(): void {
    this.getQuestListSubscription = this.connector.getQuestList([{ key: 'fileNamesForSave', value: 'true' }])
      .subscribe((questNames) => {
        let questionnaireName = this.finishFormGroup.get('questionnaireFileName').value;
        this.questionnaireData.config.questionnaireFileName = questionnaireName;

        const nameHasInvalidSuffix = questionnaireName.includes('__invalid') &&
          questionnaireName.lastIndexOf('__invalid') === questionnaireName.length - '__invalid'.length;

        if (!this.wholeFormIsValid) {
          if (!nameHasInvalidSuffix) {
            questionnaireName = `${questionnaireName}__invalid`;
            this.questionnaireData.config.questionnaireFileName = questionnaireName;
          }
        } else {
          if (nameHasInvalidSuffix) {
            questionnaireName = questionnaireName.slice(0, -9);
            this.questionnaireData.config.questionnaireFileName = questionnaireName;
          }
        }

        const fileIsAlreadyThere = questNames.find((questName) => questName.value === questionnaireName);

        if (fileIsAlreadyThere) {
          this.openDialogFileAlreadyThere(questionnaireName);
        } else {
          this.connector.saveWholeForm(questionnaireName);
        }

        console.log('questionnaireName');
        console.log(questionnaireName);
      });
  }

  /**
   * Opens the dialog and asks, if you really want to override the exisiting file.
   *
   * @param filename the filename from the form input field
   */
  openDialogFileAlreadyThere(filename: string): void {
    const dialogRef = this.dialog.open(LanguageModalComponent, {
      data: {
        missingLanguages: [filename],
        modalString: 'overrideAlreadyExistingFile'
      }
    });

    dialogRef.afterClosed().subscribe((result) => {
      console.log(`Dialog result: ${result}`);
      if (result === true) {
        this.connector.saveWholeForm(filename);
      }
    });
  }

  sendAllFinishFormData(): any {
    const finishForm = cloneDeep(this.finishFormGroup.getRawValue());
    if (!finishForm.finishMetaDataGroup.resultWasViewed) {
      finishForm.finishMetaDataGroup.resultWasViewed = 0;
    }
    finishForm.pdfGroup.pdfDirectly = finishForm.pdfGroup.pdfDirectly === true ? '1' : '0';
    finishForm.pdfGroup.pdfAsEmail = finishForm.pdfGroup.pdfAsEmail === true ? '1' : '0';
    return finishForm;
  }

  trimQuestName(event: any): void {
    console.log('trimmed Questname event');
    console.log(event);
    const formControl = this.finishFormGroup.get('questionnaireFileName');
    const trimmedQuestName = formControl.value.toLowerCase().replace(/[^a-zA-Z0-9]+/g, '');
    formControl.patchValue(trimmedQuestName);
    console.log('trimmed Questname');
    console.log(trimmedQuestName);
  }

  generatePassword(passwordLength = 8): string {
    const numberChars = "23456789~!@-#$";
    const upperChars = "ABCDEFGHKLMNPQRSTUVWXYZ";
    const lowerChars = "abcdefghijkmnpqrstuvwxyz";
    const allChars = numberChars + upperChars + lowerChars;
    let randPasswordArray = Array(passwordLength);
    randPasswordArray[0] = numberChars;
    randPasswordArray[1] = upperChars;
    randPasswordArray[2] = lowerChars;
    randPasswordArray = randPasswordArray.fill(allChars, 3);
    return this.shuffleArray(randPasswordArray.map(x => x[Math.floor(Math.random() * x.length)])).join('');
  }

  shuffleArray(array: any[]): any[] {
    for (let i = array.length - 1; i > 0; i--) {
      const j = Math.floor(Math.random() * (i + 1));
      const temp = array[i];
      array[i] = array[j];
      array[j] = temp;
    }
    return array;
  }

  changeEmailPassword(): void {
    this.finishFormGroup.get(['finishMetaDataGroup', 'pdfAsEmailPassword']).setValue(this.generatePassword());
  }

  // Getter und Setter für primaryColor
  get primaryColor(): string {
    return this.finishFormGroup.get(['mainColorGroup', 'primaryColor']).value;
  }
  set primaryColor(value: string) {
    this.finishFormGroup.get(['mainColorGroup', 'primaryColor']).setValue(value);
  }

  // Getter und Setter für secondaryColor
  get secondaryColor(): string {
    return this.finishFormGroup.get(['mainColorGroup', 'secondaryColor']).value;
  }
  set secondaryColor(value: string) {
    this.finishFormGroup.get(['mainColorGroup', 'secondaryColor']).setValue(value);
  }

  get primaryColorControl(): FormControl {
    return this.finishFormGroup.get(['mainColorGroup', 'primaryColor']) as FormControl;
  }

  get secondaryColorControl(): FormControl {
    return this.finishFormGroup.get(['mainColorGroup', 'secondaryColor']) as FormControl;
  }

  /**
   * Fetches the csv for he results of this questionnaire
   */
  getCsvList(): void {
    this.isLoadingCsv = true;
    let questionnaireName = this.finishFormGroup.get('questionnaireFileName').value;
    this.getCsvListSubscription = this.connector.getCsvList(questionnaireName)
      .subscribe((response) => {
        this.isLoadingCsv = false;
        if (response.status === 'success') {
            this.csvStringAreaStatus = true;
            this.csvStringArea = response.message;
            this.downloadBlobFromString(response.data);
        } else {
            this.csvStringAreaStatus = false;
            this.csvStringArea = response.message;
        }
      });
  }

  /**
   * Creates a blob from the string and link that is downloaded automatically
   */
  downloadBlobFromString(string: string): void {
        const blob = new Blob([string], { type: 'text/csv;charset=utf-8;' });
        const filename = 'result.csv';

        // For browser that support HTML5 "download"-attribute
        const link = document.createElement('a');
        if (typeof link.download !== 'undefined') {
            const url = URL.createObjectURL(blob);
            link.setAttribute('href', url);
            link.setAttribute('download', filename);
            link.style.visibility = 'hidden';
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
            URL.revokeObjectURL(url);
        } else {
            // Fallback: Old browsers
            window.open(URL.createObjectURL(blob));
        }
  }

}
