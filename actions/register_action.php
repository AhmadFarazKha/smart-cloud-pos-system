<?php
include '../config/db.php';

$name = $_POST['full_name'];
$f_name = $_POST['father_name'];
$cnic = $_POST['cnic'];
$email = $_POST['email'];
$pass = $_POST['password'];

$sql = "INSERT INTO users (full_name, father_name, cnic, email, password, role) 
        VALUES ('$name', '$f_name', '$cnic', '$email', '$pass', 'customer')";

if(mysqli_query($conn, $sql)) {
    header("Location: ../login.php?msg=account_created");
} else {
    echo "Error: " . mysqli_error($conn);
}
exit();