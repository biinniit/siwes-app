import { Subject } from "rxjs";
import { Component, ElementRef, Inject, Input, OnDestroy, Optional, Self, ViewChild } from '@angular/core';
import { AbstractControl, ControlValueAccessor, FormBuilder, FormControl, FormGroup, NgControl, ValidationErrors, Validator, Validators } from '@angular/forms';
import { MAT_FORM_FIELD, MatFormField, MatFormFieldControl } from '@angular/material/form-field';
import { BooleanInput, coerceBooleanProperty } from "@angular/cdk/coercion";
import { FocusMonitor } from "@angular/cdk/a11y";
import { CustomTel } from "@models/custom-tel";

/** Custom `MatFormFieldControl` for telephone number input. */
@Component({
  selector: 'custom-tel-input',
  templateUrl: './custom-tel.input.html',
  styleUrls: ['./custom-tel.input.scss'],
  providers: [{ provide: MatFormFieldControl, useExisting: CustomTelInput }],
  host: {
    '[class.custom-floating]': 'shouldLabelFloat',
    '[id]': 'id',
  }
})
export class CustomTelInput implements ControlValueAccessor, MatFormFieldControl<CustomTel>, OnDestroy, Validator {
  static nextId = 0;
  @ViewChild('area') areaInput!: HTMLInputElement;
  @ViewChild('exchange') exchangeInput!: HTMLInputElement;
  @ViewChild('subscriber') subscriberInput!: HTMLInputElement;

  parts: FormGroup<{
    area: FormControl<string | null>;
    exchange: FormControl<string | null>;
    subscriber: FormControl<string | null>;
  }>;
  stateChanges = new Subject<void>();
  focused = false;
  touched = false;
  controlType = 'custom-tel-input';
  id = `custom-tel-input-${CustomTelInput.nextId++}`;
  onChange = (_: any) => {};
  onTouched = () => {};

  get empty() {
    const {
      value: {area, exchange, subscriber},
    } = this.parts;

    return !area && !exchange && !subscriber;
  }

  get shouldLabelFloat() {
    return this.focused || !this.empty;
  }

  @Input('aria-describedby') userAriaDescribedBy!: string;

  @Input()
  get placeholder(): string {
    return this._placeholder;
  }
  set placeholder(value: string) {
    this._placeholder = value;
    this.stateChanges.next();
  }
  private _placeholder!: string;

  @Input()
  get required(): boolean {
    return this._required;
  }
  set required(value: BooleanInput) {
    this._required = coerceBooleanProperty(value);
    this.stateChanges.next();
  }
  private _required = false;

  @Input()
  get disabled(): boolean {
    return this._disabled;
  }
  set disabled(value: BooleanInput) {
    this._disabled = coerceBooleanProperty(value);
    this._disabled ? this.parts.disable() : this.parts.enable();
    this.stateChanges.next();
  }
  private _disabled = false;

  @Input()
  get value(): CustomTel | null {
    if (this.parts.valid) {
      const {
        value: {area, exchange, subscriber},
      } = this.parts;
      return new CustomTel(area!, exchange!, subscriber!);
    }
    return null;
  }
  set value(tel: CustomTel | null) {
    const {area, exchange, subscriber} = tel || new CustomTel('', '', '');
    this.parts.setValue({area, exchange, subscriber});
    this.stateChanges.next();
  }

  get errorState(): boolean {
    const touched = !!this.ngControl.touched;
    if(touched != this.touched) {
      this.touched = touched;
      this.stateChanges.next();
    }
    return (this.parts.invalid || !!this.ngControl.invalid) && this.touched;
  }

  constructor(
    formBuilder: FormBuilder,
    private _focusMonitor: FocusMonitor,
    private _elementRef: ElementRef<HTMLElement>,
    @Optional() @Inject(MAT_FORM_FIELD) public _formField: MatFormField,
    @Optional() @Self() public ngControl: NgControl,
  ) {
    if (this.ngControl != null) {
      this.ngControl.valueAccessor = this;
    }

    this.parts = formBuilder.group({
      area: ['', [Validators.required, Validators.minLength(3), Validators.maxLength(3)]],
      exchange: ['', [Validators.required, Validators.minLength(3), Validators.maxLength(3)]],
      subscriber: ['', [Validators.required, Validators.minLength(4), Validators.maxLength(4)]],
    });
  }

  ngOnDestroy() {
    this.stateChanges.complete();
    this._focusMonitor.stopMonitoring(this._elementRef);
  }

  onFocusIn(event: FocusEvent) {
    if (!this.focused) {
      this.focused = true;
      this.stateChanges.next();
    }
  }

  onFocusOut(event: FocusEvent) {
    if (!this._elementRef.nativeElement.contains(event.relatedTarget as Element)) {
      this.touched = true;
      this.focused = false;
      this.onTouched();
      this.stateChanges.next();
    }
  }

  autoFocusNext(control: AbstractControl, nextElement?: HTMLInputElement): void {
    if (!control.errors && nextElement) {
      this._focusMonitor.focusVia(nextElement, 'program');
    }
  }

  autoFocusPrev(control: AbstractControl, prevElement: HTMLInputElement): void {
    if (control.value.length < 1) {
      this._focusMonitor.focusVia(prevElement, 'program');
    }
  }

  setDescribedByIds(ids: string[]) {
    const controlElement = this._elementRef.nativeElement.querySelector(
      '.custom-tel-input-container',
    )!;
    controlElement.setAttribute('aria-describedby', ids.join(' '));
  }

  onContainerClick() {
    if (this.parts.controls.subscriber.valid) {
      this._focusMonitor.focusVia(this.subscriberInput, 'program');
    } else if (this.parts.controls.exchange.valid) {
      this._focusMonitor.focusVia(this.subscriberInput, 'program');
    } else if (this.parts.controls.area.valid) {
      this._focusMonitor.focusVia(this.exchangeInput, 'program');
    } else {
      this._focusMonitor.focusVia(this.areaInput, 'program');
    }
  }

  writeValue(tel: CustomTel | null): void {
    this.value = tel;
  }

  registerOnChange(fn: any): void {
    this.onChange = fn;
  }

  registerOnTouched(fn: any): void {
    this.onTouched = fn;
  }

  setDisabledState(isDisabled: boolean): void {
    this.disabled = isDisabled;
  }

  _handleInput(control: AbstractControl, nextElement?: HTMLInputElement): void {
    this.autoFocusNext(control, nextElement);
    this.onChange(this.value);
  }

  validate(control: AbstractControl<any, any>): ValidationErrors | null {
    if(this.parts.valid) return null;

    let errors: ValidationErrors = {};
    errors = this.addControlErrors(errors, 'area');
    errors = this.addControlErrors(errors, 'exchange');
    errors = this.addControlErrors(errors, 'subscriber');
    return errors;
  }

  addControlErrors(allErrors: any, controlName: 'area' | 'exchange' | 'subscriber') {
    const errors = {...allErrors};
    const controlErrors = this.parts.controls[controlName].errors;

    if (controlErrors) {
      errors[controlName] = controlErrors;
    }
    return errors;
  }
}
