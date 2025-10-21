CREATE TABLE student_class(
	stu_id INT,
    class_name VARCHAR(3),
    year INT,
    FOREIGN KEY (stu_id) REFERENCES student(stu_id),
    FOREIGN KEY(class_name) REFERENCES class(class_name),
    FOREIGN KEY(year) REFERENCES year(year)
    );