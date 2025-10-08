CREATE TABLE Attendance(
	Stu_ID INT NOT NULL,
    day_id DATE,
    A_Status ENUM("Present", "Absent"),
    FOREIGN KEY (Stu_ID) REFERENCES Student(Stu_ID)
    );