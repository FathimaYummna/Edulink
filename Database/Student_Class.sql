CREATE TABLE student_class (
    stu_id INT,
<<<<<<< HEAD
    class_name CHA(4),
    year_name INT
    PRIMARY KEY (stu_id, class_id),
    FOREIGN KEY (stu_id) REFERENCES student(stu_id),
    FOREIGN KEY (class_name) REFERENCES class(class_name)
    FOREIGN KEY (year_name) REFERENCES year(yea_name)

=======
    class_name VARCHAR(10),
    year_name CHAR(4),
    PRIMARY KEY (stu_id, class_name,year_name),
    FOREIGN KEY (stu_id) REFERENCES student(stu_id),
    FOREIGN KEY (class_name) REFERENCES class(class_name),
    FOREIGN KEY(year_name) REFERENCES year(year_name)
>>>>>>> faaa6efa41b740ffacd0d5d83131b3ef7432e468
);

