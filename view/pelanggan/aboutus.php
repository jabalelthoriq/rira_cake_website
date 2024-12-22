<html>
<head>
  <title>Rira Cake Cafe & Bakery</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="nav.css">
  <style>
    
    /* nav css */
@import url("https://fonts.googleapis.com/css2?family=Poppins");

body, html {
  margin: 0;
  padding: 0;
  font-family: 'Arial', sans-serif;
  background-color: #f5e6d3;
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
    color: white;
}
.navbar .icons i {
    color: #FFFFFF;
    font-size: 20px;
}

.hero {
    text-align: center;
    color: white;
    position: relative;
}       
.hero img {
    width: 100%;
    height: 100%;
    object-fit: cover; 
    object-position: center; 
}
.hero .content {
    position: absolute;
    top: 40%;
    left: 50%;
    transform: translate(-50%, -50%);
}
.hero .content h1 {
    font-size: 48px;
    margin: 0;
}
.hero .content p {
    font-size: 24px;
    margin: 10px 0;
}
.hero .content .order-btn {
    background-color: rgba(255, 255, 255, 0.3);
    border: 2px solid white;
    padding: 10px 20px;
    color: white;
    font-size: 18px;
    text-decoration: none;
    border-radius: 5px;
}

.content {
    text-align: center;
    padding: 50px 20px;
}
.content h1 {
    font-size: 36px;
    color: #3E2723;
    margin-bottom: 30px;
}
.content img {
    width: 300px;
    height: auto;
    border-radius: 10px;
}
.features {
    display: flex;
    justify-content: space-around;
    margin-top: 30px;
}
.feature {
    text-align: center;
    color: #3E2723;
}
.feature i {
    font-size: 40px;
    margin-bottom: 10px;
}
.feature p {
    font-size: 16px;
    margin: 0;
}
.feature p span {
    display: block;
    font-size: 14px;
    text-decoration: underline;
}
.button {
    margin-top: 30px;
}
.button a {
    background-color: #6D4C41;
    color: #FFFFFF;
    padding: 10px 20px;
    border-radius: 20px;
    text-decoration: none;
    font-size: 16px;
}
.main-content {
    text-align: center;
    padding: 50px 0;
}
.main-content h1 {
    font-size: 36px;
    margin-bottom: 50px;
}
.product-container {
    display: flex;
    justify-content: center;
    gap: 20px;
}
.product-card {
    background-color: #ffe5b4;
    border-radius: 15px;
    padding: 20px;
    width: 250px;
    text-align: center;
}
.product-card img {
    width: 100%;
    border-radius: 15px;
}
.product-card h2 {
    font-size: 20px;
    margin: 15px 0 10px;
}
.product-card p {
    font-size: 16px;
    margin: 10px 0;
}
.product-card .price {
    font-size: 18px;
    font-weight: bold;
    margin: 10px 0;
}
.product-card .cart-icon {
    background-color: #5c4b4b;
    color: white;
    padding: 10px;
    border-radius: 50%;
    font-size: 18px;
}
.quote-section {
    background-color: #f5e6d3;
    padding: 40px 20px;
    text-align: center;
  }
  
  .quote-section .quote {
    font-size: 24px;
    font-style: italic;
    margin: 0;
  }

  .map-section {
    background-color: #f5e6d3;
    padding: 40px 20px;
    text-align: center;
  }
  
  .map-section h2 {
    font-size: 32px;
    margin-bottom: 20px;
  }
  
  .map-section img {
    width: 300px;
    height: auto;
  }
  .text{
    position: absolute;
    top: 40%;
    left: 50%;
    transform: translate(-50%, -50%);
  }
  .text h1{
    font-size: 48px;
    margin: 0;
  }
  .text p{
    font-size: 18px;
    margin: 10px 0 0;
  }
  .king {
    text-align: center;
    color: white;
    position: relative;
}
.king img {
    width: 100%;    
    height: 80%;
    object-fit: cover; 
    object-position: center; 
}

.word{
    position: absolute;
    top: 30%;
    left: 37%;
    transform: translate(-50%, -50%);
    max-width: 900px;
  }
  .word h1{
    font-size: 48px;
    margin: 0;
  }
  .word p{
    font-size: 18px;
    margin: 10px 0 0;
  }


.quen {
    position: relative;
    padding: 20px;
}

.quen img {
    position: absolute;
    top: -20px;
    right: 100px; 
    transform: translateY(-50%);
    width: 30%;
    height: auto;
}

.container {
    width: 400px;
    margin-top: 7%;
    margin-left: 19%;
    padding: 20px;
    background-color: #F8EDE3;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    border-radius: 10px;

}

