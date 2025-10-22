<?php

include 'db_connect.php';

$sql="SELECT COUNT(stu_id)/(SELECT SUM(status)FROM date WHERE status='Yes')*100 AS tdy FROM attendance WHERE stu_id=1 AND status='Present'";

$result=$conn->query($sql);

$row=$result->fetch_assoc();

echo $row['tdy'];

?>