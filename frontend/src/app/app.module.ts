import { CommonModule } from '@angular/common';
import { HTTP_INTERCEPTORS, HttpClientModule, HttpClientXsrfModule } from '@angular/common/http';
import { NgModule } from '@angular/core';
import { FormsModule, NG_VALIDATORS, NG_VALUE_ACCESSOR, ReactiveFormsModule } from '@angular/forms';
import { BrowserModule } from '@angular/platform-browser';
import { BrowserAnimationsModule } from '@angular/platform-browser/animations';
import { RouterModule } from '@angular/router';
import { CustomTelInput } from '@components/custom-tel-input/custom-tel.input';
import { authStrategyProvider } from '@services/auth.strategy';

import { CookieInterceptor, ErrorInterceptor } from './_helpers';
import { PermissionsService } from './_services';
import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { LoginComponent, SignUpComponent } from './auth';
import { HomeComponent } from './home';
import { MaterialModule } from './material.module';

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
    PermissionsService,
    {
      provide: NG_VALUE_ACCESSOR,
      multi: true,
      useExisting: CustomTelInput
    },
    {
      provide: NG_VALIDATORS,
      multi: true,
      useExisting: CustomTelInput
    },
    {
      provide: HTTP_INTERCEPTORS,
      multi: true,
      useClass: CookieInterceptor
    },
    {
      provide: HTTP_INTERCEPTORS,
      multi: true,
      useClass: ErrorInterceptor
    }
  ],
  bootstrap: [AppComponent]
})
export class AppModule { }
