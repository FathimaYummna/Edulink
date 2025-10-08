CREATE TABLE Student_Class (
    Stu_ID INT,
    Class_ID INT,
    PRIMARY KEY (Stu_ID, Class_ID),
    FOREIGN KEY (Stu_ID) REFERENCES Student(Stu_ID),
    FOREIGN KEY (Class_ID) REFERENCES Class(Class_ID)
);
