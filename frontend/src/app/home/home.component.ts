import { Component } from "@angular/core";
import { User } from "@app/_models";
import { AuthService } from "@app/_services";

@Component({
  templateUrl: './home.component.html'
})
export class HomeComponent {
  user?: User | null;

  constructor(private authService: AuthService) {
    this.authService.isLoggedIn$().subscribe(isLoggedIn => {
      if(isLoggedIn) this.authService.getCurrentUser$().subscribe(user => this.user = user);
      else this.user = null;
    });
  }
}
