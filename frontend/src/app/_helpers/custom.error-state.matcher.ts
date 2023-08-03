import { AbstractControl, FormGroupDirective, NgForm } from "@angular/forms";
import { ErrorStateMatcher } from "@angular/material/core";

export class CustomErrorStateMatcher implements ErrorStateMatcher {
  isErrorState(control: AbstractControl<any, any> | null, form: FormGroupDirective | NgForm | null): boolean {
    const invalidCtrl = !!(control?.dirty && control?.invalid && control?.parent?.dirty);
    const invalidParent = !!(control?.parent?.invalid && control?.parent?.dirty);

    return !!(control?.parent?.errors) && control.touched && (invalidCtrl || invalidParent);
  }
}
