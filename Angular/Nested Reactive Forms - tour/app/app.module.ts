import { BrowserModule } from "@angular/platform-browser";
import { NgModule } from "@angular/core";

import { AppRoutingModule } from "./app-routing.module";
import { MyFormModule } from "./forms/myforms.module";
import { AppComponent } from "./app.component";
@NgModule({
  declarations: [AppComponent],
  imports: [BrowserModule, AppRoutingModule, MyFormModule],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule {}
