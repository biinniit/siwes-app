export interface Alert {
  type: AlertType;
  message: string;
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
  autoClose?: boolean;
  keepAfterRouteChange?: boolean;
}
