export interface Alert {
  id?: string;
  type?: AlertType;
  message?: string;
  autoClose?: boolean;
  keepAfterRouteChange?: boolean;
  fade?: boolean;
}

export enum AlertType {
  SUCCESS,
  ERROR,
  INFO,
  WARNING
}

export interface AlertOptions {
  id?: string;
  autoClose?: boolean;
  keepAfterRouteChange?: boolean;
}
