import { NgModule } from "@angular/core";
import { Routes, RouterModule } from "@angular/router";
import { NestedFormComponent } from "./forms/nested-form/nested-form.component";

const routes: Routes = [
  { path: "", redirectTo: "/nestedForm", pathMatch: "full" },
  { path: "nestedForm", component: NestedFormComponent, pathMatch: "full" }
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule {}
