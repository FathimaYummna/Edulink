<?php
session_start();

include '../db.php';

$parentID=$_SESSION['parent_id'];

$sql="select s.stu_id from student s inner join parent p on s.parent_id=p.parent_id where p.parent_id=$parentID";

$result=$conn->query($sql);

$students=[];

while($row=$result->fetch_assoc())
{
    $students[]=$row['stu_id'];
}

echo json_encode($students);



?>