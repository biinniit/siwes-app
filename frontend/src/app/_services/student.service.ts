import { map } from 'rxjs/operators';
import { HttpClient } from "@angular/common/http";
import { Injectable } from "@angular/core";
import { ApiResponse, FileUrl, Student } from "@app/_models";
import { config } from "@environments/environment";
import { Observable } from "rxjs";
import { AuthService } from "./auth.service";

@Injectable()
export class StudentService {
  student?: Student | null;

  constructor(
    private http: HttpClient,
    private authService: AuthService
  ) {
    this.authService.isLoggedIn$().subscribe(isLoggedIn => {
      if(isLoggedIn) {
        this.authService.getCurrentUser$().subscribe(user =>
          this.student = user.studentId ? user as Student : null);
      }
      else this.student = null;
    });
  }

  getProfilePictureUrl(studentId?: number): Observable<string | null> {
    if(studentId == null) studentId = this.student?.studentId;
    return this.http.get<ApiResponse<FileUrl>>(`${config.apiUrl}/students/${studentId}/profile-picture`)
      .pipe(map(response => response.data.sourceUrl));
  }
}
