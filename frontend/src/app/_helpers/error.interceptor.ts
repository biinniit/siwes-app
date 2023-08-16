import { HttpEvent, HttpHandler, HttpInterceptor, HttpRequest } from "@angular/common/http";
import { Injectable } from "@angular/core";
import { AuthService, PermissionsService } from '@app/_services';
import { Observable, throwError } from 'rxjs';
import { catchError } from 'rxjs/operators';

@Injectable()
export class ErrorInterceptor implements HttpInterceptor {
  constructor(
    private authService: AuthService,
    private permissionsService: PermissionsService
  ) { }

  intercept(request: HttpRequest<any>, next: HttpHandler): Observable<HttpEvent<any>> {
    return next.handle(request).pipe(
      catchError(err => {
        if([401, 403].includes(err.status) && this.permissionsService.isLoggedIn) {
          // auto logout if 401 or 403 response returned from API
          this.authService.logout().subscribe();
        }
        
        const error = err.error?.message || err.statusText;
        console.error(err);
        return throwError(() => error);
      })
    )
  }
}
