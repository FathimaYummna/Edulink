CREATE TABLE student(
	stu_id INT AUTO_INCREMENT PRIMARY KEY,
    initials VARCHAR(10),
    f_name VARCHAR(20),
    l_name VARCHAR(20),
    dob DATE,
    gender ENUM('M','F'),
    address VARCHAR(100)
    );
    