interface Config {
  [key: string]: string;
  auth: "session" | "token";
}

// Session auth needs to use the same origin anyway
export const config: Config = {
  rootUrl: "http://localhost",
  apiUrl: "http://localhost/api",
  adminUrl: "http://localhost/api/admin",
  authUrl: "http://localhost/api/auth",
  auth: "session",
};

export const environment = {
  apiUrl: "http://localhost/api"
};
