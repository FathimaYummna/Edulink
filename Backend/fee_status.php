<?php
session_start();

include 'db.php';
header('Content-Type: application/json');

if($_SERVER["REQUEST_METHOD"]=="POST")
{
    $month=$_POST['month'];
}

$studentId=$_SESSION['stuID'];

$sql="SELECT fee_status,month FROM fee_payment WHERE stu_id=$studentId AND month='$month'";

$result=$conn->query($sql);

$row=$result->fetch_assoc();

echo json_encode($row);

?>