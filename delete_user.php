<?php
session_start();
include('db.php');

if (!isset($_SESSION['admin_login'])) {
    header('Location: admin_login.php');
    exit();
}

if (isset($_GET['id'])) {
    $user_id = $_GET['id'];

    $query = "DELETE FROM users WHERE id = '$user_id'";

    if ($conn->query($query) === TRUE) {
        echo "<script>alert('User deleted successfully'); window.location.href = 'manage_users.php';</script>";
    } else {
        echo "<script>alert('Error deleting user: " . $conn->error . "'); window.location.href = 'manage_users.php';</script>";
    }
}
?>
