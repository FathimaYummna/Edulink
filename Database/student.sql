CREATE TABLE Student(
	Stu_ID INT NOT NULL PRIMARY KEY,
    Initials VARCHAR(8),
    F_Name VARCHAR(20),
    L_Name VARCHAR(20),
    DOB DATE,
    Gender ENUM ('M','F'),
    Address VARCHAR(50)
    );
    