<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rica Cake Cafe & Bakery</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="nav.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
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
            cursor: pointer;
        }

        .product-card:hover {
            transform: scale(1.05);
        }

        .product-card img {
            border-radius: 8px;
            margin-bottom: 15px;
            width: 100%;
            /* Responsive image */
            height: auto;
            /* Maintain aspect ratio */
        }

        .price {
            font-weight: bold;
            margin-bottom: 10px;
            font-size: 16px;
        }

        /* Modal Styles */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
        }

        .modal-content {
            background-color: #4b2e2e;
            padding: 20px;
            border-radius: 10px;
            width: 300px;
            text-align: center;
            color: white;
            position: relative;
        }

        .cart-modal-content img {
            max-width: 100px;
            /* Adjust as necessary */
            max-height: 100px;
            /* Adjust as necessary */
            object-fit: cover;
            border-radius: 8px;
            margin-right: 10px;
        }


        .modal-content .amount {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 10px;
            margin: 10px 0;
        }

        .modal-content .amount button,
        .modal-content .add-to-cart {
            background-color: white;
            color: #4b2e2e;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
        }

        .modal-content .close {
            position: absolute;
            top: 10px;
            right: 10px;
            font-size: 20px;
            cursor: pointer;
        }

        .cart-modal-content {
            background-color: #4b2e2e;
            padding: 20px;
            border-radius: 10px;
            width: 700px;
            text-align: center;
            color: white;
            position: relative;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .cart-modal-content .cart-items {
            text-align: left;
            margin: 20px 0;
            width: 100%;
        }

        .cart-modal-content .cart-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
        }

        .cart-modal-content .cart-items-container {
            max-height: 300px;
            /* Atur tinggi maksimum sesuai kebutuhan */
            overflow-y: auto;
            /* Mengizinkan scroll vertikal */
            width: 100%;
            /* Pastikan lebar 100% untuk menyesuaikan modal */
            border: 1px solid #ccc;
            /* Tambahkan border jika diinginkan */
            padding: 10px;
            /* Tambahkan padding untuk estetika */
            margin-bottom: 10px;
            /* Jarak antara cart items dan order notes */
        }

        .cart-modal-content .order-notes {
            margin: 20px 0;
            width: 100%;
        }

        .cart-modal-content .order-notes textarea {
            width: 95%;
            padding: 10px;
            border-radius: 5px;
            border: none;
            resize: none;
        }

        .cart-modal-content .order-button {
            background-color: white;
            color: #4b2e2e;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
        }

        .footer {
            background-color: #4b2e2e;
            color: white;
            text-align: center;
            padding: 20px;
            /* Remove position: fixed and bottom: 0 */
        }

        .main-content {
            padding: 40px;
            text-align: center;
            margin-bottom: 60px;
            /* Adjust as needed */
        }
    </style>
</head>

