<?php
include 'dbconnection.php'; 

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $teach_id       = $_POST['teach_id'];
    $full_name      = $_POST['full_name'];
    $user_name      = $_POST['user_name'];
    $password_raw   = $_POST['passwords'];
    $gender         = $_POST['gender'];
    $email          = $_POST['email'];
    $mobile         = $_POST['mobile'];
    $qualifications = $_POST['qualifications'];
    $hire_date      = $_POST['hire_date'];

   
    if (!preg_match('/^(?=.*[A-Z])(?=.*\d).{8,10}$/', $password_raw)) {
        die("Password must contain at least one uppercase letter, one number, and be 8-10 characters long.");
    }

   
    $hashedPassword = password_hash($password_raw, PASSWORD_BCRYPT);

   $check = $conn->prepare("SELECT email, user_name FROM teacher WHERE email = ? OR user_name = ?");
    $check->bind_param("ss", $email, $user_name);
    $check->execute();
    $check->store_result();

    if ($check->num_rows > 0) {
        $check->bind_result($existingEmail, $existingUsername);
        while ($check->fetch()) {
            if ($existingEmail === $email) {
                die("Error: Email already registered.");
            }
            if ($existingUsername === $user_name) {
                die("Error: Username already taken.");
            }
        }
    }
    $check->close();
    $sql = "INSERT INTO teacher (teach_id, full_name, user_name, password, gender, email, mobile, qualifications, hire_date)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        die("Prepare failed (insert): " . $conn->error);
    }

    $stmt->bind_param(
        "issssssss",
        $teach_id,
        $full_name,
        $user_name,
        $hashedPassword,
        $gender,
        $email,
        $mobile,
        $qualifications,
        $hire_date
    );

    if ($stmt->execute()) {
<<<<<<< HEAD
        echo "<div class='success'>Teacher registered successfully!</div>";
    } else {
        echo "<div class='error'>Insert error: " . $stmt->error."</div>";
=======
        echo "<div class='alert.success'>Teacher registered successfully!</div>";
    } else {
        echo "<div class='alert error'>Insert error: " . $stmt->error."</div>";
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
