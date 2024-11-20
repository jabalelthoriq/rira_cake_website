<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Produk - Rira Cake</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>

body, html {
  margin: 0;
  padding: 0;
  font-family: 'Arial', sans-serif;
  background-color: #f5e6d3;
}  
        .product-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
    gap: 20px;
    padding: 20px;
    
}


.navbar {
    background-color: #4b2e2e;
    padding: 10px 20px;
    display: flex;
    justify-content: space-between;
    align-items: center;
}
.logo{
    height: auto;
    width: 50%;

}

.navbar .logo span {
    color: #FFFFFF;
    font-size: 20px;
    font-family: 'Brush Script MT', cursive;
}
.navbar .nav-links {
    display: flex;
    gap: 20px;
}
.navbar .nav-links a {
    color: #FFFFFF;
    text-decoration: none;
    font-size: 16px;
}
.navbar .icons {
    display: flex;
    gap: 15px;
}
.navbar .icons i {
    color: #FFFFFF;
    font-size: 20px;
}

/* menu */

        
        .menu-card {
            width: 250px;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            cursor: pointer;
            transition: all 0.3s ease;
            
        }

        .menu-card:hover {
          background-color: #4b2e2e;
          transform: translateY(-20px) translateX(10px); 
          box-shadow: 0 8px 16px rgba(0,0,0,0.5);
          color: #F8EDE3;
          
        }

      

        .menu-image {
            width: 100%;
            height: 200px;
            background: #ddd;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .menu-info {
            padding: 15px;
        }

        .menu-title {
            font-size: 18px;
            margin-bottom: 8px;
        }

        .menu-price {
            color: #e44d26;
            font-weight: bold;
        }

        /* Popup  */
        .popup-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0);
            display: none;
            justify-content: center;
            align-items: center;
            z-index: 1000;
           
        }

        .popup-content {
            background: white;
            padding: 20px;
            border-radius: 8px;
            width: 90%;
            max-width: 500px;
            position: relative;
            transform: scale(0.7);
            opacity: 0;
            transition: all 0.3s cubic-bezier(0.68, -0.55, 0.265, 1.55);
            
        }

        .popup-overlay.show {
            display: flex;
            background: rgba(0,0,0,0.5);
        }

        .popup-overlay.show .popup-content {
            transform: scale(1);
            opacity: 1;
        }

        .close {

          position: relative;
            background:none ;
            border: none;
            font-size: 24px;
            cursor: pointer;
            color: #666;
        }

  
        .popup-image {
            width: 100%;
            height: 250px;
            background: #ddd;
            margin-bottom: 15px;
            display: flex;
            border-radius: 4px;
            overflow: hidden;
    

        }

        .popup-title {
            font-size: 24px;
            margin-bottom: 10px;
        }

        .popup-description {
            color: #666;
            margin-bottom: 15px;
            line-height: 1.5;
        }

        .popup-price {
            font-size: 20px;
            color: #e44d26;
            font-weight: bold;
            margin-bottom: 20px;
        }

        
        .action-buttons {
            display: flex;
            gap: 10px;
            opacity: 0;
            transform: translateY(20px);
            animation: slideUp 0.5s ease forwards;
            animation-delay: 0.3s;
        }

        @keyframes slideUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .btn {
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-weight: bold;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .btn::after {
            content: '';
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: -100%;
            background: rgba(255,255,255,0.2);
            transition: all 0.3s ease;
        }

        .btn:hover::after {
            left: 100%;
        }

        .btn-order {
            background: #6c3b16;
            color: white;
            flex: 2;
        }

        .btn-order:hover {
            background: #6c3b16;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(228, 77, 38, 0.3);
        }

        .btn-wishlist {
            background: #f0f0f0;
            color: #333;
            flex: 1;
        }

        .btn-wishlist:hover {
            background: #e0e0e0;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        
        .popup-content > * {
            opacity: 0;
            transform: translateY(20px);
            animation: contentFadeIn 0.5s ease forwards;
        }

        .popup-image { animation-delay: 0.1s; }
        .popup-title { animation-delay: 0.2s; }
        .popup-description { animation-delay: 0.3s; }
        .popup-price { animation-delay: 0.4s; }

        @keyframes contentFadeIn {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        .footer {
      background-color: #4b2e2e;
      color: white;
      padding: 40px 20px;
      text-align: center;
    }

    .footer-content {
      display: flex;
      justify-content: space-between;
      align-items: flex-start;
      flex-wrap: wrap;
      gap: 20px;
    }

    .footer-section {
      flex: 1;
      min-width: 200px;
    }

    .footer-section h3 {
      margin-bottom: 10px;
    }

    .footer-section p,
    .footer-section a {
      color: white;
      text-decoration: none;
      margin-bottom: 5px;
    }

    .footer-section a:hover {
      text-decoration: underline;
    }

    .contact-us {
      display: flex;
      gap: 20px;
      justify-content: center;
      margin-top: 20px;
    }

    .contact-icon {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      width: 50px;
      height: 50px;
      border-radius: 50%;
      font-size: 24px;
      color: #fff;
      cursor: pointer;
      transition: background-color 0.3s ease;
      text-decoration: none;
    }

    .contact-icon:hover {
      transform: scale(1.1);
      box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.3);
    }

    .whatsapp-link {
      background-color: #25D366;
    }

    .whatsapp-link:hover {
      background-color: #128C7E;
    }

    .instagram-link {
      background-color: palevioletred;
    }

    .instagram-link:hover {
      background-color: #c82a5b;
    }

    .email-link {
      background-color: #007BFF;
    }

    .email-link:hover {
      background-color: #0056b3;
    }

    .footer-bottom {
      margin-top: 20px;
      border-top: 1px solid #fff;
      padding-top: 10px;
    }
    .notification {
    position: fixed;
    bottom: 20px;
    right: 20px;
    background-color: #4CAF50;
    color: white;
    padding: 15px 25px;
    border-radius: 5px;
    animation: slideIn 0.5s ease-out;
    z-index: 1001;
    display: none;
}

@keyframes slideIn {
    from {
        transform: translateX(100%);
        opacity: 0;
    }
    to {
        transform: translateX(0);
        opacity: 1;
    }
}

.cart-popup-overlay {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.7);
    z-index: 1000;
}

.cart-popup-content {
    position: fixed;
    top: 0;
    right: 0;
    width: 400px;
    height: 100%;
    background-color: white;
    box-shadow: -2px 0 5px rgba(0, 0, 0, 0.1);
    padding: 20px;
    overflow-y: auto;
    animation: slideIn 0.3s ease-out;
}

.cart-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding-bottom: 15px;
    border-bottom: 1px solid #eee;
    margin-bottom: 20px;
}