<body>
    <div class="navbar">
        <div>
            <a href="home.php">
                <img class="logo" alt="Rica Cake Logo" src="aset/gambar/logoweb.png" />
            </a>
        </div>
        <div class="nav-links">
            <a href="aboutus.php">About Us</a>
            <a href="order.php">Order</a>
            <a href="contact.php">Contact</a>
        </div>
        <div class="icons">
            <i class="fas fa-user"></i>
            <i class="fas fa-shopping-basket" onclick="openCartModal()"></i>
            <span class="cart-count" id="cartCount">0</span>
        </div>
    </div>

    <main class="main-content">
        <h1>Our Best Menu</h1>
        <div class="product-container">
            <!-- Existing Products -->
            <div class="product-card" onclick="openModal('menu1.jpg', 'Nama Produk 1', 25000)">
                <img alt="Product Image 1" src="aset/gambar/menu1.jpg" />
                <h2>Nama Produk 1</h2>
                <p>Deskripsi singkat produk 1</p>
                <div class="price">Rp 25.000</div>
            </div>
            <div class="product-card" onclick="openModal('menu2.jpg', 'Nama Produk 2', 27000)">
                <img alt="Product Image 2" src="aset/gambar/menu2.jpg" />
                <h2>Nama Produk 2</h2>
                <p>Deskripsi singkat produk 2</p>
                <div class="price">Rp 27.000</div>
            </div>
            <div class="product-card" onclick="openModal('menu3.jpg', 'Nama Produk 3', 30000)">
                <img alt="Product Image 3" src="aset/gambar/menu3.jpg" />
                <h2>Nama Produk 3</h2>
                <p>Deskripsi singkat produk 3</p>
                <div class="price">Rp 30.000</div>
            </div>
            <!-- New Products -->
            <div class="product-card" onclick="openModal('menu4.jpg', 'Nama Produk 4', 32000)">
                <img alt="Product Image 4" src="aset/gambar/menu4.jpg" />
                <h2>Nama Produk 4</h2>
                <p>Deskripsi singkat produk 4</p>
                <div class="price">Rp 32.000</div>
            </div>
            <div class="product-card" onclick="openModal('menu5.jpg', 'Nama Produk 5', 35000)">
                <img alt="Product Image 5" src="aset/gambar/menu5.jpg" />
                <h2>Nama Produk 5</h2>
                <p>Deskripsi singkat produk 5</p>
                <div class="price">Rp 35.000</div>
            </div>
            <div class="product-card" onclick="openModal('menu6.jpg', 'Nama Produk 6', 28000)">
                <img alt="Product Image 6" src="aset/gambar/menu6.jpg" />
                <h2>Nama Produk 6</h2>
                <p>Deskripsi singkat produk 6</p>
                <div class="price">Rp 28.000</div>
            </div>
            <div class="product-card" onclick="openModal('menu7.jpg', 'Nama Produk 7', 29000)">
                <img alt="Product Image 7" src="aset/gambar/menu7.jpg" />
                <h2>Nama Produk 7</h2>
                <p>Deskripsi singkat produk 7</p>
                <div class="price">Rp 29.000</div>
            </div>
            <div class="product-card" onclick="openModal('menu8.jpg', 'Nama Produk 8', 33000)">
                <img alt="Product Image 8" src="aset/gambar/menu8.jpg" />
                <h2>Nama Produk 8</h2>
                <p>Deskripsi singkat produk 8</p>
                <div class="price">Rp 33.000</div>
            </div>
            <div class="product-card" onclick="openModal('menu9.jpg', 'Nama Produk 9', 34000)">
                <img alt="Product Image 9" src="aset/gambar/menu9.jpg" />
                <h2>Nama Produk 9</h2>
                <p>Deskripsi singkat produk 9</p>
                <div class="price">Rp 34.000</div>
            </div>
        </div>
    </main>

    <!-- Modal for Product Details -->
    <div class="modal" id="productModal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">×</span>
            <img alt="Product Image" height="200" id="modalImage" src="" width="200" />
            <h2 id="modalTitle"></h2>
            <div class="amount">
                <button onclick="decreaseAmount()">-</button>
                <span id="amount">1</span>
                <button onclick="increaseAmount()">+</button>
            </div>
            <div class="price" id="modalPrice"></div>
            <button class="add-to-cart" onclick="addToCart()">Add to cart</button>
        </div>
    </div>
    <!-- Modal for Cart Items -->
    <div class="modal" id="cartModal">
        <div class="cart-modal-content">
            <span class="close" onclick="closeCartModal()">×</span>
            <h2>Your Cart</h2>
            <div class="cart-items-container">
                <div class="cart-items" id="cartItems"></div>
            </div>
            <div class="order-notes">
                <textarea id="orderNotes" placeholder="Add any special requests here..." rows="4"></textarea>
            </div>
            <div class="divider"></div>
            <button class="order-button" onclick="placeOrder()">Place Order</button>
        </div>
    </div>
    <div class="footer">
        <p>
            © 2024 Rira Cake. All rights reserved.
        </p>
        <p>
            Contact us: info@riracake.com | +62 852 3005 9007
        </p>
        <p>
            Address: Jl. Example No. 123, Jember, Indonesia
        </p>
    </div>

    <script>
        let cart = [];
        let currentProduct = {};

        function openModal(image, title, price) {
            currentProduct = { image, title, price, amount: 1 };

            // Ensure the image path is correctly set to the modal image element
            const modalImage = document.getElementById("modalImage");
            modalImage.src = `aset/gambar/${image}`;
            modalImage.alt = title;

            document.getElementById("modalTitle").innerText = title;
            document.getElementById("modalPrice").innerText = `Rp ${price}`;
            document.getElementById("amount").innerText = 1;
            document.getElementById("productModal").style.display = "flex";
        }


        function closeModal() {
            document.getElementById("productModal").style.display = "none";
        }

        function increaseAmount() {
            currentProduct.amount += 1;
            document.getElementById("amount").innerText = currentProduct.amount;
        }

        function decreaseAmount() {
            if (currentProduct.amount > 1) {
                currentProduct.amount -= 1;
                document.getElementById("amount").innerText = currentProduct.amount;
            }
        }

        function addToCart() {
            cart.push({ ...currentProduct });
            updateCartCount();
            closeModal();
        }

        function updateCartCount() {
            document.getElementById("cartCount").innerText = cart.length;
        }

        function openCartModal() {
            const cartItemsContainer = document.getElementById("cartItems");
            cartItemsContainer.innerHTML = "";
            cart.forEach((item, index) => {
                const cartItem = document.createElement("div");
                cartItem.className = "cart-item";
                cartItem.innerHTML = `
            <img src="aset/gambar/${item.image}" alt="${item.title}">
            <div class="item-info">
                <h3>${item.title}</h3>
                <p>Amount: ${item.amount}</p>
                <p class="price">Rp ${item.price * item.amount}</p>
            </div>
        `;
                cartItemsContainer.appendChild(cartItem);
            });
            document.getElementById("cartModal").style.display = "flex";
        }


        function closeCartModal() {
            document.getElementById("cartModal").style.display = "none";
        }

        function placeOrder() {
            const orderNotes = document.getElementById("orderNotes").value;
            Swal.fire({
                title: "Order placed successfully!",
                text: `Order Notes: ${orderNotes}`,
                icon: "success",
            });
            cart = [];
            updateCartCount();
            closeCartModal();
        }
    </script>
</body>

</html>