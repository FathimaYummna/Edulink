<?php

include 'db_connect.php';

if(isset($_POST['status']))
    {
        $present=$_POST['status'];
        foreach($present as $stuId)
        {
            echo $stuId;

            $sql="insert into attendance values ($stuId,curdate(),'Present')";

            $result=$conn->query($sql);

        }
    }


?>