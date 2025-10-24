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

                echo"<html>";
                echo"<head> <link rel='stylesheet' href='../Frontend/styles.css'></head>" ;  
                echo"<body class='tablebody'>";

                echo"<table class='table'>";
                echo"<tr>";
                echo"<th class='hd'>Teachers comments</th>";
                echo"</tr>";
                echo"<tr>";
                echo"<th class='th'>Teacher's name</th>";
                echo"<th class='th'>Subject</th>";
                echo"<th class='th'>Teacher's Comment </th>";
                echo"<th class='th' >Date</th>";
                echo"</tr>";
        
                while($values=$result->fetch_assoc()){
                    echo"<tr>";
                    echo"<td class='td'>" . htmlspecialchars($values['full_name']) . "</td>";  
                    echo"<td class='td'>" . htmlspecialchars($values['name']) . "</td>";
                    echo"<td class='td'>" . htmlspecialchars($values['comment']) . "</td>";            
                    echo"<td class='td'>" . htmlspecialchars($values['date']) . "</td>";
                    echo"</tr>";
                }
                echo"</table>";
                echo"</body>";
                echo"</html>";

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