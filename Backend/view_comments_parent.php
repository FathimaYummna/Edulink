<?php

include 'db.php';

if($_SERVER["REQUEST_METHOD"]=="POST"){

    $stuid=$_POST['stuid'];
    $pid=$_POST['pid'];

    $sql="SELECT comm_id,comment,date FROM comment WHERE stu_id='$stuid'";

    $result1=$conn->query($sql);

    if($result1->num_rows>0){

        $sql="SELECT parent_id FROM student WHERE stu_id='$stuid'";
        $result2=$conn->query($sql);
        $cpid=$result2->fetch_assoc()['parent_id'];

        if($cpid==$pid){
            echo"<table>";
            echo"<tr>";
            echo"<th>Teacher's Comment about your child's progress </th>";
            echo"<th>Date</th>";
            echo"</tr>";
        
            while($values=$result1->fetch_assoc()){
                echo"<tr>";
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