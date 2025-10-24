<?php
session_start(); 

include 'dbconnection.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']); 

   
    $stmt = $conn->prepare("SELECT  password FROM admin WHERE email = ? AND user_name = ?");
    if (!$stmt) die("Database error: " . $conn->error);

    $stmt->bind_param("ss", $email, $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result( $dbPassword);
        $stmt->fetch();

        if (password_verify($password, $dbPassword)) {
           
            $_SESSION['admin_username'] = $username;
            header("Location: admindashboard.php");
            exit();
        } else {
            echo "<div class='alert error'> Wrong password!</div>";
           exit;
        }
    } else {
        echo "<div class='alert error'> Email or username not found!</div>";
            exit;
    }

    $stmt->close();
    $conn->close();
}



echo '<style>
.alert {
    display: block;
    margin: 15px auto;
    padding: 12px 20px;
    border-radius: 8px;
    text-align: center;
    font-family: Arial, sans-serif;
    font-size: 15px;
    width: fit-content;
    box-shadow: 0 2px 5px rgba(0,0,0,0.2);
    opacity: 0;
    animation: fadeAlert 5s forwards;
}
.alert.success { background-color: #d4edda; color: #155724; }
.alert.error { background-color: #f8d7da; color: #721c24; }

@keyframes fadeAlert {
    0% { opacity: 0; transform: translateY(-10px); }
    10% { opacity: 1; transform: translateY(0); }
    90% { opacity: 1; transform: translateY(0); }
    100% { opacity: 0; transform: translateY(-10px); }
}
</style>';
?>
