<html>
<head>
  <title>Rira Cake Cafe & Bakery</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="nav.css">
  <style>
    
    body, html {
      margin: 0;
      padding: 0;
      font-family: 'Arial', sans-serif;
      background-color: #f5e6d3;
  }
  .navbar .icons {
        display: flex;
        gap: 15px;
        color: white;
        
    
        }
        .navbar .icons i {
        color: white;
        font-size: 20px;
        }
    .contact-us {
      margin-top: 30px;
      display: flex;
      gap: 20px;
      justify-content: center;
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
      display: flex;
      cursor: pointer;
      transition: background-color 0.3s ease;
      text-decoration: none;
    }
    .contact-icon:hover {
      transform: scale(1.1);
      box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.3);
    }
    .icons i {
      margin-left: 20px;
      color: #D2691E;
      cursor: pointer;
      transition: transform 0.3s;
    }

    .icons i:hover {
      transform: scale(1.2);
    }

    .king {
      margin-top: 0px;
      position: relative;
      height: 600px;
      overflow: hidden;
    }

    .king img {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }

    .text .contact-title {
    text-align: center;
    color: #f5e6d3;
    font-size: 54px;
    margin-top: 0 auto; 
    font-weight: bold;
    transform: translateY(20px);
    transition: all 0.8s ease;
    margin-bottom: 40px;
  }   


    .about-us {
      padding: 50px 20px;
      text-align: center;
      margin-top: 30px;
    }

    .about-us h2 {
      color: black;
      font-size: 50px;
      margin-bottom: 0;
      margin-top: 0;
      position: relative;
      display: inline-block;
    }

    .about-us h2::after {
      position: absolute;
      right: -70px;
      top: -5px;
    }

    .about-us h2::before {
      position: absolute;
      left: -70px;
      top: -5px;
    }

    .features {
      display: flex;
      justify-content: center;
      flex-wrap: wrap;
      gap: 30px;
      margin-top: 30px;
    }

    .feature-card {
      background-color: white;
      padding: 30px;
      border-radius: 15px;
      width: 300px;
      box-shadow: 0 5px 15px rgba(0,0,0,0.1);
      transition: transform 0.3s;
    }

    .feature-card:hover {
      transform: translateY(-10px);
    }

    .feature-icon {
      font-size: 40px;
      color: #FF69B4;
      margin-bottom: 0px;
    }

    .quote-section {
      background-color: #FDF6F3;
      padding: 50px 20px;
      text-align: center;
      margin: 30px 0;
    }

    .quote {
      font-size: 1.5em;
      color: black;
      font-style: italic;
      margin-bottom: 20px;
    }

    .author {
      color: black;
      font-weight: 600;
    }

    .footer-content {
      display: flex;
      justify-content: space-between; 
      align-items: center; 
      padding: 20px; 
    }

    .footer-section {
      flex: 1;
      text-align: center; 
    }
    .map-section {
      text-align: center;
      padding: 50px;
      background-color: #FFE4E1;
    }

    .map-section h2 {
      color: black;;
      margin-bottom: 20px;
    }

    .map-section iframe {
      border-radius: 0px;
      box-shadow: 0 15px 15px rgba(0,0,0,0.1);
    }

    .testimonials {
      padding: 50px 20px;
      background-color: #FFE4E1;
      margin-top: 30;
    }

    .testimonials h2 {
      text-align: center;
      color: #D2691E;
      font-size: 2.5em;
      margin-bottom: 30px;
    }

    .testimonial-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
      gap: 30px;
      max-width: 1200px;
      margin: 0 auto;
    }

    .testimonial-card {
      background: white;
      padding: 30px;
      border-radius: 15px;
      box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    }

    .testimonial-text {
      font-style: italic;
      margin-bottom: 20px;
      color: #666;
    }

    .testimonial-author {
      color: #FF69B4;
      font-weight: bold;
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
      background-color:  #0056b3;
    }
    @keyframes float {
      0% { transform: translateY(0px); }
      50% { transform: translateY(-20px); }
      100% { transform: translateY(0px); }
    }
    .k {
        text-align: center;
        color: white;
        position: relative;
        }
        .k img {
        width: 100%;    
        height: 400px;
        object-fit: cover; 
        object-position: center; 
        filter: brightness(0.7);
        }

    .h {
      display: flex;
      text-align: start;
      color: black;
      position: relative;
      margin: 200px;
      margin-bottom: 100px;
      margin-top: 100px;
      max-width: 100%;
      justify-content: space-between;
      
      
    }
    .f {
      margin-left: 10px;
      min-height: 400px;
    
    }
    .con {
      box-shadow: 0 16px 18px rgba(0,0,0,0.4);
      width: 400px;
      height: 400px;
      display: flex;
      justify-content: center;
      margin: 10px;
      background-color: white;
    }
    .con img {
      display: inline-block;
      width: 380px;
      height: 380px;
      margin: auto;
    }

    .h .t {
      font-size: 30px;
      font-weight:bold ;
    }
    .h p {
      font-size: 20px;
      max-width: 600px;
    }

    .-h {
      display: flex;
      text-align: start;
      color: black;
      position: relative;
      margin-left: 200px;
      justify-content: space-between;
      margin-right: 200px;
  
    }
    .-h .-t {
      font-size: 30px;
      font-weight:bold ;
      margin-left: 300px;
    }
    .-h p {
      font-size: 20px;
      margin-left: 300px;
    }
    .con2{
      box-shadow: 0 16px 18px rgba(0,0,0,0.4);
      background-color: #f5e6d3;
      width: 400px;
      height: 400px;
      display: flex;
      justify-content: center;
      margin: 10px;
      background-color: white;
    }
    .con2 img {
      display: inline-block;
      width: 380px;
      height: 380px;
      margin: auto;
    }
    
  </style>
