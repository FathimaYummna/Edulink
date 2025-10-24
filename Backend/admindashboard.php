<?php
session_start();


if (!isset($_SESSION['admin_username'])) 
    {
    header("Location: ../Frontend/adminlogin.html");
    exit();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin Dashboard</title>
<<<<<<< HEAD
    <link rel="stylesheet" href="dashboard.css">
=======
    <link rel="stylesheet" href="../Frontend/parent-login.css">
>>>>>>> origin/Yummna
</head>
<body>
    <div class="navbar">
        <img src="../resources/icon.jpeg" alt="EduLink icon" class="icon">
<<<<<<< HEAD
        <h1>Gateway to effective student monitoring and management</span></h1>

        <nav class="nav-links">
            <a href="../Frontend/home.html">Home</a>
            <a href="about.html">About</a>
            <a href="support.html">Support</a>
=======
        <h1>gateway to effective student monitoring and management</span></h1>

        <nav class="nav-links">
            <a href="../Frontend/home.html">Home</a>
            <a href="../Frontend/about.html">About</a>
            <a href="../Frontend/account.html">Account</a>
            <a href="../Frontend/support.html">Support</a>
>>>>>>> origin/Yummna
            <a href="logout.php">Logout</a>
        </nav>

    </div>
<div class="dashboard">
        <h2>Welcome back, <?php echo htmlspecialchars($_SESSION['admin_username']); ?>!</h2>
        <button onclick="location.href='../Frontend/add_new_student.html'">Add New Student</button>
</div>
</body>
<footer>
    <p>&copy; 2024 EduLink. All rights reserved.</p>
</footer>
</html>