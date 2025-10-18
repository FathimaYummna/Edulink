CREATE TABLE student_class (
    stu_id INT,
    class_name INT,
    year_name INT,
    PRIMARY KEY (stu_id, class_id,year_name),
    FOREIGN KEY (stu_id) REFERENCES student(stu_id),
    FOREIGN KEY (class_name) REFERENCES class(class_name),
    FOREIGN KEY(year_name) REFERENCES year(year_name)
);
