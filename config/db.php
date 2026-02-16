<?php
// Database connection file
$conn = mysqli_connect("localhost", "root", "", "smart_pos");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>