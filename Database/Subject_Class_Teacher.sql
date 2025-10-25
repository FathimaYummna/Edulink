CREATE TABLE subject_class_teacher (
    teach_id INT,
    class_name INT,
    year_name INT,
    role VARCHAR(40), 
    PRIMARY KEY (teach_id, class_name,year_name),
    FOREIGN KEY (teach_id) REFERENCES teacher(teacher_id),
    FOREIGN KEY (class_name) REFERENCES class(class_id),
    FOREIGN KEY(year_name) REFERENCES year(year_id)
);

