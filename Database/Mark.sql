CREATE TABLE Mark(
Mark_ID INT NOT NULL PRIMARY KEY,
Stu_ID INT,
Subject_ID INT,
Term_ID CHAR(4),
Marks_obtained INT CHECK (Marks_obtained >= 0 AND Marks_obtained <= 100),
FOREIGN KEY (Stu_ID) REFERENCES Student(Stu_ID),
FOREIGN KEY (Subject_ID) REFERENCES Subject(Subject_ID),
FOREIGN KEY (Term_ID) REFERENCES School_Term(Term_ID));
