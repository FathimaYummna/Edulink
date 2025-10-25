CREATE TABLE subject_class_teacher (
    teach_id INT,
    class_name INT,
    year_name INT,
    role VARCHAR(40), 
    PRIMARY KEY (teach_id, class_name,year_name),
    FOREIGN KEY (teach_id) REFERENCES Teacher(teacher_id),
    FOREIGN KEY (class_name) REFERENCES Class(class_id),
    FOREIGN KEY(year_name) REFERENCES Year (year_id)
);

