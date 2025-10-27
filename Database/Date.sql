CREATE TABLE date(
	date DATE PRIMARY KEY,
<<<<<<< HEAD
    status ENUM('Yes','No')
    );  
=======
    status ENUM('Yes','No'),
	term_id INT,
	FOREIGN KEY (term_id) REFERENCES term(term_id)
    );  
>>>>>>> faaa6efa41b740ffacd0d5d83131b3ef7432e468