.cart-header h2 {
    margin: 0;
    color: #333;
}

.cart-items {
    margin-bottom: 20px;
}

.cart-item {
    display: flex;
    padding: 15px 0;
    border-bottom: 1px solid #eee;
}

.cart-item-image {
    width: 80px;
    height: 80px;
    object-fit: cover;
    border-radius: 4px;
    margin-right: 15px;
}

.cart-item-details {
    flex: 1;
}

.cart-item-title {
    font-weight: bold;
    margin-bottom: 5px;
    color: #333;
}

.cart-item-price {
    color: #e44d26;
    margin-bottom: 5px;
}

.cart-item-quantity {
    display: flex;
    align-items: center;
    gap: 10px;
    margin-top: 10px;
}

.quantity-btn {
    background-color: #f0f0f0;
    border: none;
    width: 25px;
    height: 25px;
    border-radius: 50%;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: bold;
}

.quantity-btn:hover {
    background-color: #e0e0e0;
}

.cart-item-remove {
    color: #ff4444;
    background: none;
    border: none;
    cursor: pointer;
    font-size: 0.9em;
    padding: 5px;
    margin-top: 5px;
}

.cart-footer {
    position: sticky;
    bottom: 0;
    background-color: white;
    padding-top: 15px;
    border-top: 1px solid #eee;
}

.cart-total {
    display: flex;
    justify-content: space-between;
    font-size: 1.2em;
    font-weight: bold;
    margin-bottom: 15px;
}

.btn-checkout {
    width: 100%;
    padding: 12px;
    background-color: #4CAF50;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 1.1em;
}

.btn-checkout:hover {
    background-color: #45a049;
}

.empty-cart {
    text-align: center;
    padding: 20px;
    color: #666;
}

@keyframes slideIn {
    from {
        transform: translateX(100%);
    }
    to {
        transform: translateX(0);
    }
}

@media (max-width: 480px) {
    .cart-popup-content {
        width: 100%;
    }
}

