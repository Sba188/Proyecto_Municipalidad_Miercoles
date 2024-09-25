import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { NavbarComponent } from './modules/shared/component/navbar/navbar.component';
import { SharedModule } from './modules/shared/shared.module';

import { RouterModule, Routes } from '@angular/router';

//importaciones de angular


@NgModule({
  declarations: [

  ],

  imports: [
    BrowserModule,
    AppRoutingModule,
    AppComponent,
    SharedModule
    

  ],
  providers: [],
  bootstrap: []
})
export class AppModule { }
