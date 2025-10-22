<?php

include 'db_connect.php';

$sql = "SELECT a.status FROM attendance a, parent p WHERE a.stu_id=1 AND a.date=curdate() AND a.stu_id=p.stu_id;"; 
$result = $conn->query($sql);

$name='Absent';

if($row=$result->fetch_assoc())
    {
        
        if($row['status']==='Present')
        {
            $name='Present';
        }
    }

echo json_encode($name);

?>

