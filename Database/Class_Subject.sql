CREATE TABLE Class_Subject(
Record_ID INT NOT NULL PRIMARY KEY ,
Class_ID INT,
Subject_ID INT,
Teacher_ID INT,
Year_ID INT,
FOREIGN KEY (Class_ID) REFERENCES Class(Class_ID),
FOREIGN KEY (Subject_ID) REFERENCES Subject(Subject_ID),
FOREIGN KEY (Teacher_ID) REFERENCES Teacher(Teacher_ID),
FOREIGN KEY (Year_ID) REFERENCES Year(Year_ID));