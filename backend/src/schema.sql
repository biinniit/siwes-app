/* DB definition & manipulation history */

CREATE TABLE `Company` (
  `Company ID` PK,
  `Name` VARCHAR(255),
  `Logo ID` FK,
  `Website` TEXT
);

CREATE TABLE `Branch` (
  `Branch ID` PK,
  `Company ID` FK,
  `Name` VARCHAR(255),
  `Address` TEXT,
  `Phone` BIGINT,
  FOREIGN KEY (`Company ID`) REFERENCES `Company`(`Company ID`)
);

CREATE TABLE `Role` (
  `Role ID` PK,
  `Branch ID` FK,
  `Title` VARCHAR(255),
  `Remuneration` DECIMAL(10,2),
  `Remuneration Cycle` ENUM,
  `Slots` SMALLINT,
  FOREIGN KEY (`Branch ID`) REFERENCES `Branch`(`Branch ID`)
);

CREATE TABLE `Tag` (
  `Tag ID` PK,
  `Name` VARCHAR(255)
);

CREATE TABLE `Role Tag` (
  `Tag ID` FK,
  `Role ID` FK,
  FOREIGN KEY (`Role ID`) REFERENCES `Role`(`Role ID`),
  FOREIGN KEY (`Tag ID`) REFERENCES `Tag`(`Tag ID`)
);

CREATE TABLE `Program` (
  `Program ID` PK,
  `Title` VARCHAR(255)
);

CREATE TABLE `Student` (
  `Student ID` PK,
  `First Name` VARCHAR(100),
  `Middle Name` VARCHAR(100),
  `Last Name` VARCHAR(100),
  `Email` VARCHAR(255),
  `Password Hash` BINARY(32),
  `Phone` BIGINT,
  `Program ID` FK,
  `Address` TEXT,
  `Profile Picture ID` FK,
  `Resume ID` FK,
  FOREIGN KEY (`Program ID`) REFERENCES `Program`(`Program ID`)
);

CREATE TABLE `Application` (
  `Student ID` FK,
  `Role ID` FK,
  FOREIGN KEY (`Role ID`) REFERENCES `Role`(`Role ID`),
  FOREIGN KEY (`Student ID`) REFERENCES `Student`(`Student ID`)
);

CREATE TABLE `Company Image` (
  `Image ID` FK,
  `Company ID` FK,
  FOREIGN KEY (`Company ID`) REFERENCES `Company`(`Company ID`)
);

CREATE TABLE `File` (
  `File ID` PK,
  `Name` VARCHAR(100),
  `MIME Type` ENUM,
  `Content` BLOB,
  FOREIGN KEY (`File ID`) REFERENCES `Student`(`Profile Picture ID`)
);

