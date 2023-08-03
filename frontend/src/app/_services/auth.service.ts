import { Observable, of } from "rxjs";
import { catchError, map, tap } from "rxjs/operators";
import { HttpClient } from "@angular/common/http";
import { Injectable, Inject } from "@angular/core";
import { Router } from "@angular/router";
import { AuthStrategy, AUTH_STRATEGY } from "./auth.strategy";
import { config } from "@environments/environment";
import { LoginRequest, SignUpPassword, Student, User } from "@app/_models";

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

  signup(user: Student & SignUpPassword): Observable<void> {
    return this.http.post<any>(`${config.authUrl}/signup`, user);
  }

  // confirm(email: string, code: string): Observable<void> {
  //   return this.http.post<any>(`${config.authUrl}/confirm?`, {email, code});
  // }

  login(loginRequest: LoginRequest): Observable<User> {
    return this.http.post<any>(`${config.authUrl}/login`, loginRequest)
      .pipe(tap(data => this.auth.doLoginUser(data)));
  }

  logout() {
    return this.http.get<any>(`${config.authUrl}/logout`)
      .pipe(tap(() => this.doLogoutUser()));
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
