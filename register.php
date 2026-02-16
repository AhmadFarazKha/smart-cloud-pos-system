<div class="card-glass p-5">
    <h2 class="text-center mb-4">Create Your Account</h2>
    <form action="actions/register_action.php" method="POST">
        <div class="row">
            <div class="col-md-6 mb-3">
                <input type="text" name="full_name" class="form-control" placeholder="Full Name" required>
            </div>
            <div class="col-md-6 mb-3">
                <input type="text" name="father_name" class="form-control" placeholder="Father Name">
            </div>
            <div class="col-md-6 mb-3">
                <input type="text" name="cnic" class="form-control" placeholder="CNIC (e.g. 38201-XXXXXXX-X)" required>
            </div>
            <div class="col-md-6 mb-3">
                <input type="email" name="email" class="form-control" placeholder="Email Address" required>
            </div>
            <div class="col-md-12 mb-3">
                <input type="password" name="password" class="form-control" placeholder="Password" required>
            </div>
        </div>
        <button type="submit" class="btn btn-primary w-100">Sign Up</button>
    </form>
</div>