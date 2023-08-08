import { HttpClient } from "@angular/common/http";
import { Inject, Injectable } from "@angular/core";
import { Router } from "@angular/router";
import { LoginRequest, SignUpPassword, Student, User } from "@app/_models";
import { config } from "@environments/environment";
import { Observable, of, switchMap } from "rxjs";
import { catchError, map, tap } from "rxjs/operators";

import { AUTH_STRATEGY, AuthStrategy } from "./auth.strategy";

@Injectable({
  providedIn: 'root'
})
export class AuthService {
  
  public readonly LOGIN_PATH = '/login';
  // public readonly CONFIRM_PATH = '/confirm';
  public readonly INITIAL_PATH = '/app/dashboard';

  constructor(
    private router: Router,
    private http: HttpClient,
    @Inject(AUTH_STRATEGY) private auth: AuthStrategy<any>
  ) { }

  signup(user: Student & SignUpPassword): Observable<User> {
    return this.initCsrfProtection()
      .pipe(switchMap(() => this.http.post<any>(`${config.authUrl}/sign-up`, user)))
      .pipe(tap(data => this.auth.doLoginUser(data)));
  }

  // confirm(email: string, code: string): Observable<void> {
  //   return this.http.post<any>(`${config.authUrl}/confirm?`, {email, code});
  // }

  login(loginRequest: LoginRequest): Observable<User> {
    return this.initCsrfProtection()
      .pipe(switchMap(() => this.http.post<LoginRequest>(`${config.authUrl}/login`, loginRequest)))
      .pipe(tap(data => this.auth.doLoginUser(data)));
  }

  logout() {
    return this.http.get<any>(`${config.authUrl}/logout`)
      .pipe(tap(() => this.doLogoutUser()));
  }

  initCsrfProtection(): Observable<void> {
    return this.http.get<any>(`${config.rootUrl}/sanctum/csrf-cookie`);
  }

  isLoggedIn$(): Observable<boolean> {
    return this.auth.getCurrentUser().pipe(
      map(user => !!user),
      catchError(() => of(false))
    );
  }

  getCurrentUser$(): Observable<User> {
    return this.auth.getCurrentUser();
  }

  private doLogoutUser() {
    this.auth.doLogoutUser();
  }

}
