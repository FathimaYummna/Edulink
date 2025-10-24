<?php
session_start();      // Start the session
session_unset();      // Remove all session variables
session_destroy();    // Destroy the session

// Redirect user to login or homepage
<<<<<<< HEAD
header("Location:.html"); // or login page like teacher_login.php
=======
header("Location: index.html"); // or login page like teacher_login.php
>>>>>>> origin/Yummna
exit();
?>
