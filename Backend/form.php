
<?php
 $conn = new mysqli('localhost','root','root');
 if($conn->connect_error){ die('Connection failed'); }
 echo 'Connected!';
 // Create database
 $sql = "CREATE DATABASE my_university_db";
 if ($conn->query($sql) === TRUE) { echo "Database created successfully";} 
else { echo "Error creating database: " . $conn->error; }
 $conn->close();
 ?>




