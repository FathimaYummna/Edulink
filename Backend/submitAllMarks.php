<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Submit All Marks</title>
    <link rel="stylesheet" href="../Frontend/style.css">
</head>
<body>
<?php
session_start();

$year = $_SESSION['Year'] ?? '';
$term_id = $_SESSION['Term'] ?? ''; // t1, t2, t3
$class = $_SESSION['Class'] ?? '';
$subject_id = $_SESSION['SubjectId'] ?? '';

$conn = new mysqli("localhost", "root", "", "edulink");
if ($conn->connect_error) die('Database Connection Error: ' . $conn->connect_error);

if (isset($_POST['submitAllMarks'])) {

    $marksArray = $_POST['marks'] ?? [];

    // Prepare statement
    $stmt = $conn->prepare("INSERT INTO marks (stu_id, sub_id, term_id, marks) VALUES (?, ?, ?, ?)");
    if (!$stmt) die("Prepare failed: " . $conn->error);

    $inserted = 0;
    $skipped = 0;

    foreach ($marksArray as $stu_id => $marks) {
        if ($marks === "" || !is_numeric($marks) || $marks < 0 || $marks > 100) {
            $skipped++;
            continue;
        }

        $marks = (int)$marks;
        $stmt->bind_param("sssi", $stu_id, $subject_id, $term_id, $marks);

        if ($stmt->execute()) {
            $inserted++;
        } else {
            echo "<p>Error inserting marks for Student ID $stu_id: " . $stmt->error . "</p>";
        }
    }

    $stmt->close();
    $conn->close();

    echo "<center><h2>Marks submission completed!</h2>";
    echo "<p>Inserted: $inserted</p>";
    echo "<p>Skipped empty or invalid inputs: $skipped</p></center>";

    echo '<script>
            setTimeout(function() {
                window.location.href = "taskSelect.php";
            }, 5000);
          </script>';
    exit();
}
?>




