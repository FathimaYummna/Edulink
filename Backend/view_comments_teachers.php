<?php

include 'db.php';

if($_SERVER["REQUEST_METHOD"]=="POST"){

    $tid=1;

    $sdate=$_POST['d1'];
    $edate=$_POST['d2'];
    $class= !empty($_POST['class']) ? $_POST['class'] : '';
    $stuid = !empty($_POST['stuid']) ? $_POST['stuid'] : '';

    $sql="SELECT comm_id FROM comment WHERE teach_id='$tid'";
    $result=$conn->query($sql);

    if($result->num_rows>0){

        $where="c.date BETWEEN '$sdate' AND '$edate' ";
        if(!empty($class)){
            $where .=" AND c.class_name ='$class'";
        }
        if(!empty($stuid)){
            $where .= " AND c.stu_id='$stuid'";
        }
       
        $sql="SELECT c.comm_id,s.stu_id,s.f_name,c.comment,c.date FROM comment c
        JOIN student s 
        ON c.stu_id = s.stu_id
        WHERE $where "; 
          
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
        echo"<script>
        alert('The comment :$commid is Not found');
        window.location.href='../Frontend/view_comments_teaches.html';
        </script>";
        exit();
    }
    $conn->close();
}

?>