<html>

<head>
  <title>Rira Cake Cafe & Bakery</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
  <link rel="stylesheet" href="nav.css">

  <style>

/* nav css */


@import url("https://fonts.googleapis.com/css2?family=Poppins");



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
}
.navbar .icons i {
    color: #FFFFFF;
    font-size: 20px;
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

.header {
    background-color: #5c4b4b;
    color: white;
    padding: 10px 0;
    text-align: center;
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 10px 50px;
}
.header img {
    height: 50px;
}
.header nav a {
    color: white;
    text-decoration: none;
    margin: 0 15px;
    font-size: 18px;
}
.header .icons {
    display: flex;
    align-items: center;
}
.header .icons i {
    margin-left: 15px;
    font-size: 20px;
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
    color: #F8EDE3;
    text-align: center;
  }

  .carousel-slide.active {
    opacity: 1;
  }

  #slide1 {
    background-image: url('view/aset/gambar/kukis4.jpg');
  }

  #slide2 {
    background-image: url('view/aset/gambar/kukis2.jpg');
  }

  #slide3 {
    background-image: url('view/aset/gambar/kukis3.jpg');
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
    margin: 0;
  }
  
  #cup .item-text img {
    width: 50px;
    height: auto;
    margin: 0;
  }
  
  #cup .item-text p {
    opacity: 0.8;
    font-size: 90%;
  }
 

  /* menu */

        .container {
          margin: 0 auto;
          width: 90%;
          margin-top: 5px;
            display: flex;
            justify-content: space-evenly;
            padding: 20px;
            flex-wrap: wrap;
            gap: 70px;
            box-shadow: 0 0 0 rgba(0,0,0,0.0);
            background-color: #f5e6d3;
        }
        
        .menu-card {
            width: 250px;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            cursor: pointer;
            transition: all 0.3s ease;
            
        }

        .menu-card:hover {
          background-color: #6c3b16;
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
            align-items: center;
            justify-content: center;
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
        .navbar .icons {
        display: flex;
        gap: 15px;
        color: white;
        
    
        }
        .navbar .icons i {
        color: white;
        font-size: 20px;
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
  </style>
</head>

<body>
<div class="navbar">
  <div>
   <a href="index.php?c=Auth&a=homepage">
    <img class="logo" alt="Rica Cake Logo" height="40" src="view/aset/gambar/logoweb.png" width="40"/>
    </a>
   </div>
   <div class="nav-links">
    <a href="index.php?c=Auth&a=aboutuspage" >About Us</a>
    <a href="index.php?c=Auth&a=orderpage">Order</a>
    <a href="index.php?c=Auth&a=contactpage">Contact</a>
   </div>
   <div class="icons">
    <a href="index.php?c=Auth&a=index" class="fas fa-user">
      </a>
    <i class="fas fa-shopping-basket"></i>
   </div>
  </div>


  <div class="carousel-container">
    <div class="carousel-slide active" id="slide1">
      <div class="slide-content">
        <h2 class="slide-title">The Origin of Rira Cake</h2>
        <p class="slide-description">Rira Cake traces its roots to the charming town of Jember, where it was first baked
          by local artisans. Over the years, it has become a beloved delicacy, winning hearts with its unique flavor and
          texture.</p>
        <a class="slide-button" href="aboutus.php">The Journey</a>
      </div>
    </div>
    <div class="carousel-slide" id="slide2">
      <div class="slide-content">
        <h2 class="slide-title">The Unique Ingredients of Rira Cake </h2>
        <p class="slide-description">The secret to Rira Cake's distinct taste lies in its combination of premium local
          ingredients. Each bite promises a burst of flavors that leave you craving for more.</p>
        <a class="slide-button" href="order.php">Order Now</a>
      </div>
    </div>
    <div class="carousel-slide" id="slide3">
      <div class="slide-content">
        <h2 class="slide-title">Enjoying Rira Cake </h2>
        <p class="slide-description">Whether enjoyed as a dessert or a snack, Rira Cake fits perfectly into any
          occasion. Its delightful taste makes it a favorite among both locals and visitors alike.</p>
        <a class="slide-button" href="contact.php">Contact Me</a>
      </div>
    </div>

    <div class="carousel-dots">
      <div class="dot active" onclick="setSlide(0)"></div>
      <div class="dot" onclick="setSlide(1)"></div>
      <div class="dot" onclick="setSlide(2)"></div>
    </div>
  </div>
  <!-- <div class="hero">
   <img class="img" alt="Cake with berries" src="https://storage.googleapis.com/a1aa/image/WrXmLNeC6qXtXyWunakIfw8ZP5EGKCYAjCQc7J6Y9V2dUkoTA.jpg"  />
   <div class="content">
    <h1>Rira Cake</h1>
    <p>CAFE & BAKERY</p>
    <p>It's the Simple Pleasures in Life</p>
    <a class="order-btn" href="order.php">Order</a> 
   </div>
  </div> -->

  <section id="cup"><br><br><br>
    <h2 class="sec-title">What Is Rira Cake?</h2>
    <div class="wrap">
      <div class="left">
        <div class="item-text">
          <div class="icon">
            <img src="aset/gambar/panah1.png" />
          </div>
          <h3>Freshly Baked Daily</h3>
          <p>
            Our bakery offers the freshest pastries, bread, and cakes, baked every single day.
            Taste the difference freshness makes in every bite.
          </p>
        </div>
        <div class="item-text">
          <div class="icon">
            <img src="./assets/Made-Icon-2.png" />
          </div>
          <h3>Artisan Craftsmanship</h3>
          <p>
            Each of our baked goods is meticulously handcrafted by skilled bakers.
            We combine traditional techniques with creativity to bring you unique, delicious treats.
          </p>
        </div>
      </div>
      <div>
        <img src="view/aset/gambar/cookies-removebg.png" />
      </div>
      <div class="right">
        <div class="item-text">
          <div class="icon">
            <img src="./assets/Made-Icon-3.png" />
          </div>
          <h3>Locally Sourced Ingredients</h3>
          <p>
            We use only the finest locally sourced ingredients in all our creations.
            Savor the quality that comes from local farms.
          </p>
        </div>
        <div class="item-text">
          <div class="icon">
            <img src="./assets/Made-Icon-4.png" />
          </div>
          <h3>Cozy and Welcoming Atmosphere</h3>
          <p>
            Our bakery is a warm, inviting space where you can relax and unwind.
            Enjoy your favorite treat in a cozy, friendly environment.
          </p>
        </div>
      </div>
    </div>
    <ol>
      <li>
        <a class="button button--pan" href="aboutus.php"><span>Read full story</span></a>
      </li>
    </ol>
  </section><br><br><br><br><br><br>


  <section>
    <h2 class="sec-title">Favorite Menu</h2>
    <div class="container">
      <!-- Menu Card 1 -->
      <div class="menu-card" onclick="showPopup('menu1')">
        <img src="view/aset/gambar/menu1.jpg" class="menu-image"></>
        <div class="menu-info">
          <h3 class="menu-title">Chocolate Cake</h3>
          <p class="menu-price">Rp 25.000</p>
        </div>
      </div>

      <!-- Menu Card 2 -->
      <div class="menu-card" onclick="showPopup('menu2')">
        <img src="view/aset/gambar/menu2.jpg" class="menu-image"></>
        <div class="menu-info">
          <h3 class="menu-title">Cherry Cake</h3>
          <p class="menu-price">Rp 30.000</p>
        </div>
      </div>

      <!-- Menu Card 3 -->
      <div class="menu-card" onclick="showPopup('menu3')">
        <img src="view/aset/gambar/menu3.jpg" class="menu-image"></>
        <div class="menu-info">
          <h3 class="menu-title">Ayam Bakar</h3>
          <p class="menu-price">Rp 35.000</p>
        </div>
      </div>

      <!-- menu card 4 -->
      <div class="menu-card" onclick="showPopup('menu3')">
        <img src="view/aset/gambar/menu3.jpg" class="menu-image"></>
        <div class="menu-info">
          <h3 class="menu-title">Ayam Bakar</h3>
          <p class="menu-price">Rp 35.000</p>
        </div>
      </div>

      <!-- Menu Card 1 -->
      <div class="menu-card" onclick="showPopup('menu1')">
        <img src="view/aset/gambar/menu1.jpg" class="menu-image"></>
        <div class="menu-info">
          <h3 class="menu-title">Chocolate Cake</h3>
          <p class="menu-price">Rp 25.000</p>
        </div>
      </div>

      <!-- Menu Card 2 -->
      <div class="menu-card" onclick="showPopup('menu2')">
        <img src="view/aset/gambar/menu2.jpg" class="menu-image"></>
        <div class="menu-info">
          <h3 class="menu-title">Cherry Cake</h3>
          <p class="menu-price">Rp 30.000</p>
        </div>
      </div>

      <!-- Menu Card 3 -->
      <div class="menu-card" onclick="showPopup('menu3')">
        <img src="view/aset/gambar/menu3.jpg" class="menu-image"></>
        <div class="menu-info">
          <h3 class="menu-title">Ayam Bakar</h3>
          <p class="menu-price">Rp 35.000</p>
        </div>
      </div>

      <!-- menu card 4 -->
      <div class="menu-card" onclick="showPopup('menu3')">
        <img src="view/aset/gambar/menu3.jpg" class="menu-image"></>
        <div class="menu-info">
          <h3 class="menu-title">Ayam Bakar</h3>
          <p class="menu-price">Rp 35.000</p>
        </div>
      </div>
      <!-- Menu Card 1 -->
      <div class="menu-card" onclick="showPopup('menu1')">
        <img src="view/aset/gambar/menu1.jpg" class="menu-image"></>
        <div class="menu-info">
          <h3 class="menu-title">Chocolate Cake</h3>
          <p class="menu-price">Rp 25.000</p>
        </div>
      </div>

      <!-- Menu Card 2 -->
      <div class="menu-card" onclick="showPopup('menu2')">
        <img src="view/aset/gambar/menu2.jpg" class="menu-image"></>
        <div class="menu-info">
          <h3 class="menu-title">Cherry Cake</h3>
          <p class="menu-price">Rp 30.000</p>
        </div>
      </div>




    </div>
    </div>



    <!-- Popup Menu 1 -->
    <div class="popup-overlay" id="popup-menu1">
      <div class="popup-content">
        <button class="close" onclick="hidePopup('menu1')">&times;</button>
        <div class="popup-image"></div>
        <h2 class="popup-title">Chocolate Cake</h2>
        <p class="popup-description">
          Chocolate cake is crafted using the finest cocoa, butter, and fresh eggs, ensuring a moist and rich texture.
          The cake's layers are carefully baked and then generously slathered with smooth, decadent chocolate ganache.
        </p>
        <p class="popup-price">Rp 25.000</p>
        <div class="action-buttons">
          <a class="btn btn-order">Order Now</a>
          <button class="btn btn-wishlist">♡</button>
        </div>
      </div>
    </div>

    <!-- Popup Menu 2 -->
    <div class="popup-overlay" id="popup-menu2">
      <div class="popup-content">
        <button class="close" onclick="hidePopup('menu2')">&times;</button>
        <div class="popup-image"></div>
        <h2 class="popup-title">Cherry Cake</h2>
        <p class="popup-description">
          Cherry chocolate cake combines the finest cocoa with juicy, plump cherries for a rich and fruity delight. Each
          layer is baked to perfection and topped with a smooth cherry-infused chocolate ganache.
        </p>
        <p class="popup-price">Rp 30.000</p>
        <div class="action-buttons">
          <button class="btn btn-order">Order Now</button>
          <button class="btn btn-wishlist">♡</button>
        </div>
      </div>
    </div>

    <!-- Popup Menu 3 -->
    <div class="popup-overlay" id="popup-menu3">
      <div class="popup-content">
        <button class="close" onclick="hidePopup('menu3')">&times;</button>
        <div class="popup-image"></div>
        <h2 class="popup-title">Ayam Bakar</h2>
        <p class="popup-description">
          Ayam bakar dengan bumbu traditional Indonesia.
          Disajikan dengan nasi, lalap, dan sambal.
        </p>
        <p class="popup-price">Rp 35.000</p>
        <div class="action-buttons">
          <button class="btn btn-order">Order now</button>
          <button class="btn btn-wishlist">♡</button>
        </div>
      </div>
    </div><br><br><br>

    <ol>
      <li>
		<a class="button button--pan"  href="order.php"><span> Explore menu </span></a>
	    </li>
        </ol><br><br><br>
    </section>


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
        <p><a href="index.php?c=Auth&a=orderpage">Order Now</a></p>
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
            href="https://www.instagram.com/annisaakrs_/profilecard/?igsh=MWhla3h0YTB0ZTNkYw==" target="_blank">
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
  <script>
    let currentSlide = 0;
    const slides = document.querySelectorAll('.carousel-slide');
    const dots = document.querySelectorAll('.dot');

    function showSlide(index) {
      slides.forEach(slide => slide.classList.remove('active'));
      dots.forEach(dot => dot.classList.remove('active'));

      slides[index].classList.add('active');
      dots[index].classList.add('active');
    }

    function nextSlide() {
      currentSlide = (currentSlide + 1) % slides.length;
      showSlide(currentSlide);
    }

    function setSlide(index) {
      currentSlide = index;
      showSlide(currentSlide);
    }

    setInterval(nextSlide, 4000);



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

  </script>
</body>

</html>