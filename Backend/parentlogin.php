<?php
session_start(); 

include 'dbconnection.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']); 

    
    $stmt = $conn->prepare("SELECT stu_id, password FROM parent WHERE email = ? AND user_name = ?");
    if (!$stmt) die("Prepare failed: " . $conn->error);

    $stmt->bind_param("ss", $email, $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($studentId, $dbPassword);
        $stmt->fetch();

        if (password_verify($password, $dbPassword)) {
           
            $_SESSION['student_id'] = $studentId;
            $_SESSION['parent_username'] = $username;
            header("Location: ../Frontend/parentdashboard.html");
            exit();

        } else {
            echo '<div class="alert error">Wrong password!</div>';
        }
    } else {
        echo '<div class="alert error">Email or username not found!</div>';
    }

    $stmt->close();
    $conn->close();
}


echo '<style>
.alert {
    display: block;
    margin: 15px auto;
    padding: 10px 20px;
    border-radius: 8px;
    text-align: center;
    font-family: Arial, sans-serif;
}
.alert.success {
    background-color: #d4edda;
    color: #155724;
}
.alert.error {
    background-color: #f8d7da;
    color: #721c24;
}
</style>';
?>



