import { Component } from '@angular/core';
import { AuthService } from '@services/auth.service';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.scss']
})
export class AppComponent {
  title = 'frontend';
  isLoggedIn?: boolean | null;

  constructor(
    private authService: AuthService
  ) {
    this.authService.isLoggedIn$().subscribe(x => this.isLoggedIn = x);
  }

  logout() {
    this.authService.logout().subscribe();
  }
}
