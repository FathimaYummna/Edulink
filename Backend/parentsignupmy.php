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


    $stmt = $conn->prepare("SELECT stu_id FROM student WHERE stu_id = ?");
    $stmt->bind_param("i", $stid);
    $stmt->execute();
    $stmt->store_result();
    if ($stmt->num_rows === 0) {
        echo "<div class='alert.error'>Student ID does not exist. Add the student first.</div>";
        exit;
    }
    $stmt->close();

    $parentid = null;

    $stmt = $conn->prepare("SELECT parent_id, user_name, password FROM parent WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($dbParentID, $dbUserName, $dbPassword);
        $stmt->fetch();
        if (!password_verify($password_raw, $dbPassword)) {
            echo "<div class='alert.error'>Parent is already registered. Please enter correct password.</div>";
            exit;
        }
        $parentid = $dbParentID;
    }
    $stmt->close();

  
    if (!$parentid) {
        $stmt = $conn->prepare("SELECT parent_id FROM parent WHERE user_name = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->store_result();
        if ($stmt->num_rows > 0) {
            echo "<div class='alert.error'>Username already taken. Choose another username.</div>";
            exit;
        }
        $stmt->close();

        $stmt = $conn->prepare("SELECT password FROM parent");
        $stmt->execute();
        $result = $stmt->get_result();

        while ($row = $result->fetch_assoc()) {
            if (password_verify($password_raw, $row['password'])) {
                echo "<div class='error'>This password is already used. Please create a different password.</div>";
                exit;
            }
        }
        $stmt->close();

        if (!preg_match('/^(?=.*[A-Z])(?=.*\d).{12,}$/', $password_raw)) {
            echo "<div class='error'>Password must have at least one uppercase letter, one number, and be at least 12 characters long.</div>";
            exit;
        }

        $hashedPassword = password_hash($password_raw, PASSWORD_BCRYPT);
        $stmt = $conn->prepare("INSERT INTO parent (full_name, address, mobile, relationship, user_name, password, email) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssss", $fullname, $address, $mobile, $relationship, $username, $hashedPassword, $email);
        if (!$stmt->execute()) {
            echo "<div class='error'>Error registering parent: " . htmlspecialchars($stmt->error) . "</div>";
            exit;
        }
        $parentid = $conn->insert_id;
        $stmt->close();
    }
    $stmt = $conn->prepare("SELECT parent_id FROM student WHERE stu_id = ?");
    $stmt->bind_param("i", $stid);
    $stmt->execute();
    $stmt->bind_result($existingParentId);
    $stmt->fetch();
    $stmt->close();

    if ($existingParentId !== null) {
        echo "<div class='error'>Student is already linked to a parent.</div>";
        $conn->close();
        exit;
    }

    $stmt = $conn->prepare("UPDATE student SET parent_id = ? WHERE stu_id = ?");
    $stmt->bind_param("ii", $parentid, $stid);
    if ($stmt->execute()) {
        echo "<div class='success'>Parent registered successfully!</div>";
    } else {
        echo "<div class='error'>Error linking student: " . htmlspecialchars($stmt->error) . "</div>";
    }
    $stmt->close();
    $conn->close();
}

echo '<style>
.sucess {
    display: block;
    margin: 15px auto;
    padding: 10px 20px;
    border-radius: 8px;
    text-align: center;
    font-family: Arial, sans-serif;
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
}
</style>';
?>
