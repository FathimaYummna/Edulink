<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edulink</title>
    <link rel="stylesheet" href="../Frontend/style.css">
</head>
<body>

<body>
    <h3 style="margin-left: 20px; color: blue;">Edulink Student Monitoring System</h3>
    <center><form action="taskSelect.php" method="post">
        <h2>Select an option:</h2><br>
        <input type="radio" name="option" value="enter Marks">Enter Marks<br><br>
        <input type="radio" name="option" value="view marks">View or Update existing Marks<br><br>
        <input type="radio" name="option" value="comment section">Ecomment section<br><br>
        <input type="radio" name="option" value="Extra-curricular">Extra-curricular<br><br>
        <input type="radio" name="option" value="attendance">attendance<br><br>
        <input type="submit" name="submitbtn" value="submit" placeholder="submit">
        
        

    </form></center>
</body>
</html>


<?php

if (isset($_POST['submitbtn'])) {
    

    if (isset($_POST['option']) && $_POST['option'] == "enter Marks") {
        header("Location: enterDetailsToEnterMarks.php");
        exit();
    }
    elseif (isset($_POST['option']) && $_POST['option'] == "view marks") {
        header("Location: enterDetailsToViewMarks.php");
        exit();
    }
    else {
        echo "<center><p style='color:red;background-color:rgba(229, 244, 118, 0.94);width:300px;height:20px;border:1px solid red;border-radius:10px;'> Please select an option </p></center>";
    }
}
?>

