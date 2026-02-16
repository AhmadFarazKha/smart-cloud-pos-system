<?php include 'partials/header.php'; ?>
<div class="d-flex justify-content-center align-items-center" style="min-height: 80vh;">
    <div class="card shadow p-4" style="width: 400px; border-radius: 15px;">
        <h3 class="text-center mb-4">Login</h3>
        <?php if(isset($_GET['msg'])) echo '<div class="alert alert-success small text-center">Account Created!</div>'; ?>
        <form action="actions/login_action.php" method="POST">
            <input type="email" name="email" class="form-control mb-3" placeholder="Email" required>
            <input type="password" name="password" class="form-control mb-3" placeholder="Password" required>
            <button type="submit" class="btn btn-primary w-100">Login</button>
        </form>
    </div>
</div>