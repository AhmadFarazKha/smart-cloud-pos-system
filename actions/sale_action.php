<?php
require '../config/db.php';

if(isset($_POST['complete_sale'])) {
    $total = $_POST['total_bill'];
    $items = $_POST['items'];

    // 1. سیلز کے مین ٹیبل میں انٹری
    $query = "INSERT INTO sales (total_amount) VALUES ('$total')";
    if(mysqli_query($conn, $query)) {
        $sale_id = mysqli_insert_id($conn);

        // 2. ہر آئٹم کو الگ سے ریکارڈ کرنا اور اسٹاک کم کرنا
        foreach($items as $item) {
            $p_id = $item['id'];
            $qty = $item['qty'];
            $price = $item['price'];

            // آرڈر ڈیٹیل ٹیبل
            mysqli_query($conn, "INSERT INTO sale_items (sale_id, product_id, quantity, unit_price) 
                                 VALUES ('$sale_id', '$p_id', '$qty', '$price')");
            
            // اسٹاک اپڈیٹ (Automation)
            mysqli_query($conn, "UPDATE products SET stock_qty = stock_qty - $qty WHERE id = $p_id");
        }
        header("Location: ../index.php?status=success");
    }
}
?>