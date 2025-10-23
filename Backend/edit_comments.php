<?php

include 'db.php';

if($_SERVER["REQUEST_METHOD"]=="POST"){

    $commid=$_POST['commid'];
    $new_value=$_POST['newcomm'];

    $sql="SELECT teach_id FROM comment WHERE comm_id ='$commid'";
    $result=$conn->query($sql);

    if($result->num_rows>0){
        $check=$result->fetch_assoc()['teach_id'];

        if($check==$tid){

            $sql="UPDATE comment 
            SET comment='$new_value'
            WHERE comm_id='$commid'";

            if($conn->query($sql)==True){
                echo "success";
            }
            else{
                echo"error".$conn->error;
            }
        }
        else{
            echo"you cant update";
        }
    }
    else{
        echo "no comment found";
    }
    $conn->close();
}
?>