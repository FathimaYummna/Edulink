<?php

include "db.php";

if($_SERVER["REQUEST_METHOD"]=="POST"){

    $id =$_POST['id'];
    $name =$_POST['name'];
    $username =$_POST['username'];
    $password =$_POST['password'];
    $gender =$_POST['gender'];
    $email =$_POST['email'];
    $phone =$_POST['phone'];
    $qualifications =$_POST['qualifications'];
    $subid =$_POST['subid'];
    $hiredate =$_POST['hiredate'];


   $sql="INSERT INTO Teacher(Teacher_ID, Teacher_Name, User_Name, Passwords, Gender, Email, Phone_NO, Qualifications, Subject_ID, Hire_Date)
   VALUES('$id','$name','$username', '$password', '$gender', '$email', '$phone', '$qualifications', '$subid', '$hiredate')";

 if ($conn->query($sql) === TRUE) {
    
       echo "Teacher added successfully!";
    }
     else{ 
        echo "Error: " . $conn->error;
    }

    $conn->close();
}

?>