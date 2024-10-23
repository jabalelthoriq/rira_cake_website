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
  <div class="hero">
   <img class="img" alt="Cake with berries" src="https://storage.googleapis.com/a1aa/image/WrXmLNeC6qXtXyWunakIfw8ZP5EGKCYAjCQc7J6Y9V2dUkoTA.jpg"  />
   <div class="content">
    <h1>Rira Cake</h1>
    <p>CAFE & BAKERY</p>
    <p>It's the Simple Pleasures in Life</p>
    <a class="order-btn" href="order.php">Order</a> 
   </div>
  </div>

  <section id="cup">
      <h2 class="sec-title">What Is Rira Cake?</h2>
      <div class="wrap">
        <div class="left">
          <div class="item-text">
            <div class="icon">
              <img src="./assets/Made-Icon-1.png" />
            </div>
            <h3>Premium Taste</h3>
            <p>
              Our premium blends deliver an exceptional taste experience.
              Indulge in the rich aroma and balanced flavors.
            </p>
          </div>
          <div class="item-text">
            <div class="icon">
              <img src="./assets/Made-Icon-2.png" />
            </div>
            <h3>Convenient Place</h3>
            <p>
              Step into our cozy café and enjoy your drinks in comfort. Our
              location and hours make it easy to visit.
            </p>
          </div>
        </div>
        <div class="mid">
          <img src="./assets/site/Kopi-Tani-Cup.png" />
        </div>
        <div class="right">
          <div class="item-text">
            <div class="icon">
              <img src="./assets/Made-Icon-3.png" />
            </div>
            <h3>Made by Best Brewer</h3>
            <p>
              Our skilled baristas are masters of their craft, meticulously
              preparing each cup with precision and awesome expertise.
            </p>
          </div>
          <div class="item-text">
            <div class="icon">
              <img src="./assets/Made-Icon-4.png" />
            </div>
            <h3>Good Price</h3>
            <p>
              Enjoy high-quality products and service at prices that fit your
              budget. We provide exceptional value, fantastic choice.
            </p>
          </div>
        </div>
      </div>
      <ol>
      <li >
		<a class="button button--pan"  href="aboutus.php"><span>Read our full story</span></a>
	    </li> 
        </ol>
    </section><br><br><br>  

    
    <section id="best">
      <h2 class="sec-title">Favorite Menu</h2>
      <div class="wrap">
        <div class="tab"></div>
        <div class="overlay" onclick="closePopup()"></div>
        <div class="popup"></div>
        <div class="menu-list" id="index-container"></div>
      </div>
      <ol>
      <li>
		<a class="button button--pan"  href="order.php"><span>Se All Menu</span></a>
	    </li>
        </ol>
    </section>
 </body>
</html>
