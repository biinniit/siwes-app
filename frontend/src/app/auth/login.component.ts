import { Component } from '@angular/core';
import { FormBuilder, Validators } from '@angular/forms';
import { Router } from '@angular/router';
import { AuthService } from '@services/auth.service';
import { LoginRequest } from '@models/login-request';

@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.scss']
})
export class LoginComponent {
  loginForm = this.formBuilder.group({
    email: ['', [Validators.required, Validators.email]],
    password: ['', [Validators.required, Validators.minLength(6)]]
  });
  hidePassword = true;

  constructor(
    private formBuilder: FormBuilder,
    private authService: AuthService,
    private router: Router
  ) { }

  get f() {
    return this.loginForm.controls;
  }

  onLogin(): void {
    const loginRequest: LoginRequest = {
      email: this.f.email.value ?? '',
      password: this.f.password.value ?? ''
    };

    this.authService.login(loginRequest)
      .subscribe(user => this.router.navigate([this.authService.INITIAL_PATH]));
  }
}
