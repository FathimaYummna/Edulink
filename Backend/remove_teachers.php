<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $tid =$_POST['teachid'];

    $sql="SELECT teach_id FROM teacher WHERE teach_id='$tid'";
    $result=$conn->query($sql);
    
    if ($result->num_rows > 0) {
        $sql ="DELETE FROM teacher WHERE teach_id='$id'";
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