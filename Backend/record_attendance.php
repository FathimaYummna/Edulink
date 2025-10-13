<?php

include 'db_connect.php';

if(isset($_POST['status']))
    {
        $present=$_POST['status'];
        foreach($present as $stuId)
        {
            echo $stuId;
            $sql2="select if (curdate() in (select day_id from attendance where Stu_ID=$stuId),'Yes','No') as status";
            

            $result=$conn->query($sql2);

            $row=$result->fetch_assoc();

            if ($row['status']=='Yes')
            {
                echo 'Attendance marked already';
            }
            else 
            {
                $sql="insert into attendance values ($stuId,curdate(),'Present')";
                $run=$conn->query($sql);
            }
        }
    }


?>