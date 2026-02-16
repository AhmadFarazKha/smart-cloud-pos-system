<?php
if (session_status() === PHP_SESSION_NONE) { session_start(); }
// Base URL settings
$base_url = "http://localhost/smart-cloud-pos-system/";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AFK Smart POS | Cloud Terminal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body { background: #f0f2f5; font-family: 'Inter', sans-serif; display: flex; min-height: 100vh; }
        .sidebar { width: 280px; background: #ffffff; border-right: 1px solid #e0e0e0; position: fixed; height: 100vh; padding-top: 20px; z-index: 1000; }
        .sidebar .nav-link { color: #555; padding: 14px 25px; font-weight: 500; border-radius: 0 50px 50px 0; margin-right: 15px; margin-bottom: 5px; }
        .sidebar .nav-link:hover { background: #f8f9fa; color: #0d6efd; }
        .sidebar .nav-link.active { background: #e7f1ff; color: #0d6efd; border-left: 5px solid #0d6efd; }
        .main-content { margin-left: 280px; width: 100%; padding: 30px; }
        .cursor-pointer { cursor: pointer; }
        .card { transition: transform 0.2s; }
        .card:hover { transform: translateY(-3px); }
    </style>
</head>
<body>
    <div class="sidebar shadow-sm">
        <div class="px-4 mb-5">
            <h3 class="text-primary fw-bold mb-0">AFK POS</h3>
            <span class="badge bg-light text-primary border px-2">v2.0 Stable</span>
        </div>
        <nav class="nav flex-column">
            <a href="<?= $base_url ?>index.php" class="nav-link active"><i class="fas fa-desktop me-3"></i> POS Terminal</a>
            <a href="<?= $base_url ?>admin/add_product.php" class="nav-link"><i class="fas fa-plus-circle me-3"></i> Add Product</a>
            <a href="<?= $base_url ?>admin/manage_inventory.php" class="nav-link"><i class="fas fa-boxes me-3"></i> Inventory</a>
            <hr class="mx-3 my-4 text-muted">
            <a href="<?= $base_url ?>actions/logout.php" class="nav-link text-danger"><i class="fas fa-power-off me-3"></i> Sign Out</a>
        </nav>
    </div>
    <div class="main-content">