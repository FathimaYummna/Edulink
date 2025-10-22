CREATE TABLE Fee_Payment(
    stu_id INT NOT NULL,
    fee_id CHAR(4) NOT NULL,
    fee_status ENUM("Fully Paid", "Part Paid", "Unpaid"),
    amount DECIMAL(7,2),
    month varchar(15),
    FOREIGN KEY (Fee_ID) REFERENCES Fees(Fee_ID),
    FOREIGN KEY (Stu_ID) REFERENCES Student(Stu_ID)
    );
  