</head>

<body>
  <div class="navbar">
    <div>
      <a href="/index.php?c=Auth&a=homepage">
        <img class="logo" alt="Rica Cake Logo" height="40" src="aset/gambar/logoweb.png" width="40" />
      </a>
    </div>
    <div class="nav-links">
      <a href="/index.php?c=Auth&a=aboutuspage">About Us</a>
      <a href="/index.php?c=Auth&a=orderpage">Order</a>
      <a href="/index.php?c=Auth&a=contactpage">Contact</a>
    </div>
    <div class="icons">
    <a href="view/login.php" class="fas fa-user">
    </a>
      <i class="fas fa-shopping-basket"></i>
    </div>
  </div>

  <div class="k">
    <img alt="Bakery Image" src="aset/gambar/fresh-baked-gourmet-desserts-sweet-indulgence-generated-by-ai 1 (1).png" />
    <div class="text">
      <div class="contact-title" >Rira Cake.</div>
      <p>Where the sweetness of homemade delicacies meets artisanal craftsmanship, offering a delectable and heartwarming cake experience for every occasion.</p>
    </div>
  </div>
  <div id="about" class="about-us">
    <h2>Our Sweet Story</h2>
  
    
    <div class="h" >
        <div class="f" >
        <div class="t" >The Birth of a Dream</div>
        <p>In 2003, Rira Cake was born out of a small but passionate dream in the heart of Kaliwates. Rira, the visionary behind the bakery, had spent years mastering her recipes. Her goal was simple: to create cakes that not only delighted taste buds but also told a story. She started with a modest space and the finest ingredients she could find. 
          Word quickly spread about the unique flavors and impeccable quality of Rira's creations. Local residents flocked to the bakery, eager to taste the magic for themselves. Rira Cake soon became a beloved community staple.</p>
        </div>
          <div class="con" >
          <img alt="history" src="aset/gambar/menu1.jpg" />
        </div>
    </div>

    
    <div class="-h" >
    <div class="con2" >
          <img alt="history" src="aset/gambar/menu1.jpg" />
        </div>
        <div class="f" >
        <div class="-t" >Rising to Fame</div>
        <p>As Rira Cake gained popularity, it wasn’t long before its reputation extended beyond Kaliwates. People from neighboring towns began making special trips just to experience the famed cakes. Rira constantly innovated, adding new and exciting flavors inspired by global tastes. The bakery expanded its menu, yet each item retained the signature touch of love and dedication. Festivals and special occasions saw a surge in orders, with Rira Cake becoming a preferred choice. The team grew, bringing in more talented bakers who shared Rira's passion. Despite the growth, the essence of Rira Cake remained unchanged: a commitment to quality and community.</p>
        </div>
      </div>
          
      </div>

      <div class="h" >
        <div class="f" >
        <div class="t" >A Legacy of Sweetness</div>
        <p>Today, Rira Cake stands as a testament to what passion and hard work can achieve. The small bakery has blossomed into a local legend, with its cakes now part of many cherished moments. Rira's story has inspired many, proving that dreams can indeed come true. The bakery continues to evolve, embracing new trends while honoring its traditions. Every cake, from design to flavor, reflects the journey and dedication of Rira and her team. Customers, old and new, find joy in every bite, knowing they're part of a legacy. Rira Cake is more than a bakery—it's a sweet journey through time.</p>
        </div>
          <div class="con" >
          <img alt="history" src="aset/gambar/menu1.jpg" />
        </div>
    </div>
    

    <div class="features">
      <div class="feature-card">
        <div class="feature-icon">🎂</div>
        <h3>Custom Cakes</h3>
        <p>Personalized cakes made specially for your unique celebrations and special moments.</p>
      </div>
      
      <div class="feature-card">
        <div class="feature-icon">✨</div>
        <h3>Premium Quality</h3>
        <p>We use only the finest ingredients to ensure every bite is pure perfection.</p>
      </div>
      
      <div class="feature-card">
        <div class="feature-icon">🚚</div>
        <h3>Fresh Delivery</h3>
        <p>Same-day delivery service to ensure your cakes arrive fresh and beautiful.</p>
      </div>
    </div>
  </div>
  </div>
  <section class="testimonials">
    <h2>What Our Customers Say</h2>
    <div class="testimonial-grid">
      <div class="testimonial-card">
        <p class="testimonial-text">"The birthday cake was absolutely perfect! Everyone loved it and asked where I got it from."</p>
        <p class="testimonial-author">- Sarah K.</p>
      </div>
      <div class="testimonial-card">
        <p class="testimonial-text">"Best red velvet cake I've ever had! Will definitely order again."</p>
        <p class="testimonial-author">- Michael R.</p>
      </div>
      <div class="testimonial-card">
        <p class="testimonial-text">"The customization options are amazing, and the taste is even better!"</p>
        <p class="testimonial-author">- Lisa M.</p>
      </div>
    </div>
  </section>

  <div class="quote-section">
    <p class="quote">“We believe that every slice of cake brings a sweet, unforgettable moment to anyone who enjoys it.”</p>
    <p class="author">Director of Rira Cake</p>
  <div class="map-section">
    <h2>Find us on Map</h2>
    <iframe
      src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3949.424154373322!2d113.72049301127193!3d-8.15994978172228!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd695b617d8f623%3A0xf6c4437632474338!2sPoliteknik%20Negeri%20Jember!5e0!3m2!1sid!2sid!4v1726996903102!5m2!1sid!2sid"
      width="400" height="250" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
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
        <p><a href="aboutus.php">About Us</a></p>
        <p><a href="order.php">Order Now</a></p>
        <p><a href="home.php">Home</a></p>
      </div>
    </div>
  <div class="contact-us">
    <a class="contact-icon whatsapp-link" href="https://wa.me/+6282145483984" target="_blank">
      <i class="fab fa-whatsapp"></i>
    </a>
    <a class="contact-icon instagram-link" href="https://www.instagram.com/annisaakrs_/profilecard/?igsh=MWhla3h0YTB0ZTNkYw==" target="_blank">
      <i class="fab fa-instagram"></i>
    </a>
    <a class="contact-icon email-link" href="mailto:annisaikrimatus@gmail.com">
      <i class="fas fa-envelope"></i>
    </a>
  </div>
  <div class="footer-bottom">
      <p>&copy; 2024 Rira Cake. All rights reserved.</p>
    </div>
  </footer>
</body>
</html>
