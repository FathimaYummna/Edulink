<?php

include 'db.php';

if($_SERVER["REQUEST_METHOD"]=="POST"){

    $stuid=$_POST['stuid'];
    $tid=$_POST['teachid'];
    $comm=$_POST['comment'];
    
    $sql="SELECT class_name FROM student_class WHERE stu_id='$stuid'";
    $result1=$conn->query($sql);
    $scid=$result1->fetch_assoc()['class_name'];

    $sql="SELECT Class_name FROM teacher_class WHERE teach_id='$tid'";
    $result2=$conn->query($sql);
    $tcid=$result2->fetch_assoc()['class_name'];

    if($scid==$tcid){
        $sql="INSERT INTO comment(teach_id,stu_id,comment)
        VALUES('$stu_id','$teach_id',$comm')";

        if($conn->query($sql)==TRUE){
            echo "Add the comment successfully !";
        }
        else{
            echo " Error ". $conn->error;
        }
    }
    else{
        echo "You are not the respective class teacher ";
    }
    $conn->close();
}

?>