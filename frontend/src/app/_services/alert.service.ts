import { Injectable } from '@angular/core';
import { NavigationStart, Router } from '@angular/router';
import { Alert, AlertOptions, AlertType } from '@app/_models';
import { Observable, Subject } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class AlertService {
  private subject = new Subject<Alert | null>();
  private showAfterRedirect = false;

  constructor(private router: Router) {
    // clear alert messages on route change unless 'showAfterRedirect' flag is true
    this.router.events.subscribe(event => {
      if (event instanceof NavigationStart) {
        if (this.showAfterRedirect) {
          // only keep for a single route change
          this.showAfterRedirect = false;
        } else {
          // clear alert message
          this.clear();
        }
      }
    });
  }

  onAlert(): Observable<Alert | null> {
    return this.subject.asObservable();
  }

  alert(alert: Alert) {
    this.subject.next(alert);
  }

  success(message: string, options: AlertOptions) {
    this.alert({...options, type: AlertType.SUCCESS, message });
  }

  error(message: string, options: AlertOptions) {
    this.alert({...options, type: AlertType.ERROR, message });
  }

  info(message: string, options: AlertOptions) {
    this.alert({...options, type: AlertType.INFO, message });
  }

  warning(message: string, options: AlertOptions) {
    this.alert({...options, type: AlertType.WARNING, message });
  }

  clear() {
    this.subject.next(null);
  }
}
