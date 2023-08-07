import { HttpEvent, HttpHandler, HttpInterceptor, HttpRequest, HttpXsrfTokenExtractor } from "@angular/common/http";
import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';

@Injectable()
export class CookieInterceptor implements HttpInterceptor {
  readonly XSRF_HEADER_NAME = 'X-XSRF-TOKEN';

  constructor(
    private tokenService: HttpXsrfTokenExtractor
  ) { }

  intercept(request: HttpRequest<any>, next: HttpHandler): Observable<HttpEvent<any>> {
    const token = this.tokenService.getToken();
    request = request.clone({ withCredentials: true });

    // Be careful not to overwrite an existing header of the same name.
    if (token !== null && !request.headers.has(this.XSRF_HEADER_NAME)) {
      request = request.clone({headers: request.headers.set(this.XSRF_HEADER_NAME, token)});
    }
    return next.handle(request);
  }
}
