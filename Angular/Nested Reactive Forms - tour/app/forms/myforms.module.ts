import { NgModule } from "@angular/core";
import { ReactiveFormsModule } from "@angular/forms";
import { NestedFormComponent } from "./nested-form/nested-form.component";
import { CommonModule } from "@angular/common";

@NgModule({
  declarations: [NestedFormComponent],
  imports: [CommonModule, ReactiveFormsModule],
  exports: []
})
export class MyFormModule {}
