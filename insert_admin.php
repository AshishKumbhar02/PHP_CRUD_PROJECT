<?php
include('db.php');

$adminname = 'admin';  
$password = 'admin123';  
 
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

$query = "INSERT INTO admins (adminname, password) VALUES ('$adminname', '$hashed_password')";

if ($conn->query($query) === TRUE) {
    echo "Admin user has been inserted successfully!";
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>
