interface Config {
  [key: string]: string;
  auth: "session" | "token";
}

// Session auth needs to use the same origin anyway
export const config: Config = {
  apiUrl: "http://siwes-app.dev/api",
  adminUrl: "http://siwes-app.dev/api/admin",
  authUrl: "http://siwes-app.dev/api/auth",
  auth: "session",
};

export const environment = {
  apiUrl: "http://siwes-app.dev/api"
};
