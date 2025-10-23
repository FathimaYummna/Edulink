<?php

include 'db.php';

if($_SERVER["REQUEST_METHOD"]=="POST"){

    $stuid=$_POST['stuid'];

    $sql="SELECT t.full_name,c.comment,c.date FROM comment c
    INNER JOIN teacher t
    ON c.teach_id = t.teach_id
    WHERE c.stu_id='$stuid'";

    $result=$conn->query($sql);

    if($result->num_rows>0){

        $sql="SELECT parent_id FROM student WHERE stu_id='$stuid'";
        $result=$conn->query($sql);
        $checkpid=$result->fetch_assoc()['parent_id'];

        if($checkpid==$pid){
            echo"<table>";
            echo"<tr>";
            echo"<th>Teacher</th>";
            echo"<th>Teacher's Comment about your child's progress </th>";
            echo"<th>Date</th>";
            echo"</tr>";
        
            while($values=$result1->fetch_assoc()){
                echo"<tr>";
                echo"<td>" . htmlspecialchars($values['full_name']) . "</td>";
                echo"<td>" . htmlspecialchars($values['comment']) . "</td>";
                echo"<td>" . htmlspecialchars($values['date']) . "</td>";
                echo"</tr>";
            }
            echo"</table>";
        }
        else{
            echo"you cant view ";
        }

    }
    else{
        echo "no comments ";
    }
    $conn->close();
}

?>