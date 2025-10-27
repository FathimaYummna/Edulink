CREATE TABLE teacher(
teach_id INT NOT NULL PRIMARY KEY,
full_name VARCHAR(50),
user_name VARCHAR(20),
<<<<<<< HEAD
passwords VARCHAR(10),
=======
password VARCHAR(10),
>>>>>>> faaa6efa41b740ffacd0d5d83131b3ef7432e468
gender ENUM('M','F'),
email VARCHAR(150) UNIQUE,
mobile VARCHAR(20),
qualifications VARCHAR (200),
sub_id INT,
hire_date DATE, 
FOREIGN KEY(sub_id) REFERENCES subject(sub_id));

