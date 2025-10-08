CREATE TABLE Fee_Payment(
    Stu_ID INT NOT NULL,
    Fee_ID CHAR(4) NOT NULL,
    Fee_Status ENUM("Fully Paid", "Part Paid", "Unpaid"),
    Amount DECIMAL(7,2),
    FOREIGN KEY (Fee_ID) REFERENCES Fees(Fee_ID),
    FOREIGN KEY (Stu_ID) REFERENCES Student(Stu_ID)
    );
  