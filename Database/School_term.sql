USE edulink;
CREATE TABLE School_term (
    term_id CHAR(4) PRIMARY KEY,
    year_id CHAR(4) NOT NULL,
    term_name VARCHAR(50) ,       
    start_date DATE ,
    end_date DATE ,
    FOREIGN KEY (year_id) REFERENCES Year(year_id)
        ON UPDATE CASCADE
        ON DELETE CASCADE
);