.navbar .icons {
            display: flex;
            gap: 15px;
            align-items: center;
        }

        .navbar .icons a,
        .navbar .icons .cart-icon {
            color: #FFFFFF;
            font-size: 20px;
            text-decoration: none;
            cursor: pointer;
            position: relative;
        }

        .cart-count-badge {
            position: absolute;
            top: -8px;
            right: -8px;
            background-color: #e44d26;
            color: white;
            border-radius: 50%;
            padding: 2px 6px;
            font-size: 12px;
            min-width: 18px;
            text-align: center;
        }

        .payment-popup-overlay {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.7);
    z-index: 2000;
}

.payment-popup-content {
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 90%;
    max-width: 600px;
    max-height: 90vh;
    background-color: white;
    border-radius: 8px;
    padding: 20px;
    overflow-y: auto;
}

.payment-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding-bottom: 15px;
    border-bottom: 1px solid #eee;
    margin-bottom: 20px;
}

.payment-header h2 {
    margin: 0;
    color: #333;
}

.payment-body {
    padding: 20px 0;
}

.order-summary {
    background-color: #f9f9f9;
    padding: 15px;
    border-radius: 5px;
    margin-bottom: 20px;
}

.order-summary h3 {
    margin-top: 0;
    margin-bottom: 15px;
    color: #333;
}

.total-amount {
    display: flex;
    justify-content: space-between;
    font-size: 1.2em;
    font-weight: bold;
    margin-top: 15px;
    padding-top: 15px;
    border-top: 1px solid #ddd;
}

.form-group {
    margin-bottom: 20px;
}

.form-group label {
    display: block;
    margin-bottom: 5px;
    color: #333;
    font-weight: 500;
}

.form-group input,
.form-group textarea {
    width: 100%;
    padding: 8px;
    border: 1px solid #ddd;
    border-radius: 4px;
    font-size: 16px;
}

.form-group textarea {
    height: 100px;
    resize: vertical;
}

.payment-methods {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
    gap: 10px;
    margin-top: 10px;
}

.payment-method {
    display: flex;
    align-items: center;
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 4px;
    cursor: pointer;
    transition: all 0.3s ease;
}

.payment-method:hover {
    border-color: #4b2e2e;
    background-color: #f9f9f9;
}

.payment-method input {
    margin-right: 10px;
}

.btn-process-payment {
    width: 100%;
    padding: 12px;
    background-color: #4b2e2e;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 1.1em;
    transition: background-color 0.3s ease;
}

.btn-process-payment:hover {
    background-color: #6c3b16;
}

.payment-item {
    display: flex;
    justify-content: space-between;
    margin-bottom: 10px;
    padding-bottom: 10px;
    border-bottom: 1px solid #eee;
}

.payment-item:last-child {
    border-bottom: none;
}

.payment-item-details {
    flex: 1;
}

.payment-item-name {
    font-weight: 500;
}

.payment-item-quantity {
    color: #666;
    font-size: 0.9em;
}

.payment-item-price {
    font-weight: 500;
    color: #4b2e2e;
}

@media (max-width: 480px) {
    .payment-popup-content {
        width: 95%;
        padding: 15px;
    }
    
    .payment-methods {
        grid-template-columns: 1fr;
    }
}

.payment-method {
    position: relative;
    width: 100%;
    border: 1px solid #ddd;
    border-radius: 4px;
    background: white;
    cursor: pointer;
    transition: all 0.3s ease;
}

.payment-method:hover {
    border-color: #4b2e2e;
    background-color: #f9f9f9;
}

.bank-dropdown {
    position: relative;
    width: 100%;
}

.bank-dropdown-header {
    padding: 12px 15px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    background: white;
    border-radius: 4px;
}

.bank-dropdown-header i {
    transition: transform 0.3s ease;
}

.bank-dropdown-content {
    position: absolute;
    top: 100%;
    left: 0;
    width: 100%;
    background: white;
    border: 1px solid #ddd;
    border-radius: 0 0 4px 4px;
    box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    display: none;
    z-index: 1000;
}

.bank-option {
    padding: 12px 15px;
    display: flex;
    align-items: center;
    gap: 10px;
    transition: background-color 0.3s ease;
}

.bank-option:hover {
    background-color: #f5f5f5;
}

.bank-logo {
    width: 30px;
    height: 30px;
    object-fit: contain;
}

.bank-info {
    flex: 1;
}

.bank-name {
    font-weight: 500;
    margin-bottom: 2px;
}

.bank-number {
    font-size: 0.9em;
    color: #666;
}

.selected-bank {
    display: flex;
    align-items: center;
    gap: 10px;
}

.selected-bank-logo {
    width: 24px;
    height: 24px;
    object-fit: contain;
}

