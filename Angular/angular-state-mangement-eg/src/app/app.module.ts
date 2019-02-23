import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';
import { FormsModule } from '@angular/forms';

import { AppComponent } from './app.component';
import { HelloComponent } from './hello.component';
import { StoreModule } from '@ngrx/store';
import { reducer } from './reducer/tutorial.reducer';
import { CreateComponent } from './create/create.component';
import { ReadComponent } from './read/read.component';


@NgModule({
  imports: [BrowserModule, FormsModule,
   StoreModule.forRoot({
     tutorial: reducer
   })
   ],
  declarations: [AppComponent, HelloComponent, CreateComponent, ReadComponent],
  bootstrap: [AppComponent]
})
export class AppModule { }
