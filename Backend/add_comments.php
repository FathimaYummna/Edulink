<?php

include 'db.php';

if($_SERVER["REQUEST_METHOD"]=="POST"){
         
    $sql="SELECT class_name FROM subject_teacher WHERE teach_id='$tid'";
    $result=$conn->query($sql);

    while($value=$result->fetch_assoc()){
        echo " <option value ='" . $value['class_name'] . "' >" .$value['class_name'] . "</option>";
    }
   
    $class=$_POST['classname'];

    $sql="SELECT f_name FROM student WHERE class_name='$class'";
    $result=$conn->quay($sql);

    while($value=$result->fetch_assoc()){
        echo "<option value='" . $value['f_name'] . "'>" . $value['f_name'] . "</option>";
    }

    $name=$_POST['studentname'];

    $sql="SELECT stu_id FROM stuent WHERE f_name='$name'";
    $result=$conn->quary($sql);
    $value= $result->fetch_assoc()['stu_id'];

    $stuid=$_POST['stuid'];
    $comm=$_POST['comment'];

    if($value==$stuid){
        $sql="INSERT INTO comment(teach_id,stu_id,comment,)
         VALUES($tid,$stuid,$comm)";
    }
    else{
        echo "student mismatch";
    }
    
    $conn->close();
}

?>