label {
    display: block;
    margin-bottom: 5px;
    padding: 10px;
}

input {
    width: 100%;
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
}

button {
    width: 100%;
    padding: 10px;
    background-color: #4D290E;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

button:hover {
    background-color: #6c3b16;
}

.input-message{
    width: 100%;
    height: 200px;
    padding: 10px;
    margin-bottom: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
}

section h2.sec-title {
    text-align: center;
    padding: 0 30px 30px;
    font-size: 2.3rem;
  }

  .more-wrap {
    margin-top: 30px;
    text-align: center;
  }
  
  .more {
    cursor: pointer;
    transition: 0.1s all;
    font-family: "Vesper Libre", serif;
    text-align: center;
    display: inline-block;
    font-size: 1rem;
    padding: 10px 40px 8px;
    background: var(--primary);
    color: white;
    border-radius: 88px;
    border: 1px solid var(--primary);
  }
  
  .more:hover {
    background: transparent;
    color: var(--text-color);
  }

  #cup .wrap {
    max-width: 1100px;
    margin: auto;
    display: grid;
    gap: 40px;
    grid-template-columns: 2.5fr 1.25fr 2.5fr;
  }
  
  #cup .left {
    gap: 30px;
    text-align: right;
    display: grid;
  }
  
  #cup .right {
    gap: 30px;
    display: grid;
  }
  
  #cup .item-text {
    display: flex;
    flex-direction: column;
    gap: 10px;
  }
  
  #cup h3 {
    font-size: 1.3rem;
  }
  
  #cup .item-text img {
    width: 50px;
    opacity: 0.8;
    margin-bottom: 5px;
  }
  
  #cup .item-text p {
    opacity: 0.8;
    font-size: 90%;
  }

  #best .wrap {
    max-width: 1100px;
    margin: 60px auto 0;
  }
  
  #best .tab {
    display: none;
  }

  ol {
    list-style: none;
    padding: 0;
    margin: 0;
  }

  li {
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
  }


  a {
    text-decoration: none;
    color: inherit;
  }

  .button {
    display: inline-flex;
    justify-content: center;
    align-items: center;
    height: auto;
    width: 170px;
    pointer-events: auto;
    cursor: pointer;
    /* background: #ffffff; */
    border: none;
    padding: 1.5rem 3rem;
    margin: 0;
    font-family: inherit;
    font-size: inherit;
    position: relative;
    isolation: isolate;
  }

  .button--pan {
    font-family: "Poppins", sans-serif;
    font-weight: 700;
    border: 2px solid #6c3b16;
    border-radius: 3rem;
    overflow: hidden;
    color: #000;
    transition: color 0.5s ease;
  }

  .button--pan span {
    position: relative;
    z-index: 1;
  }

  .button--pan::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: #6c3b16;
    transform: translate3d(0, 100%, 0);
    transition: transform 0.3s cubic-bezier(0.7, 0, 0.2, 1);
  }

  .button--pan:hover::before {
    transform: translate3d(0, 0, 0);
  }

  .button--pan:hover span {
    color: #f5e6d3;


  }
  

  .carousel-container {
    width: 100%;
    height: 400px;
    position: relative;
    overflow: hidden;
  }

  .carousel-slide {
    position: absolute;
    width: 100%;
    height: 100%;
    opacity: 0;
    transition: opacity 0.5s ease-in-out;
    background-size: cover;
    background-position: center;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    color: white;
    text-align: center;
  }

  .carousel-slide.active {
    opacity: 1;
  }

  #slide1 {
    background-image: url('aset/gambar/kukis4.jpg');
  }

  #slide2 {
    background-image: url('aset/gambar/kukis2.jpg');
  }

  #slide3 {
    background-image: url('aset/gambar/kukis3.jpg');
  }

  .carousel-dots {
    position: absolute;
    bottom: 20px;
    left: 50%;
    transform: translateX(-50%);
    display: flex;
    gap: 10px;
  }

  .dot {
    width: 12px;
    height: 12px;
    border-radius: 50%;
    background-color: rgba(255, 255, 255, 0.5);
    cursor: pointer;
  }

  .dot.active {
    background-color: white;
  }

  
  .slide-title {
    font-size: 2.5em;
    margin-bottom: 20px;
    opacity: 0;
    transform: translateY(20px);
    transition: all 0.8s ease;
  }

  .slide-description {
    font-size: 1.2em;
    margin-bottom: 30px;
    max-width: 600px;
    opacity: 0;
    transform: translateY(20px);
    transition: all 0.8s ease 0.2s;
  }

  
  .slide-button {
    padding: 12px 30px;
    font-size: 1.1em;
    background: transparent;
    color: white;
    border: 2px solid white;
    cursor: pointer;
    transition: all 0.3s ease;
    opacity: 0;
    transform: translateY(20px);
    transition: all 0.8s ease 0.4s;
  }

  .slide-button:hover {
    background: #6c3b16;
    color: #F8EDE3;
    transform: translateY(20px) scale(1.1);
  }

  
  .carousel-slide.active .slide-title,
  .carousel-slide.active .slide-description,
  .carousel-slide.active .slide-button {
    opacity: 1;
    transform: translateY(0);
  }

  .slide-title, .slide-description {
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
  }

  .carousel-slide::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.4);
    z-index: 0;
  }

  
  .slide-content {
    position: relative;
    z-index: 1;
  }