/* Show dropdown content when parent is clicked */
.bank-dropdown.active .bank-dropdown-content {
    display: block;
}

.bank-dropdown.active .bank-dropdown-header i {
    transform: rotate(180deg);
}
        
    </style>
</head>
<body>
<div class="navbar">
        <div>
            <a href="index.php?c=Auth&a=homepage">
                <img class="logo" alt="Rica Cake Logo" src="view/aset/gambar/logoweb.png" />
            </a>
        </div>
        <div class="nav-links">
            <a href="index.php?c=Auth&a=aboutuspage">About Us</a>
            <a href="index.php?c=Auth&a=productpage">Order</a>
            <a href="index.php?c=Auth&a=contactpage">Contact</a>
        </div>
        <div class="icons">
           <a href="index.php?c=Auth&a=index" class="fas fa-user">
      </a>
      <div class="cart-icon" onclick="showCartPopup()">
            <i class="fas fa-shopping-cart"></i>
            <span class="cart-count-badge" id="cart-count">0</span>
        </div>

</div>
    </div>


    <div class="cart-popup-overlay" id="cart-popup">
    <div class="cart-popup-content">
        <div class="cart-header">
            <h2>Shopping Cart</h2>
            <button class="close" onclick="hideCartPopup()">&times;</button>
        </div>
        <div class="cart-items" id="cart-items-container">
        </div>
        <div class="cart-footer">
            <div class="cart-total">
                <span>Total:</span>
                <span id="cart-total-price">Rp 0</span>
            </div>
            <button class="btn btn-checkout" onclick="checkout()">Checkout</button>
        </div>
    </div>
</div>


<div class="payment-popup-overlay" id="payment-popup">
    <div class="payment-popup-content">
        <div class="payment-header">
            <h2>Payment Details</h2>
            <button class="close" onclick="hidePaymentPopup()">&times;</button>
        </div>
        <div class="payment-body">
            <div class="order-summary">
                <h3>Order Details</h3>
                <div id="payment-items-list">
                    
                </div>
                <div class="total-amount">
                    <span>Total Amount:</span>
                    <span id="harga" name="harga">Rp 0</span>
                </div>
            </div>
            
            <form id="payment-form" method="POST" action="index.php?c=Auth&a=tambahpesanan" enctype="multipart/form-data">
                <!-- Hidden inputs -->
                <input type="hidden" id="cart_data" name="cart_data">
                <input type="hidden" id="total_harga_input" name="total_harga">
                <input type="hidden" id="kode_bank_input" name="kode_bank">
                <input type="hidden" name="tanggal_pesanan" value="<?php echo date('Y-m-d'); ?>">
                
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" id="nama" name="nama" required>
                </div>
                
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required>
                </div>

                <!-- Tambahkan dropdown bank -->
                <div class="form-group">
                    <label>Payment Method</label>
                    <div class="payment-method">
                        <div class="bank-dropdown" id="bankDropdown">
                            <div class="bank-dropdown-header" onclick="toggleDropdown()">
                                <div class="selected-bank" id="selectedBank">
                                    <span>Select Bank Transfer</span>
                                </div>
                                <i class="fas fa-chevron-down"></i>
                            </div>
                            <div class="bank-dropdown-content">
                                <!-- Bank options -->
                                <div class="bank-option" onclick="selectBank('BCA', '8735109371', 'https://png.pngtree.com/png-clipart/20221224/original/pngtree-bca-bank-logo-png-image_8801637.png')">
                                    <img src="https://png.pngtree.com/png-clipart/20221224/original/pngtree-bca-bank-logo-png-image_8801637.png" alt="BCA" class="bank-logo">
                                    <div class="bank-info">
                                        <div class="bank-name">BCA</div>
                                        <div class="bank-number">8735109371</div>
                                    </div>
                                </div>
                                <div class="bank-option" onclick="selectBank('BRI', '0123456789', 'https://www.freelogovectors.net/wp-content/uploads/2023/02/bri-logo-freelogovectors.net_.png')">
                                    <img src="https://www.freelogovectors.net/wp-content/uploads/2023/02/bri-logo-freelogovectors.net_.png" alt="BRI" class="bank-logo">
                                    <div class="bank-info">
                                        <div class="bank-name">BRI</div>
                                        <div class="bank-number">0123456789</div>
                                    </div>
                                </div>
                                <div class="bank-option" onclick="selectBank('BNI', '1234567890', 'https://i.pinimg.com/originals/36/38/43/36384348ef9d7bfff66da6da9e975d56.png')">
                                    <img src="https://i.pinimg.com/originals/36/38/43/36384348ef9d7bfff66da6da9e975d56.png" alt="BNI" class="bank-logo">
                                    <div class="bank-info">
                                        <div class="bank-name">BNI</div>
                                        <div class="bank-number">1234567890</div>
                                    </div>
                                </div>
                                <div class="bank-option" onclick="selectBank('Mandiri', '1234567890', 'https://cdn.freebiesupply.com/logos/thumbs/2x/bank-mandiri-logo.png')">
                                    <img src="https://cdn.freebiesupply.com/logos/thumbs/2x/bank-mandiri-logo.png" alt="Mandiri" class="bank-logo">
                                    <div class="bank-info">
                                        <div class="bank-name">Mandiri</div>
                                        <div class="bank-number">1234567890</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- File upload -->
                <div class="form-group">
                    <label for="image">Bukti Pembayaran</label>
                    <input type="file" id="image" name="image" accept="image/*" required>
                </div>

                <button type="submit" class="btn-process-payment">Proses Pembayaran</button>
            </form>
        </div>
    </div>
