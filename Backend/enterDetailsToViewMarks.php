<?php
session_start();
$conn = new mysqli("localhost", "root", "", "edulink");
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

// Handle form submission
if (isset($_POST["submit"])) {
    $_SESSION['Year'] = $_POST['Year'];
    $_SESSION['Term'] = $_POST['Term']; 
    $_SESSION['Class'] = $_POST['Class'];
    $_SESSION['Subject'] = $_POST['Subject'];
    $_SESSION['SubjectId'] = $_POST['SubjectId'];

    // Redirect to view marks page
    header("Location: viewUpdateAllMark.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Edulink - View Marks</title>
<link rel="stylesheet" href="../Frontend/style.css">
</head>
<body>
<div style="text-align:center;">
    <form action="" method="post">
        <h1>Fill below details to view marks</h1>

        <input type="text" maxlength="4" pattern="[0-9]{4}" inputmode="numeric" name="Year" placeholder="Academic Year(EX: 2023)" style="background-color: white; border: 2px solid #ccc;" required><br><br>

        <!-- Term Selection -->
        <select name="Term" required>
            <option value="" selected disabled>-- Select the term --</option>
            <?php
            $termSql = "SELECT term_id, term_name FROM term";
            $termResult = $conn->query($termSql);
            if ($termResult->num_rows > 0) {
                while($term = $termResult->fetch_assoc()) {
                    echo "<option value='" . $term['term_id'] . "'>" . htmlspecialchars($term['term_name']) . "</option>";
                }
            } else {
                echo "<option value=''>No terms available</option>";
            }
            ?>
        </select><br><br>

        <!-- Class Selection -->
        <select name="Class" required>
            <option value="" selected disabled>-- Select the class --</option>
            <?php
            $sql = "SELECT class_name FROM class";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row["class_name"] . "'>" . $row["class_name"] . "</option>";
                }
            } else {
                echo "<option value=''>No classes available</option>";
            }
            ?>
        </select><br><br>

        <!-- Subject Selection -->
        <select name="Subject" required>
            <option value="" selected disabled>-- Select the subject --</option>
            <?php
            $sql = "SELECT sub_id, name FROM subject";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row["sub_id"] . "'>" . $row["sub_id"] . " - " . $row["name"] . "</option>";
                }
            } else {
                echo "<option value=''>No subjects available</option>";
            }
            $conn->close();
            ?>
        </select><br><br>

        <input type="submit" name="submit" value="Submit">
    </form>
</div>
</body>
</html>



