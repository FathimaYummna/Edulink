CREATE TABLE Parent(
Stu_ID INT,
Full_name VARCHAR(100),
Address VARCHAR(150),
Mobile VARCHAR(10),
Relationship VARCHAR(100),
User_name VARCHAR(150),
Password VARCHAR(12),
FOREIGN KEY(Stu_ID) REFERENCES Student(Stu_ID),
PRIMARY KEY (Stu_ID,Full_name));