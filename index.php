<?php 
include 'config/db.php';
include 'partials/header.php'; 
?>
<div class="container-fluid mt-4">
    <div class="row">
        <div class="col-md-8">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h3 class="fw-bold text-dark">Inventory Items</h3>
                <div class="input-group w-50 shadow-sm">
                    <span class="input-group-text bg-white border-end-0"><i class="fas fa-search text-muted"></i></span>
                    <input type="text" class="form-control border-start-0" placeholder="Search product...">
                </div>
            </div>
            
            <div class="row" id="productGrid">
                <?php
                $res = mysqli_query($conn, "SELECT * FROM products WHERE stock_qty > 0 ORDER BY id DESC");
                if(mysqli_num_rows($res) > 0){
                    while($row = mysqli_fetch_assoc($res)){
                ?>
                <div class="col-md-4 mb-4">
                    <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden">
                        <div class="card-body">
                            <h5 class="fw-bold mb-1"><?= $row['name'] ?></h5>
                            <p class="text-muted small mb-3"><?= $row['description'] ?></p>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="h5 mb-0 text-success fw-bold">$<?= number_format($row['price'], 2) ?></span>
                                <button class="btn btn-primary btn-sm rounded-pill px-3" 
                                        onclick="addToCart(<?= $row['id'] ?>, '<?= $row['name'] ?>', <?= $row['price'] ?>)">
                                    <i class="fas fa-plus me-1"></i> Add
                                </button>
                            </div>
                            <hr class="my-2 opacity-25">
                            <div class="d-flex justify-content-between small">
                                <span class="text-secondary">Available Stock:</span>
                                <span class="fw-bold <?= $row['stock_qty'] < 10 ? 'text-danger' : 'text-dark' ?>"><?= $row['stock_qty'] ?></span>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } } else { echo "<div class='col-12 text-center py-5'><p class='text-muted'>No stock available.</p></div>"; } ?>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-lg border-0 rounded-4 p-3 sticky-top" style="top: 20px;">
                <h4 class="fw-bold mb-3"><i class="fas fa-receipt me-2 text-primary"></i>Current Bill</h4>
                
                <div class="table-responsive" style="max-height: 300px;">
                    <table class="table table-sm align-middle" id="billTable">
                        <thead class="text-muted small">
                            <tr><th>Item</th><th>Qty</th><th>Subtotal</th><th></th></tr>
                        </thead>
                        <tbody>
                            </tbody>
                    </table>
                </div>

                <div class="mt-4 pt-3 border-top">
                    <div class="mb-3">
                        <label class="form-label small fw-bold text-muted">Customer WhatsApp Number</label>
                        <input type="text" id="cust_phone" class="form-control form-control-lg border-2" placeholder="e.g. 9230459979885">
                    </div>
                    
                    <div class="d-flex justify-content-between h4 fw-bold mb-3">
                        <span>Grand Total:</span>
                        <span id="grandTotal" class="text-primary">$0.00</span>
                    </div>
                    
                    <button class="btn btn-success btn-lg w-100 py-3 fw-bold rounded-3 shadow" onclick="completeSale()">
                        <i class="fab fa-whatsapp me-2"></i> COMPLETE & SEND
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
let cart = [];

function addToCart(id, name, price) {
    let item = cart.find(i => i.id === id);
    if (item) { item.qty++; } else { cart.push({ id, name, price, qty: 1 }); }
    updateUI();
}

function removeFromCart(id) {
    cart = cart.filter(i => i.id !== id);
    updateUI();
}

function updateUI() {
    let tbody = document.querySelector("#billTable tbody");
    let totalSpan = document.querySelector("#grandTotal");
    tbody.innerHTML = ""; let total = 0;
    
    cart.forEach(item => {
        let sub = item.price * item.qty; total += sub;
        tbody.innerHTML += `
            <tr>
                <td><span class="fw-bold small d-block text-truncate" style="max-width: 100px;">${item.name}</span></td>
                <td><span class="badge bg-light text-dark border">${item.qty}</span></td>
                <td class="small fw-bold">$${sub.toFixed(2)}</td>
                <td class="text-end"><i onclick="removeFromCart(${item.id})" class="fas fa-times-circle text-danger cursor-pointer"></i></td>
            </tr>`;
    });
    totalSpan.innerText = `$${total.toFixed(2)}`;
}

function completeSale() {
    let phone = document.getElementById('cust_phone').value;
    let total = document.getElementById('grandTotal').innerText;
    
    if (cart.length === 0) { alert("Cart is empty!"); return; }
    if (phone === "") { alert("Please enter Customer WhatsApp number (with Country Code)!"); return; }

    // Prepare WhatsApp Message
    let message = "*--- AFK SMART POS RECEIPT ---*%0A";
    message += "Date: " + new Date().toLocaleDateString() + "%0A%0A";
    cart.forEach(item => {
        message += "• " + item.name + " (" + item.qty + "x) = $" + (item.price * item.qty).toFixed(2) + "%0A";
    });
    message += "%0A*Grand Total: " + total + "*%0A";
    message += "Thank you for your business!%0A";

    // Open WhatsApp
    let whatsappURL = "https://wa.me/" + phone + "?text=" + message;
    window.open(whatsappURL, '_blank').focus();

    // Clear cart after sale
    cart = [];
    updateUI();
    document.getElementById('cust_phone').value = "";
    alert("Sale Recorded & WhatsApp Sent!");
}
</script>