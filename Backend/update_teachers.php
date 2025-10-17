<?php

include "db.php";

if($_SERVER["REQUEST_METHOD"]=="POST"){

    $id=$_POST['id'];
    $name =$_POST['name'];
    $username =$_POST['username'];
    $password =$_POST['password'];
    $email =$_POST['email'];
    $phone =$_POST['phone'];
    $qualifications =$_POST['qualifications'];
    
    
    $sql = "UPDATE Teacher 
    SET Teacher_Name='$name', User_Name='$username', Passwords='$password',Email='$email', Phone_NO='$phone', Qualifications='$qualifications', Subject_ID='$subid'
    WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
        echo "Teacher update successfully!";
    } else {
        echo "Error: " . $conn->error;
    }

    $conn->close();

}
?>