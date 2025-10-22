CREATE TABLE teacher_class (
    teach_id INT,
    class_name INT,
    year_name INT, 
    PRIMARY KEY (teach_id, class_name,year_name),
    FOREIGN KEY (teach_id) REFERENCES Teacher(teach_id),
    FOREIGN KEY (class_name) REFERENCES Class(class_name),
    FOREIGN KEY(year_name) REFERENCES Year (year_name)
);

