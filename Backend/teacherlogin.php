<?php
session_start(); 

include 'dbconnection.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']); 

    
    $stmt = $conn->prepare("SELECT teach_id, password FROM teacher WHERE email = ? AND user_name = ?");
    if (!$stmt) die("Prepare failed: " . $conn->error);

    $stmt->bind_param("ss", $email, $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($teacherId, $dbPassword);
        $stmt->fetch();

        if (password_verify($password, $dbPassword)) {
           
            $_SESSION['teacher_id'] = $teacherId;
            $_SESSION['teacher_username'] = $username;
<<<<<<< HEAD
             header("Location:teacherdashboard.php");
            exit();
        } else {
            echo '<div class=" error">Wrong password!</div>';
        }
    } else {
        echo '<div class=" error">Email or username not found!</div>';
=======
             header("Location: ../Frontend/teacherdashboard.html");
            exit();
        } else {
            echo '<div class="alert error">Wrong password!</div>';
        }
    } else {
        echo '<div class="alert error">Email or username not found!</div>';
>>>>>>> origin/Yummna
    }

    $stmt->close();
    $conn->close();
}


echo '<style>
<<<<<<< HEAD
.sucess {
=======
.alert {
>>>>>>> origin/Yummna
    display: block;
    margin: 15px auto;
    padding: 10px 20px;
    border-radius: 8px;
    text-align: center;
    font-family: Arial, sans-serif;
<<<<<<< HEAD
    font-size: 20px;
    background-color: #d4edda;
    color: #1b7e32ff;
}
.error {
    display: block;
    margin: 15px auto;
    padding: 10px 20px;
    border-radius: 8px;
    text-align: center;
    font-family: Arial, sans-serif;
    font-size: 20px;
    background-color: #f8d7da;
    color: #ca1628ff;
=======
}
.alert.success {
    background-color: #d4edda;
    color: #155724;
}
.alert.error {
    background-color: #f8d7da;
    color: #721c24;
>>>>>>> origin/Yummna
}
</style>';
?>