</div>




<div class="container mt-5">
    <div class="d-flex justify-content-between mb-3">
        <h2>Data Produk</h2>
    </div>

    <?php if(isset($totalDataProduct)): ?>
                <div class="mb-4 p-4 bg-gray-100 rounded">Total Data: <?php echo $totalDataProduct; ?> data
                    <?php if(!empty($search)): ?>
                        | Hasil pencarian "<?php echo htmlspecialchars($search); ?>": <?php echo count($dataProduct); ?> data
                    <?php endif; ?>
                </div>
                <?php endif; ?>

    <!-- Form Pencarian -->
    <div class="row mb-3">
        <div class="col-md-6">
            <form action="index.php" method="GET" class="d-flex">
                <input type="hidden" name="c" value="Auth">
                <input type="hidden" name="a" value="productpage">
                <input type="text" name="search" class="form-control me-2" 
                       placeholder="Cari berdasarkan nama..." 
                       value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>">
                <button type="submit" class="btn btn-primary">Cari</button>
                <?php if(isset($_GET['search']) && !empty($_GET['search'])): ?>
                    <a href="index.php?c=Auth&a=productpage" class="btn btn-secondary ms-2">Reset</a>
                <?php endif; ?>
            </form>
        </div>
        
    </div>
    
    <?php if(isset($dataProduct) && !empty($dataProduct)): ?>
    <div class="product-grid">
        <?php foreach($dataProduct as $product): ?>
            <div class="menu-card" onclick="showPopup('<?php echo $product['id']; ?>')">
                <img src="uploads/<?php echo htmlspecialchars($product['image']); ?>" class="menu-image" alt="<?php echo htmlspecialchars($product['nama']); ?>">
                <div class="menu-info">
                    <h3 class="menu-title"><?php echo htmlspecialchars($product['nama']); ?></h3>
                    <p class="menu-price">Rp <?php echo number_format($product['harga'], 0, ',', '.'); ?></p>
                    <p class="menu-title">Jumlah stok: <?php echo number_format($product['stok']); ?></p>
                </div>
            </div>

            <!-- Popup untuk setiap produk -->
            <div class="popup-overlay" id="popup-<?php echo $product['id']; ?>">
                <div class="popup-content">
                    <button class="close" onclick="hidePopup('<?php echo $product['id']; ?>')">&times;</button>
                    <div class="popup-image">
                        <img src="uploads/<?php echo htmlspecialchars($product['image']); ?>" alt="<?php echo htmlspecialchars($product['nama']); ?>">
                    </div>
                    <h2 class="popup-title"><?php echo htmlspecialchars($product['nama']); ?></h2>
                    <p class="popup-description"><?php echo htmlspecialchars($product['deskripsi']); ?></p>
                    <p class="popup-price">Rp <?php echo number_format($product['harga'], 0, ',', '.'); ?></p>
                    <div class="action-buttons">
                        <button class="btn btn-order" onclick="addToCart(<?php 
                            echo htmlspecialchars(json_encode([
                                'id' => $product['id'],
                                'nama' => $product['nama'],
                                'deskripsi' => $product['deskripsi'],
                                'harga' => $product['harga'],
                                'image' => $product['image']
                            ])); 
                        ?>)">Order Now</button>
                        <button class="btn btn-wishlist">♡</button>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>

        
    </div>
    <!-- Pagination -->
    <?php if($totalPages > 1): ?>
            <nav aria-label="Page navigation">
                <ul class="pagination justify-content-center">
                    <!-- Tombol Previous -->
                    <li class="page-item <?php echo ($page <= 1) ? 'disabled' : ''; ?>">
                        <a class="page-link" 
                           href="index.php?c=Auth&a=productpage&page=<?php echo ($page-1); ?><?php echo !empty($search) ? '&search='.$search : ''; ?>">
                            Previous
                        </a>
                    </li>
                    
                    <?php for($i = 1; $i <= $totalPages; $i++): ?>
                        <li class="page-item <?php echo ($page == $i) ? 'active' : ''; ?>">
                            <a class="page-link" 
                               href="index.php?c=Auth&a=productpage&page=<?php echo $i; ?><?php echo !empty($search) ? '&search='.$search : ''; ?>">
                                <?php echo $i; ?>
                            </a>
                        </li>
                    <?php endfor; ?>

                    <!-- Tombol Next -->
                    <li class="page-item <?php echo ($page >= $totalPages) ? 'disabled' : ''; ?>">
                        <a class="page-link" 
                           href="index.php?c=Auth&a=productpage&page=<?php echo ($page+1); ?><?php echo !empty($search) ? '&search='.$search : ''; ?>">
                            Next
                        </a>
                    </li>
                </ul>
            </nav>
            <?php endif; ?>
    <?php else: ?>
        <div class="alert alert-warning text-center">
            <?php echo !empty($search) ? 'Tidak ada hasil pencarian untuk "'.htmlspecialchars($search).'"' : 'Tidak ada data'; ?>
        </div>
    <?php endif; ?>
