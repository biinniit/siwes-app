import { HttpClient } from "@angular/common/http";
import { FactoryProvider, InjectionToken } from "@angular/core";
import { Observable } from "rxjs";
import { SessionAuthStrategy } from "./session-auth.strategy";
import { JwtAuthStrategy } from "./jwt-auth.strategy";
import { config } from "@environments/environment";
import { User } from "@app/_models";

export interface AuthStrategy<T> {
  doLoginUser(data: T): void;

  doLogoutUser(): void;

  getCurrentUser(): Observable<User>;
}

export const AUTH_STRATEGY = new InjectionToken<AuthStrategy<any>>(
  "AuthStrategy"
);

export const authStrategyProvider: FactoryProvider = {
  provide: AUTH_STRATEGY,
  deps: [HttpClient],
  useFactory: (http: HttpClient) => {
    switch (config.auth) {
      case "session":
        return new SessionAuthStrategy(http);
      case "token":
        return new JwtAuthStrategy();
    }
  },
};
