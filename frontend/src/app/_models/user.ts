export interface User {
  [key: string]: any;
  firstName: string;
  lastName: string;
  email: string;
}

export interface SignUpPassword {
  password: string;
}

export interface StudentDetails extends User {
  middleName?: string;
  phone?: number;
  programId?: number;
  programTitle?: string;
  address?: string;
}

export interface Student extends StudentDetails {
  studentId: number;
}

export interface CompanyUserDetails extends User {
  companyId: number;
}

export interface CompanyUser extends CompanyUserDetails {
  companyUserId: number;
}
