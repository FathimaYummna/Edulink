<?php
include "db_connect.php";

if($_SERVER["REQUEST_METHOD"]=="POST")
{
    $initials=$_POST["initials"];
    $fName=$_POST["fName"];
    $lName=$_POST["lName"];
    $date=$_POST["date"];
    $gender=$_POST["gender"];
    $address=$_POST["address"];
}

$gen="";
if($gender=="Male")
{
    $gen="M";
}
else $gen="F";

$sql="INSERT INTO Student (Initials, F_Name, L_Name, DOB, Gender, Address)
        VALUES ('$initials','$fName','$lName','$date','$gen','$address')";

if ($conn->query($sql) === TRUE) {
    header('Location: ../Frontend/insert_student.html');
    exit();
     
} else{
    echo "Error: " . $sql . "<br>" . $conn->error;
}


?>