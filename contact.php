<html>
 <head>
  <title>Rira Cake Cafe & Bakery</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <link rel="stylesheet" href="nav.css">
  <style>
   
  </style>
 </head>
 <body>
  <div class="navbar">
  <div>
   <a href="home.php">
    <img class="logo" alt="Rica Cake Logo" height="40" src="aset/gambar/logoweb.png" width="40"/>
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
  <div class="container">
        <form action="process.php" method="post">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required><br><br>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required><br><br>

            <label for="message">Message:</label>
            <input class="input-message" type="text" id="password" name="password" required><br><br>

            <button type="submit">Submit</button>
        </form>
    </div>
    <div class="quen">
    <img
    
        alt="Bakery Image"
        src="aset/gambar/eco.png"
      />
    </div>
 </body>
</html>
