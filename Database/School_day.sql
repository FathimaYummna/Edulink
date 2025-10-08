USE edulink;
CREATE TABLE School_day (
    day_id CHAR(4) PRIMARY KEY,
    term_id CHAR(4) NOT NULL,
    school_date DATE ,
    status BOOLEAN DEFAULT FALSE,
    FOREIGN KEY (term_id) REFERENCES School_term(term_id)
        ON UPDATE CASCADE
        ON DELETE CASCADE
);