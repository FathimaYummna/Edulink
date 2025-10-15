<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id =$_POST['id'];

    $sql = "DELETE FROM Teacher WHERE Teacher_ID='$id'";

    if ($conn->query($sql) === TRUE) {
        echo "Teacher removed successfully!";
    } else {
        echo "Error: " . $conn->error;
    }

    $conn->close();
}
?>