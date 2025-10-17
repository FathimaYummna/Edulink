<?php
include 'db.php';

if($_SERVER["REQUEST_METHOD"]=="POST"){

    $sdate=$_POST['d1'];
    $edate=$_POST['d2'];
    $tid=$_POST['id'];
    $stuid=$_POST['stuid'];

    $sql="SELECT commid FROM comment WHERE teach_id='$tid'";
    $result1=$conn->query($sql);

    if($result1->num_rows>0){
        if(empty($stuid)){
            $sql="SELECT stu_id,comment,date FROM comment WHERE teach_id='$tid' 
            AND
            date BETWEEN '$sdate' AND '$edate'";
        }
        else{
            $sql="SELECT stu_id,comment,date FROM comment WHERE teach_id='$tid' 
            AND
            date BETWEEN '$sdate' AND '$edate'
            AND
            stu_id='$stuid'";
        }

        $result2=$conn->query($sql);

        echo "<table> ";
        echo"<tr>";
        echo "<th>Student ID</th>";
        echo"<th>Comment</th>";
        echo"<th>Date</th>";
        echo "</tr>";

        while($values=$result2->fetch_assoc()){
            echo "<tr>";
            echo "<td>" . htmlspecialchars($values['stu_id']) . "</td>";
            echo "<td>" . htmlspecialchars($values['comment']) . "</td>";
            echo "<td>" . htmlspecialchars($values['date']) . "</td>";
            echo "</tr>"; 
        }
        echo "</table>";

    }
    else{
        echo "no comments found";
    }
    $conn->close();
}
?>