/* nav css */
    
    

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
      margin-left: 100px;
    }
    .-h p {
      font-size: 20px;
      margin-left: 100px;
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
    .team-introduction {
  text-align: center;
  padding: 50px;
  background: inherit;
  font-family: 'Arial', sans-serif;
  color:black; 
}
.team-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
  gap: 20px;
  justify-content: center;
  align-items: center;
}
.team-member, .team-leader {
  text-align: center;
  background: white;
  border-radius: 10px;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
  padding: 20px;
  transition: transform 0.3s, box-shadow 0.3s;
}
.team-member:hover, .team-leader:hover {
  transform: translateY(-10px);
  box-shadow: 0 6px 10px rgba(0, 0, 0, 0.2);
}
.team-leader {
  grid-column: span 1; 
  padding: 30px;
}
.team-member img, .team-leader img {
  width: 150px;
  height: 150px;
  border-radius: 50%;
  object-fit: cover;
  margin: 0 auto 10px;
  transition: transform 0.3s;
  display: block;
}
.team-member img:hover, .team-leader img:hover {
  transform: scale(1.1);
}
h2 {
  margin-bottom: 30px;
  font-size: 2rem;
}
h3 {
  margin: 10px 0 5px;
  font-size: 1.2rem;
}
p {
  font-size: 0.9rem;
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

.footer-section p, .footer-section a {
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
    background-color:  #0056b3;
}

.footer-bottom {
    margin-top: 20px;
    border-top: 1px solid #fff;
    padding-top: 10px;
}

  </style>
</head>

<body>
  <div class="navbar">
    <div>
      <a href="index.php?c=Auth&a=homepage">
        <img class="logo" alt="Rica Cake Logo" height="40" src="view/aset/gambar/logoweb.png" width="40" />
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
      
    </div>
  </div>

  <div class="k">
    <img alt="Bakery Image" src="view/aset/gambar/fresh-baked-gourmet-desserts-sweet-indulgence-generated-by-ai 1 (1).png" />
    <div class="text">
      <div class="contact-title" >Rira Cake</div>
      <p>Where the sweetness of homemade delicacies meets artisanal craftsmanship, offering a delectable and heartwarming cake experience for every occasion.</p>
    </div>
  </div>
  <div id="about" class="about-us">
  <h2 data-aos="fade-up">Our Sweet Story</h2>
  
    
    <div class="h" data-aos="fade-up"> 
        <div class="f" >
        <div class="t" >The Beginning: A Hobby Turned Into a Business (2010)</div>
        <p>Rira Cake and Pudding Surabaya was first established in 2010. Starting from the founder's love for the world of baking, this hobby was initially only intended to make simple snacks and children's snack supplies to school.
These creations made with love turned out to be not only liked by the family, but also attracted the attention of friends and neighbors.
Encouragement from the surrounding environment who appreciated the taste and appearance of the product encouraged us to start making baking a small business that continues to grow.
Over time, what started as a hobby has now become the seed of a business founded with passion, creativity,
and dedication to presenting quality products to customers.</p>
        </div>
          <div class="con" data-aos="fade-up" >
          <img alt="history" src="view/aset/gambar/owner.jpg" />
        </div>
    </div>

    
    <div class="-h" data-aos="fade-up">
    <div class="con2" data-aos="fade-up">
          <img alt="history" src="view/aset/gambar/menu1.jpg" />
        </div>
        <div class="f" >
        <div class="-t" >Journey to Grow with Loyal Customers</div>
        <p>Customer support is the main pillar of Rira Cake and Pudding's journey. With quality taste that is always maintained and product innovation that is continuously developed, this business continues to grow.
Our first customers were our closest friends and relatives, who then became loyal promoters who brought the name Rira Cake to wider circles.
Every cake and pudding that we produce is made with selected ingredients and hygienic processes to maintain customer trust.
Their positive response motivates us to continue learning and innovating, so that our products can be enjoyed by more and more people.</p>
        </div>
      </div>
          
      </div>

      <div class="h" data-aos="fade-up">
        <div class="f" >
        <div class="t" >Milestone: MUI Halal Certification (April 2024)</div>
        <p>April 2024 is a very valuable moment for Rira Cake and Pudding Surabaya.
We have officially obtained halal certification from the Indonesian Ulema Council (MUI), an acknowledgment of our commitment
in providing safe, quality products that comply with halal principles.
This certification is not only a source of pride for us, but also a form of responsibility to our customers,
especially those who prioritize the halal aspect in the products they consume. With this achievement, we hope
to continue to grow and bring happiness to our customers through products that are not only delicious but also trustworthy.</p>
        </div>
          <div class="con"data-aos="fade-up" >
          <img alt="history" src="view/aset/gambar/mui.jpg" />
        </div>
    </div>
    

    <div class="features">
      <div class="feature-card" data-aos="fade-up">
        <div class="feature-icon">🎂</div>
        <h3>Custom Cakes</h3>
        <p>Personalized cakes made specially for your unique celebrations and special moments.</p>
      </div>
      
      <div class="feature-card" data-aos="fade-up">
        <div class="feature-icon">✨</div>
        <h3>Premium Quality</h3>
        <p>We use only the finest ingredients to ensure every bite is pure perfection.</p>
      </div>
      
      <div class="feature-card" data-aos="fade-up">
      <div class="feature-icon">🍰</div>
      <h3>Freshly Made</h3>
      <p>Every cake is baked fresh daily to guarantee the best taste and quality for you.</p>
    </div>
    </div>
  </div>
  </div>
  <section class="team-introduction">
  <h2>Meet Our Website Development Team</h2>
  <div class="team-grid">
    <!-- Anggota 1 -->
    <div class="team-member" data-aos="fade-right" data-aos-delay="100">
      <img src="view/aset/gambar/adit.jpg" alt="Aditya Fajar Maulana">
      <h3>Aditya Fajar Maulana</h3>
      <p>Team Members</p>
    </div>

    <!-- Anggota 2 -->
    <div class="team-member"data-aos="fade-fight" data-aos-delay="400">
      <img src="view/aset/gambar/bagas.jpg" alt="Bagas Suyendra">
      <h3>Bagas Suyendra</h3>
      <p>Team Members</p>
    </div>

    <!-- Ketua (Tengah) -->
    <div class="team-leader" data-aos="fade-up" data-aos-delay="600">
      <img src="view/aset/gambar/jabal.jpg" alt="Jabal El Thoriq">
      <h3>Jabal El Thoriq</h3>
      <p><strong>Team Leader</strong></p>
    </div>

    <!-- Anggota 3 -->
    <div class="team-member" data-aos="fade-left" data-aos-delay="100">
      <img src="view/aset/gambar/anis.jpg" alt="Annisa Ikrimatus Soleha">
      <h3>Annisa Ikrimatus Soleha</h3>
      <p>Team Members</p>
    </div>

    <!-- Anggota 4 -->
    <div class="team-member"data-aos="fade-left" data-aos-delay="400">
      <img src="view/aset/gambar/soyaa.jpg" alt="Syarifatus Suroyya">
      <h3>Syarifatus Suroyya</h3>
      <p>Team Members</p>
    </div>
  </div>

  <link rel="stylesheet" href="https://unpkg.com/aos@2.3.4/dist/aos.css">
<script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
<script>
  AOS.init({
    duration: 1000, /* Durasi animasi */
    once: true, /* Animasi hanya muncul sekali */
  });
</script>

</section>
  <footer class="footer">
    <div class="footer-content">
      <div class="footer-section">
        <h3>Opening Hours</h3>
        <p>Monday - Friday: 10:00 AM - 3:00 PM</p>
        <p>Saturday - Sunday: Closed</p>
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
        <a class="contact-icon whatsapp-link" 
   href="https://wa.me/6285731243034?text=Salam%20kenal%20owner%20Rira%20Cake,%20Saya%20ingin%20memesan%20kue%20apakah%20bisa%20?" 
   target="_blank">
   <i class="fab fa-whatsapp"></i>
</a>
          <a class="contact-icon instagram-link" href="https://www.instagram.com/rira_cakeandpudingsurabaya?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==" target="_blank">
            <i class="fab fa-instagram"></i>
          </a>
          <a class="contact-icon email-link" href="mailto:silviaahmad25@gmail.com">
            <i class="fas fa-envelope"></i>
          </a>
        </div>
      </div>
    </div>
    <div class="footer-bottom">
      <p>&copy; 2024 Rira Cake. All rights reserved.</p>
    </div>
  </footer>
</body>
</html>
