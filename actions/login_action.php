<?php
session_start();
include '../config/db.php';

$email = $_POST['email'];
$password = $_POST['password'];

$query = "SELECT * FROM users WHERE email='$email' AND password='$password'";
$result = mysqli_query($conn, $query);

if($user = mysqli_fetch_assoc($result)) {
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['role'] = $user['role'];
    $_SESSION['user_name'] = $user['full_name'];
    header("Location: ../index.php");
} else {
    header("Location: ../login.php?error=invalid");
}
exit();