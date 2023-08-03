export interface User {
  id?: number;
  firstName?: string;
  lastName?: string;
  email?: string;
}

export interface SignUpPassword {
  password: string;
}

export interface CompanyUser extends User {
  companyId?: number;
}

export interface Student extends User {
  middleName?: string;
  phone?: number;
  programId?: number;
  programTitle?: string;
  address?: string;
}
