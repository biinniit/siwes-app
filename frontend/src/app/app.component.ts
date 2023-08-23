import { Component } from '@angular/core';
import { MatSnackBar } from '@angular/material/snack-bar';
import { NavigationStart, Router } from '@angular/router';

import { Alert, AlertType } from './_models';
import { AlertService, AuthService } from './_services';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.scss']
})
export class AppComponent {
  title = 'frontend';
  isLoggedIn?: boolean | null;

  alert?: Alert | null;
  readonly ALERT_DURATION_SECONDS = 5;
  readonly alertCssClassMap: Map<AlertType, string> = new Map([
    [AlertType.SUCCESS, 'alert-success'],
    [AlertType.ERROR, 'alert-error'],
    [AlertType.INFO, 'alert-info'],
    [AlertType.WARNING, 'alert-warn']
  ]);

  constructor(
    private authService: AuthService,
    private alertService: AlertService,
    private _snackBar: MatSnackBar,
    private router: Router
  ) {
    this.authService.isLoggedIn$().subscribe(x => this.isLoggedIn = x);

    this.alertService.onAlert().subscribe(x => {
      this.alert = x;
      if(x)
        this.showAlert(); // if the alert "x" is not null
      else
        this._snackBar._openedSnackBarRef?.dismiss();
    });

    // clear alert messages on route change unless 'keepAfterRouteChange' flag is true
    this.router.events.subscribe(event => {
      if(event instanceof NavigationStart) {
        if(this.alert?.keepAfterRouteChange) {
          // only keep for a single route change
          this.alert.keepAfterRouteChange = false;
          this.alertService.alert(this.alert);
        } else {
          this.alertService.clear();
        }
      }
    });
  }

  showAlert() {
    if(!this.alert) return;

    const snackBarRef = this._snackBar.open(this.alert?.message, 'OK', {
      duration: this.alert.autoClose ? this.ALERT_DURATION_SECONDS * 1000 : undefined,
      panelClass: this.alertCssClassMap.get(this.alert.type),
      horizontalPosition: 'start',
      verticalPosition: 'bottom'
    })

    snackBarRef.afterDismissed().subscribe(() => this.alertService.clear());
  }

  goHome() {
    this.router.navigateByUrl('/');
  }

  logout() {
    this.authService.logout().subscribe();
  }
}