</div>



<footer class="footer">
        <div class="footer-content">
            <div class="footer-section">
                <h3>Opening Hours</h3>
                <p>Monday - Friday: 8AM - 8PM</p>
                <p>Saturday - Sunday: 9AM - 6PM</p>
            </div>
            <div class="footer-section">
                <h3>Quick Links</h3>
                <p><a href="index.php?c=Auth&a=aboutuspage">About Us</a></p>
                <p><a href="index.php?c=Auth&a=productpage">Order Now</a></p>
                <p><a href="index.php?c=Auth&a=contactpage">Contact</a></p>
                <p><a href="index.php?c=Auth&a=homepage">Home</a></p>
            </div>
            <div class="footer-section">
                <h3>Contact Us</h3>
                <div class="contact-us">
                    <a class="contact-icon whatsapp-link" href="https://wa.me/+6282145483984" target="_blank">
                        <i class="fab fa-whatsapp"></i>
                    </a>
                    <a class="contact-icon instagram-link"
                        href="https://www.instagram.com/annisaakrs_/profilecard/?igsh=MWhla3h0YTB0ZTNkYw=="
                        target="_blank">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a class="contact-icon email-link" href="mailto:annisaikrimatus@gmail.com">
                        <i class="fas fa-envelope"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2024 Rira Cake. All rights reserved.</p>
        </div>
    </footer>

    

<script >
     function showPopup(menuId) {
      document.getElementById(`popup-${menuId}`).classList.add('show');
    }

    function hidePopup(menuId) {
      document.getElementById(`popup-${menuId}`).classList.remove('show');
    }

    // Close popup when clicking outside
    window.onclick = function (event) {
      if (event.target.classList.contains('popup-overlay')) {
        event.target.classList.remove('show');
      }
    }
    // Update fungsi yang sudah ada
    document.addEventListener('DOMContentLoaded', function() {
    // Initialize cart if it doesn't exist
    if (!localStorage.getItem('cart')) {
        localStorage.setItem('cart', JSON.stringify([]));
    }
    updateCartBadge();
});

// Update the cart badge count
function updateCartBadge() {
    const cart = JSON.parse(localStorage.getItem('cart')) || [];
    const totalItems = cart.reduce((total, item) => total + (item.quantity || 1), 0);
    document.getElementById('cart-count').textContent = totalItems;
}

// Fungsi untuk menampilkan cart popup
function showCartPopup() {
    document.getElementById('cart-popup').style.display = 'block';
    document.body.style.overflow = 'hidden';
    renderCartItems();
}

// Fungsi untuk menyembunyikan cart popup
function hideCartPopup() {
    document.getElementById('cart-popup').style.display = 'none';
    document.body.style.overflow = 'auto';
}

