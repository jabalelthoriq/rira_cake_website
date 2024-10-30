<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rica Cake Cafe & Bakery</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="nav.css">
    <style>
        /* Basic Styles */
        body {
            margin: 0;
            font-family: Arial, sans-serif;
        }

        .navbar {
        background-color: #5c4b4b;
        padding: 10px 20px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        }
        .logo{
        height: auto;
        width: 50%;
        }
        .nav-links a {
            color: white;
            text-decoration: none;
            margin: 0 15px;
            font-size: 16px;
        }

        .nav-links a:hover {
            text-decoration: underline;
        }

        .icons i {
            color: white;
            font-size: 20px;
            margin-left: 15px;
            cursor: pointer;
        }

        .main-content {
            padding: 40px;
            text-align: center;
        }

        .main-content h1 {
            margin-bottom: 30px;
            font-size: 24px;
        }

        .product-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .product-card {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            text-align: center;
            width: 250px;
            transition: transform 0.2s;
        }

        .product-card:hover {
            transform: scale(1.05);
        }

        .product-card img {
            border-radius: 8px;
            margin-bottom: 15px;
            width: 100%; /* Responsive image */
            height: auto; /* Maintain aspect ratio */
        }

        .product-card h2 {
            margin: 10px 0;
            font-size: 18px;
        }

        .product-card p {
            margin: 5px 0 15px;
            font-size: 14px;
            color: #555; /* Slightly lighter text color */
        }

        .price {
            font-weight: bold;
            margin-bottom: 10px;
            font-size: 16px;
        }

        .cart-icon {
            font-size: 24px;
            cursor: pointer;
        }

        .cart-icon:hover {
            opacity: 0.8;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <div>
            <a href="home.php">
                <img class="logo" alt="Rica Cake Logo" src="aset/gambar/logoweb.png"/>
            </a>
        </div>
        <div class="nav-links">
            <a href="aboutus.php">About Us</a>
            <a href="order.php">Order</a>
            <a href="contact.php">Contact</a>
        </div>
        <div class="icons">
            <i class="fas fa-user"></i>
            <i class="fas fa-shopping-basket"></i>
        </div>
    </div>

    <main class="main-content">
        <h1>Our Best Menu</h1>
        <div class="product-container">
            <!-- Existing Products -->
            <div class="product-card">
                <img alt="Product Image 1" src="aset/gambar/menu1.jpg"/>
                <h2>Nama Produk 1</h2>
                <p>Deskripsi singkat produk 1</p>
                <div class="price">Rp 25.000</div>
                <i class="fas fa-shopping-basket cart-icon"></i>
            </div>
            <div class="product-card">
                <img alt="Product Image 2" src="aset/gambar/menu2.jpg"/>
                <h2>Nama Produk 2</h2>
                <p>Deskripsi singkat produk 2</p>
                <div class="price">Rp 27.000</div>
                <i class="fas fa-shopping-basket cart-icon"></i>
            </div>
            <div class="product-card">
                <img alt="Product Image 3" src="aset/gambar/menu3.jpg"/>
                <h2>Nama Produk 3</h2>
                <p>Deskripsi singkat produk 3</p>
                <div class="price">Rp 30.000</div>
                <i class="fas fa-shopping-basket cart-icon"></i>
            </div>
            <div class="product-card">
                <img alt="Product Image 4" src="aset/gambar/menu4.jpg"/>
                <h2>Nama Produk 4</h2>
                <p>Deskripsi singkat produk 4</p>
                <div class="price">Rp 30.000</div>
                <i class="fas fa-shopping-basket cart-icon"></i>
            </div>
            <!-- New Products -->
            <div class="product-card">
                <img alt="Product Image 5" src="aset/gambar/menu5.jpg"/>
                <h2>Nama Produk 5</h2>
                <p>Deskripsi singkat produk 5</p>
                <div class="price">Rp 32.000</div>
                <i class="fas fa-shopping-basket cart-icon"></i>
            </div>
            <div class="product-card">
                <img alt="Product Image 6" src="aset/gambar/menu6.jpg"/>
                <h2>Nama Produk 6</h2>
                <p>Deskripsi singkat produk 6</p>
                <div class="price">Rp 35.000</div>
                <i class="fas fa-shopping-basket cart-icon"></i>
            </div>
            <div class="product-card">
                <img alt="Product Image 7" src="aset/gambar/menu7.jpg"/>
                <h2>Nama Produk 7</h2>
                <p>Deskripsi singkat produk 7</p>
                <div class="price">Rp 28.000</div>
                <i class="fas fa-shopping-basket cart-icon"></i>
            </div>
            <div class="product-card">
                <img alt="Product Image 8" src="aset/gambar/menu8.jpg"/>
                <h2>Nama Produk 8</h2>
                <p>Deskripsi singkat produk 8</p>
                <div class="price">Rp 29.000</div>
                <i class="fas fa-shopping-basket cart-icon"></i>
            </div>
            <div class="product-card">
                <img alt="Product Image 9" src="aset/gambar/menu9.jpg"/>
                <h2>Nama Produk 9</h2>
                <p>Deskripsi singkat produk 9</p>
                <div class="price">Rp 33.000</div>
                <i class="fas fa-shopping-basket cart-icon"></i>
            </div>
        </div>
    </main>
</body>
</html>
