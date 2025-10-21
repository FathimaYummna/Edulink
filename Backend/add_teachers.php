<?php

include "db.php";

if($_SERVER["REQUEST_METHOD"]=="POST"){

    $tid =$_POST['teachid'];
    $name =$_POST['fullname'];
    $username =$_POST['username'];
    $password =$_POST['password'];
    $gender =$_POST['gender'];
    $email =$_POST['email'];
    $mobile =$_POST['mobile'];
    $qualifications =$_POST['qualifications'];
    $subid =$_POST['subid'];
    $hiredate =$_POST['hiredate'];


   $sql="INSERT INTO teacher(teach_id,full_ame, user_name, passwords, gender, email,mobile, qualifications, sub_id, hire_date)
   VALUES('$tid','$name','$username', '$password', '$gender', '$email', '$mobile', '$qualifications', '$subid', '$hiredate')";

    if ($conn->query($sql) === TRUE) {
        
        header('Location: ../Frontend/add_teachers.html');
      
    }
     else{ 
        echo "Error: " . $conn->error;
    }

    $conn->close();
}

?>