// Fungsi untuk render items dalam cart
function renderCartItems() {
    const cartContainer = document.getElementById('cart-items-container');
    const cart = JSON.parse(localStorage.getItem('cart')) || [];
    
    if (cart.length === 0) {
        cartContainer.innerHTML = '<div class="empty-cart">Your cart is empty</div>';
        updateCartTotal();
        return;
    }
    
    cartContainer.innerHTML = cart.map(item => `
        <div class="cart-item">
            <img src="${item.image}" alt="${item.nama}" class="cart-item-image">
            <div class="cart-item-details">
                <div class="cart-item-title">${item.nama}</div>
                <div class="cart-item-price">Rp ${formatNumber(item.harga)}</div>
                <div class="cart-item-quantity">
                    <button class="quantity-btn" onclick="updateQuantity(${item.id}, ${item.quantity - 1})">-</button>
                    <span>${item.quantity}</span>
                    <button class="quantity-btn" onclick="updateQuantity(${item.id}, ${item.quantity + 1})">+</button>
                </div>
                <button class="cart-item-remove" onclick="removeFromCart(${item.id})">
                    Remove
                </button>
            </div>
        </div>
    `).join('');
    
    updateCartTotal();
}

function showNotification(message) {
    const notification = document.getElementById('notification');
    notification.textContent = message;
    notification.style.display = 'block';

    setTimeout(() => {
        notification.style.display = 'none';
    }, 3000);
}

// Fungsi untuk update quantity
function updateQuantity(productId, newQuantity) {
    if (newQuantity < 1) {
        removeFromCart(productId);
        return;
    }
    
    let cart = JSON.parse(localStorage.getItem('cart'));
    const productIndex = cart.findIndex(item => item.id === productId);
    
    if (productIndex > -1) {
        cart[productIndex].quantity = newQuantity;
        localStorage.setItem('cart', JSON.stringify(cart));
        renderCartItems();
        updateCartBadge();
    }
}

// Fungsi untuk menghapus item dari cart
function removeFromCart(productId) {
    let cart = JSON.parse(localStorage.getItem('cart'));
    cart = cart.filter(item => item.id !== productId);
    localStorage.setItem('cart', JSON.stringify(cart));
    renderCartItems();
    updateCartBadge();
            
    showNotification('Item removed from cart!'); // Panggil fungsi notifikasi
}

// Fungsi untuk update total cart
function updateCartTotal() {
    const cart = JSON.parse(localStorage.getItem('cart')) || [];
    const total = cart.reduce((sum, item) => sum + (item.harga * item.quantity), 0);
    document.getElementById('cart-total-price').textContent = `Rp ${formatNumber(total)}`;
}

// Fungsi untuk format angka
function formatNumber(number) {
    return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
}

// Fungsi checkout
function checkout() {
    const cart = JSON.parse(localStorage.getItem('cart')) || [];
    if (cart.length === 0) {
        showNotification('Your cart is empty!');
        return;
    }
    hideCartPopup(); 
    showPaymentPopup(); 
}



function addToCart(product) {
    let cart = JSON.parse(localStorage.getItem('cart'));
    const existingProductIndex = cart.findIndex(item => item.id === product.id);
            
    if (existingProductIndex > -1) {
    cart[existingProductIndex].quantity = (cart[existingProductIndex].quantity || 1) + 1;
    } else {
    product.quantity = 1;
    cart.push(product);
    }
            
    localStorage.setItem('cart', JSON.stringify(cart));
    updateCartBadge();
    showNotification('Product added to cart!'); // Panggil fungsi notifikasi
    hidePopup(product.id);
}

function showPaymentPopup() {
    document.getElementById('payment-popup').style.display = 'block';
    document.body.style.overflow = 'hidden';
    renderPaymentItems();
}

function hidePaymentPopup() {
    document.getElementById('payment-popup').style.display = 'none';
    document.body.style.overflow = 'auto';
}

function renderPaymentItems() {
    const cart = JSON.parse(localStorage.getItem('cart')) || [];
    const paymentItemsList = document.getElementById('payment-items-list');
    
    // Hitung total
    const total = cart.reduce((sum, item) => {
        return sum + (item.harga * item.quantity);
    }, 0);
    
    // Render items
    paymentItemsList.innerHTML = cart.map(item => `
        <div class="payment-item">
            <div class="payment-item-details">
                <div class="payment-item-name">${item.nama}</div>
                <div class="payment-item-quantity">Quantity: ${item.quantity}</div>
            </div>
            <div class="payment-item-price">Rp ${formatNumber(item.harga * item.quantity)}</div>
        </div>
    `).join('');
    
    // Update total dan hidden inputs
    document.getElementById('harga').textContent = `Rp ${formatNumber(total)}`;
    document.getElementById('total_harga_input').value = total;
    
    // Simpan cart data
    document.getElementById('cart_data').value = JSON.stringify(cart);
}

