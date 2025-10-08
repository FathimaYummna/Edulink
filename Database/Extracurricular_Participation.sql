CREATE TABLE Extracurricular_Participation (
    stu_id INT,
    activity_id INT,
    participation_date DATE,
    PRIMARY KEY (stu_id, activity_id),
    FOREIGN KEY (stu_id) REFERENCES Student(stu_id),
    FOREIGN KEY (activity_id) REFERENCES Extracurricular(activity_id)
);

