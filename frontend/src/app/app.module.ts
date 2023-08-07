import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';
import { CommonModule } from '@angular/common';
import { AppRoutingModule } from './app-routing.module';
import { HttpClientModule } from '@angular/common/http';
import { FormsModule, NG_VALIDATORS, NG_VALUE_ACCESSOR, ReactiveFormsModule } from '@angular/forms';
import { BrowserAnimationsModule } from '@angular/platform-browser/animations';
import { RouterModule } from '@angular/router';
import { MaterialModule } from './material.module';
import { MatFormFieldControl } from '@angular/material/form-field';

import { AppComponent } from './app.component';
import { HomeComponent } from './home';
import { LoginComponent, SignUpComponent } from './auth';
import { CustomTelInput } from '@components/custom-tel-input/custom-tel.input';
import { authStrategyProvider } from '@services/auth.strategy';

@NgModule({
  declarations: [
    AppComponent,
    HomeComponent,
    LoginComponent,
    SignUpComponent,
    CustomTelInput
  ],
  imports: [
    AppRoutingModule,
    BrowserAnimationsModule,
    BrowserModule,
    CommonModule,
    FormsModule,
    HttpClientModule,
    MaterialModule,
    ReactiveFormsModule,
    RouterModule
  ],
  providers: [
    authStrategyProvider,
    {
      provide: NG_VALUE_ACCESSOR,
      multi: true,
      useExisting: CustomTelInput
    },
    {
      provide: NG_VALIDATORS,
      multi: true,
      useExisting: CustomTelInput
    }
  ],
  bootstrap: [AppComponent]
})
export class AppModule { }
