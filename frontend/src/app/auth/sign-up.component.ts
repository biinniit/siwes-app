import { Component } from "@angular/core";
import { AbstractControl, FormBuilder, ValidationErrors, ValidatorFn, Validators } from '@angular/forms';
import { Router } from '@angular/router';
import { CustomTelInput } from "@app/_components/custom-tel-input/custom-tel.input";
import { CustomErrorStateMatcher } from "@helpers/custom.error-state.matcher";
import { CustomTel } from '@models/custom-tel';
import { AuthService } from '@services/auth.service';

@Component({
  selector: 'app-sign-up',
  templateUrl: './sign-up.component.html',
  styleUrls: ['./sign-up.component.scss']
})
export class SignUpComponent {
  readonly checkPasswords: ValidatorFn = (group: AbstractControl): ValidationErrors | null => { 
    let pass = group.get('password')?.value;
    let confirmPass = group.get('confirmPassword')?.value
    return pass === confirmPass ? null : { notSame: true }
  }

  signUpForm = this.formBuilder.group({
    firstName: ['', [Validators.required, Validators.maxLength(255)]],
    middleName: ['', Validators.maxLength(255)],
    lastName: ['', [Validators.required, Validators.maxLength(255)]],
    email: ['', [Validators.required, Validators.email]],
    phone: [new CustomTel('', '', '')],
    password: ['', [Validators.required, Validators.minLength(6)]],
    confirmPassword: ['', Validators.required]
  }, {
    validators: this.checkPasswords,
    updateOn: 'change'
  });
  hidePassword = true;
  passwordMatcher = new CustomErrorStateMatcher();

  constructor(
    private formBuilder: FormBuilder,
    private authService: AuthService,
    private router: Router
  ) { }

  get f() {
    return this.signUpForm.controls;
  }

  phoneInvalid(): boolean {
    return (this.f.phone as unknown as CustomTelInput).errorState;
  }

  onSignUp(): void {
    this.authService.signup({
      firstName: this.f.firstName.value ?? undefined,
      middleName: this.f.middleName.value ?? undefined,
      lastName: this.f.lastName.value ?? undefined,
      email: this.f.email.value ?? undefined,
      password: this.f.password.value ?? '',
      phone: this.f.phone.value?.asNumber()
    // TODO: change to CONFIRM_PATH when implementing email confirmation
    }).subscribe(user => {
      console.log('Logged in user:', user);
      this.router.navigate([this.authService.INITIAL_PATH]);
    });
  }
}
