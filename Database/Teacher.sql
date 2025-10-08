CREATE TABLE Teacher(
Teacher_ID INT NOT NULL PRIMARY KEY,
Teacher_Name VARCHAR(50),
User_Name VARCHAR(20),
Passwords VARCHAR(10),
Gender ENUM('M','F'),
Email VARCHAR(150) UNIQUE,
Phone_NO VARCHAR(20),
Qualifications VARCHAR (200),
Subject_ID INT,
Hire_Date DATE, 
FOREIGN KEY(Subject_ID) REFERENCES Subjects(Subject_ID));

