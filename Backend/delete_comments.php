<?php

include 'db.php';

if($_SERVER["REQUEST_METHOD"]=="POST"){

    $tid=$_POST['tid'];
    $commid=$_POST['commentid'];

    $sql="SELECT teach_id FROM teacher_comment WHERE comm_id='$commid'";
    $result=$conn->query($sql);

    if($result->num_rows>0){

        $check=$result->fetch_assoc()['teach_id'];

        if($check==$tid){
            $sql="DELETE FROM comment WHERE comm_id='$commid'";
            if($conn->query($sql)==True){
                echo "Delete successfully ";
            }
            else{
              echo "Error ". $conn->error;
            }
        }
        else{
            echo "You cant delete the comment";
        }
    }
    else{
        echo "The comment not found";0
    }
    $conn->close();
}

?>