CREATE TABLE student_class (
    stu_id INT,
    class_name CHA(4),
    year_name INT
    PRIMARY KEY (stu_id, class_id),
    FOREIGN KEY (stu_id) REFERENCES student(stu_id),
    FOREIGN KEY (class_name) REFERENCES class(class_name)
    FOREIGN KEY (year_name) REFERENCES year(yea_name)

);
