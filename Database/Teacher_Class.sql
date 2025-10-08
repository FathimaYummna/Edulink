CREATE TABLE Teacher_Class (
    Teacher_ID INT,
    Class_ID INT,
    Year_ID INT, 
    PRIMARY KEY (Teacher_ID, Class_ID,Year_ID),
    FOREIGN KEY (Teacher_ID) REFERENCES Teacher(Teacher_ID),
    FOREIGN KEY (Class_ID) REFERENCES Class(Class_ID),
    FOREIGN KEY(Year_ID) REFERENCES Year (Year_ID)
);

