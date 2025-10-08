CREATE TABLE Extracurricular (
    activity_id INT PRIMARY KEY AUTO_INCREMENT,
    activity_name VARCHAR(50) NOT NULL,
    description TEXT,
    start_date DATE,
    end_date DATE
);