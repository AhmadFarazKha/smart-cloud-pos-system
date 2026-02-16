<?php
// Database connection inclusion
include '../config/db.php';

if (isset($_POST['submit_product'])) {
    // Data filtering
    $name = mysqli_real_escape_string($conn, $_POST['p_name']);
    $desc = mysqli_real_escape_string($conn, $_POST['p_desc']);
    $price = $_POST['p_price'];
    $qty = $_POST['p_qty'];

    // SQL based on your image_5ee9c1.jpg structure
    $sql = "INSERT INTO products (name, description, price, stock_qty) 
            VALUES ('$name', '$desc', '$price', '$qty')";

    if (mysqli_query($conn, $sql)) {
        // Success: Go to home
        header("Location: ../index.php");
        exit();
    } else {
        // SQL Error check
        die("Query Failed: " . mysqli_error($conn));
    }
} else {
    // Direct access prevention
    header("Location: ../admin/add_product.php");
}
?>