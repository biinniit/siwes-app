import { Injectable } from '@angular/core';
import { Alert, AlertOptions, AlertType } from '@app/_models';
import { Observable, Subject } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class AlertService {
  private subject = new Subject<Alert | null>();

  constructor() { }

  onAlert(): Observable<Alert | null> {
    return this.subject.asObservable();
  }

  alert(alert: Alert) {
    this.subject.next(alert);
  }

  success(message: string, options: AlertOptions = {}) {
    this.alert({...options, type: AlertType.SUCCESS, message });
  }

  error(message: string, options: AlertOptions = {}) {
    this.alert({...options, type: AlertType.ERROR, message });
  }

  info(message: string, options: AlertOptions = {}) {
    this.alert({...options, type: AlertType.INFO, message });
  }

  warning(message: string, options: AlertOptions = {}) {
    this.alert({...options, type: AlertType.WARNING, message });
  }

  clear() {
    this.subject.next(null);
  }
}
