import { inject, Injectable } from "@angular/core";
import { ActivatedRouteSnapshot, CanActivateFn, Router, RouterStateSnapshot, UrlTree } from "@angular/router";

import { AuthService } from "./auth.service";

export enum Routes {
  HOME = '/'
}

@Injectable()
export class PermissionsService {
  isLoggedIn?: boolean | null;

  constructor(
    private authService: AuthService,
    private router: Router
  ) {
    this.authService.isLoggedIn$().subscribe(x => this.isLoggedIn = x);
  }

  getAuthPermission(state: RouterStateSnapshot): boolean | UrlTree {
    if(this.isLoggedIn) return true;

    return this.router.createUrlTree(['/account/login'], {
      queryParams: { returnUrl: state.url }
    });
  }
}

export const authGuard: CanActivateFn = (route: ActivatedRouteSnapshot, state: RouterStateSnapshot) => {
  return inject(PermissionsService).getAuthPermission(state);
};
