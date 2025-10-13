<?php

include 'db_connect.php';

echo "<script src='teacher_attendance.js'></script>";

if ($_SERVER["REQUEST_METHOD"]=="POST")
{
    $class=$_POST["class"];

    $sql="select s.Stu_ID, concat(s.F_Name,' ',s.L_Name) fullName from student s, student_class c where class_ID = $class and s.Stu_ID=c.Stu_ID";

    $result=$conn->query($sql);

    if($result->num_rows>0)
    {
        echo 
        "<form action='record_attendance.php' method='post'><table id='stuAttTable' border='1'>
            <tr>
                <th>Student ID</th>
                <th>Student Full Name</th>
                <th>Status</th>
            </tr>
        </table>
        <button type='submit'>Submit</button></form>";
        while($row=$result->fetch_assoc())
        {
            $Id= $row["Stu_ID"];
            $name= $row["fullName"];
            echo "<script>addRow($Id,'$name')</script>";
        }
    }

    
  
}

?>