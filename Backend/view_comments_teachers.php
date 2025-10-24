<?php

include 'db.php';

if($_SERVER["REQUEST_METHOD"]=="POST"){

    $sql="SELECT class_name FROM subject_teacher WHERE teach_id='$tid'";
    $result=$conn->query($sql);

    while($value=$result->fetch_assoc()){
        echo "<option value= '" .$value['class_name']. "' >"  .$value['class_name'] .  "</option>";
    }

    $class=$_POST['classname'];
    $sdate=$_POST['d1'];
    $edate=$_POST['d2'];
    $stuid=$_POST['stuid'];

    $sql="SELECT comm_id FROM comment WHERE teach_id='$tid'";
    $result=$conn->query($sql);

    if($result->num_rows>0){
        if(empty($stuid) and empty($class)){
            $sql="SELECT c.comm_id,c.stu_id,s.f_name,c.comment,c.date FROM comment c
            INNER JOIN student s 
            ON c.stu_id = s.stu_id
            WHERE c.teach_id='$tid' 
            AND
            date BETWEEN '$sdate' AND '$edate'";
        }
        elseif(empty($stuid)){
            $sql="SELECT c.comm_id,c.stu_id,s.f_name,c.comment,c.date FROM comment c
            JOIN student s 
            ON c.stu_id = s.stu_id
            JOIN subject_teacher o
            ON c.teach_id=o.teach_id
            WHERE c.teach_id='$tid' 
            AND
            date BETWEEN '$sdate' AND '$edate'
            AND
            o.class_name='$class'";
        }
        else{
            $sql="SELECT c.comm_id,c.stu_id,s.f_name,c.comment,c.date FROM comment c
            JOIN student s 
            ON c.stu_id = s.stu_id
            JOIN subject_teacher o
            ON c.teach_id=o.teach_id
            WHERE c.teach_id='$tid' 
            AND
            date BETWEEN '$sdate' AND '$edate'
            AND
            o.class_name='$class'
            AND
            c.stu_id='$stuid'";
        }

        $result=$conn->query($sql);

        echo"<table> ";
        echo"<tr>";
        echo"<th>Comment ID</th>";
        echo"<th>Student ID</th>";
        echo"<th>Student name</th>";
        echo"<th>Comment</th>";
        echo"<th>Date</th>";
        echo"</tr>";

        while($value=$result->fetch_assoc()){
            echo"<tr>";
            echo"<td>" . htmlspecialchars($value['comm_id']) . "</td>";
            echo"<td>" . htmlspecialchars($value['stu_id']) . "</td>";
            echo"<td>" . htmlspecialchars($value['f_name']) . "</td>";
            echo"<td>" . htmlspecialchars($value['comment']) . "</td>";
            echo"<td>" . htmlspecialchars($value['date']) . "</td>";
            echo"</tr>"; 
        }
        echo "</table>";

    }
    else{
        echo "no comments found";
    }
    $conn->close();
}

?>