import { Component } from '@angular/core';
import { FormBuilder, Validators } from '@angular/forms';
import { ActivatedRoute, Router } from '@angular/router';
import { AlertService, AuthService } from '@app/_services';
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
    private route: ActivatedRoute,
    private router: Router,
    private alertService: AlertService
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
      .subscribe({
        next: user => {
          console.log('Logged in user:', user);
          const returnUrl = this.route.snapshot.queryParams['returnUrl'] ?? this.authService.INITIAL_PATH;
          this.router.navigateByUrl(returnUrl);
        },
        error: errMessage => {
          this.alertService.error(errMessage);
        }
      });
  }
}