function toggleDropdown() {
    const dropdown = document.getElementById('bankDropdown');
    dropdown.classList.toggle('active');
}

function selectBank(bankName, accountNumber, logoSrc) {
    const selectedBank = document.getElementById('selectedBank');
    selectedBank.innerHTML = `
        <img src="${logoSrc}" alt="${bankName}" class="selected-bank-logo">
        <div class="bank-info">
            <div class="bank-name">${bankName}</div>
            <div class="bank-number">${accountNumber}</div>
        </div>
    `;
    
    document.getElementById('kode_bank_input').value = accountNumber;
    
    document.getElementById('bankDropdown').classList.remove('active');
}


document.addEventListener('click', function(event) {
    const dropdown = document.getElementById('bankDropdown');
    const isClickInside = dropdown.contains(event.target);
    
    if (!isClickInside && dropdown.classList.contains('active')) {
        dropdown.classList.remove('active');
    }
});

// Update form submission
document.getElementById('payment-form').addEventListener('submit', async function(e) {
    e.preventDefault();
    
    const submitButton = this.querySelector('button[type="submit"]');
    if (submitButton.disabled) {
        return;
    }
    
    try {
        // Get cart data
        const cart = JSON.parse(localStorage.getItem('cart')) || [];
        if (cart.length === 0) {
            alert('Keranjang belanja kosong');
            return;
        }
        
        // Set cart data to hidden input
        document.getElementById('cart_data').value = JSON.stringify(cart);
        
        // Validate other fields
        const nama = document.getElementById('nama').value;
        const email = document.getElementById('email').value;
        const kodeBank = document.getElementById('kode_bank_input').value;
        const totalHarga = document.getElementById('total_harga_input').value;
        const image = document.getElementById('image').files[0];
        
        if (!nama || !email || !kodeBank || !image || !totalHarga) {
            alert('Mohon lengkapi semua field yang diperlukan');
            return;
        }
        
        // Disable submit button
        submitButton.disabled = true;
        
        // Submit form
        const formData = new FormData(this);
        
        // Create temporary copy of cart data
        const cartBackup = localStorage.getItem('cart');
        
        this.submit();
        
        // Wait for server response
        await new Promise(resolve => setTimeout(resolve, 2000));
        
        // Clear cart only if submission was successful
        if (!document.querySelector('.error-message')) {
            localStorage.setItem('cart', JSON.stringify([]));
            updateCartBadge();
            hidePaymentPopup();
            showNotification('Order successfully placed!');
        } else {
            localStorage.setItem('cart', cartBackup);
            showNotification('Failed to process order. Please try again.');
        }
        
    } catch (error) {
        console.error('Error submitting form:', error);
        showNotification('Failed to process order. Please try again.');
    } finally {
        setTimeout(() => {
            submitButton.disabled = false;
        }, 2000);
    }
});

// Tambahkan ini di bagian atas file setelah DOMContentLoaded
document.addEventListener('DOMContentLoaded', function() {
    // Update cart data saat halaman dimuat
    updateCartData();
});

function updateCartData() {
    const cart = JSON.parse(localStorage.getItem('cart')) || [];
    document.getElementById('cart_data').value = JSON.stringify(cart);
    
    // Hitung total
    const total = cart.reduce((sum, item) => sum + (item.harga * item.quantity), 0);
    document.getElementById('total_harga_input').value = total;
}

// Update event listener form
document.getElementById('payment-form').addEventListener('submit', function(e) {
    e.preventDefault();
    
    const cart = JSON.parse(localStorage.getItem('cart')) || [];
    if (cart.length === 0) {
        alert('Keranjang belanja kosong!');
        return;
    }

    const nama = document.getElementById('nama').value;
    const email = document.getElementById('email').value;
    const kodeBank = document.getElementById('kode_bank_input').value;
    const image = document.getElementById('image').files[0];

    if (!nama || !email || !kodeBank || !image) {
        alert('Mohon lengkapi semua field!');
        return;
    }

    // Submit form
    this.submit();
});

</script>
</body>
</html>