<?php
include 'db_connect.php';



$sql = "SELECT Stu_ID, F_Name, DOB FROM student"; 
$result = $conn->query($sql);

