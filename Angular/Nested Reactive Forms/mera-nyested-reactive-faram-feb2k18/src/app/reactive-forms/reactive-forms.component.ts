import { Component, OnInit } from "@angular/core";
import { FormGroup, FormControl, FormArray, Validators } from "@angular/forms";
import { Apps, Skills } from './reactive-forms.model';
import { HttpClient } from '@angular/common/http';
@Component({
  selector: "app-reactive-forms",
  templateUrl: "./reactive-forms.component.html",
  styleUrls: ["./reactive-forms.component.css"]
})
export class ReactiveFormsComponent implements OnInit {
  ourForm: FormGroup; 
  isSkill: boolean = false;
  defaultApps: FormGroup;
  ourFormData: Apps[] = [];
  formLoaded: boolean = false;
  fbUrl: string = 'https://myreactiveform.firebaseio.com/data.json';
  constructor(private httpClient: HttpClient) { }

  ngOnInit() {

    // this.defaultApps = new FormGroup({
    //   common: new FormGroup({
    //     name: new FormControl(null),
    //     profession: new FormControl(null),
    //     enableSkill: new FormControl(false)
    //   }),
    //   skills: new FormArray([])
    // });
    // this.initForm();
    //  this.fnGetCheckBoxVal();
    this.fnGetDataFromFirebaseDB();
  }

  initSkills(data) {
    let controls = new FormArray([]);
    if (data.apps.length > 0) {
      console.log("Data exists!");
      data['apps'].forEach(x => {
        console.log(x);
        controls.push(new FormGroup({
          common: new FormGroup({
            name: new FormControl(x.common.name),
            profession: new FormControl(x.common.profession),
            enableSkill: new FormControl(x.common.enableSkill)
          }),
          skills: this.fnPopulateSkills(x.skills)
        }))
      })
    } else {
      console.log("Data does not exists!")
      controls.push(new FormGroup({
        common: new FormGroup({
          name: new FormControl(null),
          profession: new FormControl(null),
          enableSkill: new FormControl(false)
        }),
        skills: new FormArray([])
      }));
    }
    this.formLoaded =  true;
    return controls;
  }

  initForm(data) {
    this.ourForm = new FormGroup({
      "apps": this.initSkills(data)
    });
    // (this.ourForm.get('apps') as FormArray).push(this.defaultApps);

  }
  // get formSkills() {
  //   // return (<FormArray>this.ourForm.get("skills")).controls;
  //   return (app.get('skills') as FormArray).controls;
  // }
  getSkills(control: FormArray) {
    return (control.get('skills') as FormArray).controls;
  }

  fnOnAddSkill(app: FormControl, ind: number) {
    console.log(ind);
    const control = new FormControl(null, Validators.required);
    const myForm = app.get("skills") as FormArray;
    myForm.push(control);
  }

  fnGetCheckBoxVal(value, index) {
    //this method was created to handle checkbox show and hide functionality
    //but it has been handled at template side
    //  //.get('common').get("enableSkill")
    //  (this.ourForm.get('apps') as FormArray).valueChanges.subscribe(value => {
    //    console.log(value);
    //     value ? (this.isSkill = true) : (this.isSkill = false);
    //   });
    console.log(value, index);
    //value ? (this.isSkill = true) : (this.isSkill = false);
  }
  fnOnAddProfile() {
    (this.ourForm.get('apps') as FormArray).push(this.initSkills());
  }
  // fnOnRemoveSkills(appId, skillId) {
  //   console.log(appId, skillId);
  //   //console.log(this.ourForm.get('apps').controls[appId].get('skills').controls.splice(skillId, 1))  
  // }

  fnOnRemoveProfile(profileID) {
    console.log(profileID);
    //console.log((this.ourForm.get('apps') as FormArray).controls[0])
    (this.ourForm.get('apps') as FormArray).removeAt(profileID);
  }

  fnOnRemoveSkills(controls, skillId) {
    console.log(controls, skillId);
    //console.log(this.ourForm.get('apps').controls[appId].get('skills').controls.splice(skillId, 1))  
    controls.removeAt(skillId);
  }

  fnClearForm(pID) {
    console.log(pID);
    (this.ourForm.get('apps') as FormArray).controls[0].reset();
  }
  fnClearAllProfile() {
    this.ourForm.get('apps').reset();
  }

  fnSave() {
    console.log(this.ourForm);
    this.ourFormData = this.ourForm.value;
    console.log(this.ourFormData);
    this.fnSaveToFirebaseDB(this.ourFormData);
  }

  fnSaveToFirebaseDB(profileData: Apps[]) {
    console.log(profileData);
    this.httpClient.put<Apps>(this.fbUrl, profileData)
      .subscribe(data => console.log(data));
  }

  fnGetDataFromFirebaseDB() {
    this.httpClient.get<Apps>(this.fbUrl).subscribe(
      data => {
        console.log(data);
        this.fnPopulateProfile(data);
      })
  }

  fnPopulateProfile(data) {
    this.ourFormData = data;
    this.initForm(data);

  }

  fnPopulateSkills(skills: Skills) {
    let skillControl = new FormArray([]);
    skills.forEach(y => {
      skillControl.push(new FormControl(y))
    })
    return skillControl;
  }


}



/*
(method) AbstractControl.get(path: string | (string | number)[]): AbstractControl
Retrieves a child control given the control's name or path.

@param path A dot-delimited string or array of string/number values that define the path to the control.

@usageNotes

Retrieve a nested control
For example, to get a name control nested within a person sub-group:

this.form.get('person.name');
-OR-

this.form.get(['person', 'name']);
 */