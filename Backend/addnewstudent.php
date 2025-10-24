<?php
include 'dbconnection.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $initials = $_POST['initials'] ?? '';
    $f_name   = $_POST['fname'] ?? '';
    $l_name   = $_POST['lname'] ?? '';
    $dob      = $_POST['dob'] ?? '';
    $gender   = $_POST['gender'] ?? '';
    $address  = $_POST['address'] ?? '';

  
    $stmt = $conn->prepare("INSERT INTO student (initials, f_name, l_name, dob, gender, address) VALUES (?, ?, ?, ?, ?, ?)");
    if (!$stmt) {
        die("Prepare failed: " . $conn->error);
    }

   
    $stmt->bind_param("ssssss", $initials, $f_name, $l_name, $dob, $gender, $address);

    if ($stmt->execute()) {
        echo '<div class="alert success">Student added successfully!</div>';
    } else {
        echo '<div class="alert error">Error adding student: ' . htmlspecialchars($stmt->error) . '</div>';
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
.alert.success { background-color: #d4edda; color: #155724; }
.alert.error { background-color: #f8d7da; color: #721c24; }
</style>';
?>
