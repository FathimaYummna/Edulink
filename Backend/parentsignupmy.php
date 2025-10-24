<?php
include 'dbconnection.php'; 

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $stid         = $_POST['stid'];
    $fullname     = $_POST['fullname'];
    $address      = $_POST['address'];
    $mobile       = $_POST['mobile'];
    $relationship = $_POST['relationship'];
    $username     = $_POST['username'];
    $email        = $_POST['email'];
    $password_raw = $_POST['password'];


    $checkStudent = $conn->prepare("SELECT Stu_ID FROM student WHERE Stu_ID = ?");
    if (!$checkStudent) {
        echo "<div class='alert error'>Database error (student check): " . htmlspecialchars($conn->error) . "</div>";
        exit;
    }

    $checkStudent->bind_param("i", $stid);
    $checkStudent->execute();
    $checkStudent->store_result(); 

    if ($checkStudent->num_rows === 0) {
        echo "<div class='alert error'> Error: Student with ID " . htmlspecialchars($stid) . " does not exist. Cannot add parent.</div>";
        $checkStudent->close();
        exit;
    }
    $checkStudent->close();

   
    if (!preg_match('/^(?=.*[A-Z])(?=.*\d).{12,}$/', $password_raw)) {
        echo "<div class='alert error'> Password must contain at least one uppercase letter, one number, and be at least 12 characters long.</div>";
        exit;
    }

    $hashedPassword = password_hash($password_raw, PASSWORD_BCRYPT);

  
    $check = $conn->prepare("SELECT Email, User_Name FROM parent WHERE Email = ? OR User_Name = ?");
    if (!$check) {
        echo "<div class='alert error'>Database error (email/username check): " . htmlspecialchars($conn->error) . "</div>";
        exit;
    }

    $check->bind_param("ss", $email, $username);
    $check->execute();
    $check->store_result();

    if ($check->num_rows > 0) {
        $check->bind_result($existingEmail, $existingUsername);
        while ($check->fetch()) {
            if ($existingEmail === $email) {
                echo "<div class='alert error'> Error: Email already registered.</div>";
                $check->close();
                $conn->close();
                exit;
            }
            if ($existingUsername === $username) {
                echo "<div class='alert error'> Error: Username already taken.</div>";
                $check->close();
                $conn->close();
                exit;
            }
        }
    }
    $check->close();

    
    $sql = "INSERT INTO parent (Stu_ID, Full_name, Address, Mobile, Relationship, User_Name, Password, Email)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        echo "<div class='alert error'>Database error (insert): " . htmlspecialchars($conn->error) . "</div>";
        exit;
    }

    $stmt->bind_param(
        "isssssss",
        $stid,
        $fullname,
        $address,
        $mobile,
        $relationship,
        $username,
        $hashedPassword,
        $email
    );

    if ($stmt->execute()) {
        echo "<div class='alert success'> Parent registered successfully!</div>";
    } else {
        echo "<div class='alert error'> Insert error: " . htmlspecialchars($stmt->error) . "</div>";
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
