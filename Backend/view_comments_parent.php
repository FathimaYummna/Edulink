<?php

include 'db.php';

if($_SERVER["REQUEST_METHOD"]=="POST"){

    $pid=1;
    $stuid=$_POST['stuid'];

    $sql="SELECT parent_id FROM student WHERE stu_id='$stuid'";
    $result=$conn->query($sql);

    if($result->num_rows>0){
        $checkpid=$result->fetch_assoc()['parent_id'];

        if($checkpid==$pid){

            $sql="SELECT t.full_name,s.name,c.comment,c.date FROM comment c
            JOIN teacher t
            ON c.teach_id = t.teach_id
            JOIN subject s
            ON t.sub_id =s.sub_id
            WHERE c.stu_id='$stuid'";

            $result=$conn->query($sql);

            if($result->num_rows>0){

                echo"<h2 style=text-align:center;margin-top:5%;>Teacher's comments on your child's Performence</h2>";
                echo"<table style=  margin-top:8%;margin-left:30%; background-color:#e6f0fa;font-size:10px;>";
                echo"<tr>";
                echo"<th >Teacher's name</th>";
                echo"<th>Subject</th>";
                echo"<th>Teacher's Comment about your child's progress </th>";
                echo"<th>Date</th>";
                echo"</tr>";
        
                while($values=$result->fetch_assoc()){
                    echo"<tr>";
                    echo"<td style='padding:10px;>" . htmlspecialchars($values['full_name']) . "</td>";  
                    echo"<td>" . htmlspecialchars($values['name']) . "</td>";
                    echo"<td>" . htmlspecialchars($values['comment']) . "</td>";
                    echo"<td>" . htmlspecialchars($values['date']) . "</td>";
                    echo"</tr>";
                }
                echo"</table>";

            }
            else{
                echo "<script>
                alert('There is NO comments given to the: $stuid' );
                window.location.href='../Frontend/view_comments_parents.html';
                </script>";
                exit();
            }
        
        }
        else{
           echo "<script>
            alert('You are NOT allowed to view other students');
            window.location.href='../Frontend/view_comments_parents.html';
            </script>";
            exit();
        }
    }
    else{
        echo "<script>
            alert('You ENTERD INVALID Student Number');
            window.location.href='../Frontend/view_comments_parents.html';
            </script>";
            exit();
    }
    $conn->close();
}

?>