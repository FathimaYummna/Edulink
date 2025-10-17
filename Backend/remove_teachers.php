<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $id =$_POST['teacherid'];

    $sql="SELECT Teacher_ID FROM Teacher WHERE Teacher_ID='$tid'";
    $result=$conn->query($sql);
    
    if ($result->num_rows > 0) {
        $sql ="DELETE FROM Teacher WHERE Teacher_ID='$id'";
        if ($conn->query($sql) === TRUE) {
            echo "Teacher removed successfully!";
        } 
        else {
            echo "Error: " . $conn->error;
        }
        } 
    else {
        echo "No teacher found with Teacher ID " . $id;
        }
    $conn->close();
}

?>