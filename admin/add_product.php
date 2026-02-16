<?php include '../partials/header.php'; ?>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow border-0">
                <div class="card-header bg-dark text-white fw-bold">Add New Product</div>
                <div class="card-body">
                    <form action="../actions/add_product_action.php" method="POST">
                        <div class="mb-3">
                            <label>Product Name</label>
                            <input type="text" name="p_name" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label>Description</label>
                            <textarea name="p_desc" class="form-control"></textarea>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label>Price</label>
                                <input type="number" name="p_price" step="0.01" class="form-control" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Stock Qty</label>
                                <input type="number" name="p_qty" class="form-control" required>
                            </div>
                        </div>
                        <button type="submit" name="submit_product" class="btn btn-primary w-100">SAVE PRODUCT</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>