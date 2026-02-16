<?php 
require '../config/db.php';
include '../partials/header.php';

// ٹوٹل سیلز نکالنا
$stats = mysqli_fetch_assoc(mysqli_query($conn, "SELECT SUM(total_amount) as total, COUNT(id) as counts FROM sales"));
?>

<div class="container">
    <h2 class="fw-bold mb-4">Business Intelligence Dashboard</h2>
    <div class="row mb-4">
        <div class="col-md-6">
            <div class="card-glass p-4 text-center border-start border-5 border-primary">
                <h6>TOTAL REVENUE</h6>
                <h1 class="display-4 fw-bold text-primary">$<?= number_format($stats['total'], 2) ?></h1>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card-glass p-4 text-center border-start border-5 border-success">
                <h6>TOTAL ORDERS</h6>
                <h1 class="display-4 fw-bold text-success"><?= $stats['counts'] ?></h1>
            </div>
        </div>
    </div>

    <div class="card-glass p-5 text-center">
        <p class="text-muted">
            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<div class="card-glass p-4 mt-4">
    <canvas id="salesChart"></canvas>
</div>

<script>
const ctx = document.getElementById('salesChart').getContext('2d');
new Chart(ctx, {
    type: 'line', // آپ اسے 'bar' بھی کر سکتے ہیں
    data: {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May'], // یہ ڈیٹا بیس سے بھی آ سکتا ہے
        datasets: [{
            label: 'Monthly Revenue ($)',
            data: [1200, 1900, 3000, 2500, <?= $stats['total'] ?>], 
            borderColor: '#0d6efd',
            fill: true,
            backgroundColor: 'rgba(13, 110, 253, 0.1)'
        }]
    }
});
</script>
        </p>
    </div>
</div>