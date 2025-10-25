CREATE TABLE term (
    term_id CHAR(4) PRIMARY KEY,
    year_name CHAR(4) NOT NULL,
    term_name ENUM('First', 'Second', 'Third'),       
    start_date DATE ,
    end_date DATE ,
    FOREIGN KEY (year_name) REFERENCES year(year_name)
        ON UPDATE CASCADE
        ON DELETE CASCADE
);
