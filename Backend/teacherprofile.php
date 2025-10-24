<?php
session_start();
include 'dbconnection.php';

if (!isset($_SESSION['teacher_id'])) {
    header("Location: teacher_login.php");
    exit();
}
$teacherId = $_SESSION['teacher_id'];

$result = $conn->query("SELECT * FROM teacher WHERE teach_id = $teacherId");
$row = $result->fetch_assoc();
?>

<h1>Teacher Profile</h1>
<p><b>Full Name:</b> <?php echo $row['full_name']; ?></p>
<p><b>Email:</b> <?php echo $row['email']; ?></p>
<p><b>Mobile:</b> <?php echo $row['mobile']; ?></p>
<p><b>Gender:</b> <?php echo $row['gender']; ?></p>
<p><b>Qualifications:</b> <?php echo $row['qualifications']; ?></p>
<p><b>Hire Date:</b> <?php echo $row['hire_date']; ?></p>

<a href="teacher_dashboard.php">Back to Dashboard</a>
