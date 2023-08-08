import { HttpClient } from "@angular/common/http";
import { User } from "@app/_models";
import { config } from "@environments/environment";
import { BehaviorSubject, Observable, of } from "rxjs";
import { tap } from "rxjs/operators";

import { AuthStrategy } from "./auth.strategy";

export class SessionAuthStrategy implements AuthStrategy<User> {
  private loggedUser?: User;
  private isLoggedInSubject!: BehaviorSubject<boolean>;
  public isLoggedIn!: Observable<boolean>;

  constructor(private http: HttpClient) {
    this.isLoggedInSubject = new BehaviorSubject(!!this.loggedUser);
    this.isLoggedIn = this.isLoggedInSubject.asObservable();
  }

  doLoginUser(user: User): void {
    this.loggedUser = user;
    this.isLoggedInSubject.next(true);
  }

  doLogoutUser(): void {
    this.loggedUser = undefined;
    this.isLoggedInSubject.next(false);
    console.log('Logout subject called');
  }

  getCurrentUser(): Observable<User> {
    if (this.loggedUser) {
      return of(this.loggedUser);
    } else {
      return this.http
        .get<User>(`${config.authUrl}/user`)
        .pipe(tap((user) => (this.loggedUser = user)));
    }
  }
}
