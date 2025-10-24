CREATE TABLE student_extracurricular (
    stu_id INT,
    activity_id INT,
    duration varchar(50),
    PRIMARY KEY (stu_id, activity_id),
    FOREIGN KEY (stu_id) REFERENCES student(stu_id),
    FOREIGN KEY (activity_id) REFERENCES extracurricular(activity_id)
);
