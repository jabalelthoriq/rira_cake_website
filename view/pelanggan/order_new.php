<!DOCTYPE html>
<html lang="en">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
<link rel="stylesheet" href="nav.css">
    <style>

    </style>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="navbar">
  <div>
   <a href="/index.php?c=Auth&a=homepage">
    <img class="logo" alt="Rica Cake Logo" height="40" src="aset/gambar/logoweb.png" width="40"/>
    </a>
   </div>
   <div class="nav-links">
    <a href="/index.php?c=Auth&a=aboutuspage" >About Us</a>
    <a href="/index.php?c=Auth&a=orderpage">Order</a>
    <a href="/index.php?c=Auth&a=contactpage">Contact</a>
   </div>
   <div class="icons">
    <a href="view/login.php" class="fas fa-user">
      </a>
    <i class="fas fa-shopping-basket" onclick="openCartModal()"></i>
            <span class="cart-count" id="cartCount">0</span>
   </div>
  </div>


</body>
</html>