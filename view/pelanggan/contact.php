<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - Rira Cake</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
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




        .container {
            margin: 0 auto;
            width: 90%;
            margin-top: 5px;
            display: flex;
            justify-content: space-evenly;
            padding: 20px;
            flex-wrap: wrap;
            gap: 30px;
            box-shadow: 0 0 0 rgba(0, 0, 0, 0.0);
            background-color: #f5e6d3;

        }

        .map {
            position: absolute;
            bottom: -419px;
            left: 115px;
            background-color: #f5e6d3;
            padding: 40px;
            padding-top: 0;
            border-radius: 10px;
            width: 406px;
            height: 275px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.3);
        }

        .map h3 {
            color: #333;
            font-size: 20px;
            margin-bottom: 10px;
        }

        .map iframe {
            border-radius: 10px;
            width: 100%;
            height: 230px;
            style: border:0;
        }

        .form-logo {
            display: flex;
            gap: 16px;
            padding: 16px;
            justify-content: flex-end;
            max-width: 1200px;
            margin: 0 auto;
            padding-top: 0;
        }

        .whatsup {
            background-color: #25D366;
            color: #fff;
            font-weight: bold;
            border-radius: 25px;
            width: fit-content;
            height: auto;
            padding: 15px;
            transition: all 0.3s ease;
            border: 4px solid #fff;
        }

        .whatsup:hover {
            background-color: #128C7E;
            transform: translateY(-2px) translateX(4px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.4);

        }

        .ig {
            background: linear-gradient(45deg,
                    #405DE6,
                    #5851DB,
                    #833AB4,
                    #C13584,
                    #E1306C,
                    #FD1D1D,
                    #F56040,
                    #F77737,
                    #FCAF45,
                    #FFDC80);
            animation: gradientShift 10s ease infinite;
            color: #fff;
            font-weight: bold;
            border-radius: 25px;
            transition: all 0.3s ease;
            width: fit-content;
            height: auto;
            padding: 15px;
            border: 4px solid #fff;
        }

        .ig:hover {
            background-size: 150% 150%;
            transform: translateY(-2px) translateX(4px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.4);
        }

        .contact-sidebar {
            background-color: #f5e6d3;
            padding: 40px;
            padding-top: 0;
            border-radius: 10px;
            width: 400px;
            height: fit-content;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.3);
        }

        .contact-info h3 {
            color: #333;
            font-size: 20px;
            margin-bottom: 10px;
        }

        .number {
            font-size: 32px;
            font-weight: bold;
            margin-bottom: 30px;
            color: #6c3b16;
        }

        .contact-method {
            margin: 20px 0;
            display: flex;
            gap: 15px;
            align-items: flex-start;
            font-size: 18px;
        }

        .contact-method span {
            font-size: 24px;
        }

        .contact-method small {
            color: #666;
            font-size: 14px;
            display: block;
            margin-top: 5px;
        }

        .form-container {
            flex: 1;
            max-width: 900px;
            padding: 40px;
            border-radius: 10px;
            background-color: #f5e6d3;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.3);
        }

        .form-group {
            margin-bottom: 25px;
            display: flex;
            align-items: center;
            gap: 30px;

        }

        .form-group label {
            color: #333;
            min-width: 150px;
            text-align: right;
            font-size: 18px;
        }

        .form-group input,
        .form-group textarea {
            flex: 1;
            padding: 15px 20px;
            border: 2px solid #ddd;
            border-radius: 15px;
            background-color: rgb(242, 247, 255);
            font-size: 16px;
            transition: border-color 0.3s;
        }

        .form-group input:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: #6c3b16;
        }

        .form-group textarea {
            height: 200px;
            resize: vertical;
        }

        .form-group.message-group {
            align-items: flex-start;
        }

        .form-group.message-group label {
            margin-top: 15px;
        }

        .send-button {
            background-color: #f5e6d3;
            color: #6c3b16;
            border: 2px solid #6c3b16;
            padding: 15px 40px;
            border-radius: 15px;
            cursor: pointer;
            font-size: 18px;
            transition: background-color 0.3s, transform 0.2s;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            font-size: 1.5rem;
        }

        .send-button:hover {
            background-color: #6c3b16;
            transform: translateY(-2px) translateX(5px);
            color: #f5e6d3;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.8);
        }

        .social-links h3 {
            color: #333;
            font-size: 20px;
            margin: 35px 0 15px 0;
        }

        .social-link {
            display: flex;
            align-items: center;
            gap: 15px;
            text-decoration: none;
            color: #333;
            font-size: 18px;
            padding: 10px;
            border-radius: 15px;
            transition: background-color 0.3s;
        }

        .social-link:hover {
            background-color: rgba(108, 59, 22, 0.1);
        }

        input::placeholder,
        textarea::placeholder {
            color: #999;
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
    <a href="index.php?c=Auth&a=aboutuspage">About Us</a>
    <a href="index.php?c=Auth&a=orderpage">Order</a>
    <a href="index.php?c=Auth&a=contactpage">Contact</a>
   </div>
   <div class="icons">
    <a href="index.php?c=Auth&a=index" class="fas fa-user">
      </a>
    <i class="fas fa-shopping-basket"></i>
   </div>
  </div>
    <div class="k">
        <img alt="Bakery Image" src="view/aset/gambar/contact us.jpg" />
        <div class="text">
            <div class="contact-title">Contact Us</div>
            <p>
                If you have any questions, feedback, or need assistance, please don't hesitate to reach out to our team.
                We're here to help you anytime and will respond as quickly as possible. Additionally, we love hearing
                your suggestions and feedback to continuously improve our services.
            </p>
        </div>
    </div>



    <div class="container">
        <div class="contact-sidebar">
            <div class="contact-info">
                <h3>Hotline</h3>
                <div class="number">1500581</div>
            </div>

            <div class="contact-method">
                <span>
                    <img src="view/aset/gambar/phone.svg" alt="phone">
                </span>
                <div>+62812 1314 1500</div>
            </div>

            <div class="contact-method">
                <span>
                    <img src="view/aset/gambar/message.svg" alt="message">
                </span>
                <div>
                    info@riracake.com
                    <small>(For Inquiries)</small>
                </div>
            </div>

            <div>
                <h3>Find Us On</h3>
                <div class="form-logo">
                    <div class="whatsup">
                        <a href="https://wa.me/6281358128401">
                            <img src="view/aset/gambar/whatsapp.svg" alt="">
                        </a>
                    </div>

                    <div class="ig">
                        <a href="https://www.instagram.com/jabalelthoriq?igsh=d2hwMmR1ODQyZ3l4">
                            <img src="view/aset/gambar/instagram.svg" alt="">
                        </a>
                    </div>

                    <a href="#" class="social-link">
                        <span>📸</span>
                        <span>@RiraCakeOfficial</span>
                    </a>
                </div>
            </div>
        </div>


        <div class="map">
            <h3>Find us on map</h3>
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d8203.180626654344!2d113.7224550261931!3d-8.160107184783222!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd695b617d8f623%3A0xf6c4437632474338!2sPoliteknik%20Negeri%20Jember!5e0!3m2!1sid!2sid!4v1729883989113!5m2!1sid!2sid"
                allowfullscreen="" ; loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

        </div>


        <div class="form-container">
            <form action="process.php" method="post">
                <div class="form-group">
                    <label>Your Name</label>
                    <input type="text" name="name" placeholder="Masukkan Nama Anda" required>
                </div>

                <div class="form-group">
                    <label>Mobile Number</label>
                    <input type="tel" name="mobile" placeholder="+62" required>
                </div>

                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" placeholder="Masukkan Email Anda" required>
                </div>

                <div class="form-group">
                    <label>Subject</label>
                    <input type="text" name="subject" placeholder="Masukkan Subjek" required>
                </div>

                <div class="form-group message-group">
                    <label>Message</label>
                    <textarea name="message" placeholder="Masukkan Pesan" required></textarea>
                </div>

                <button type="submit" class="send-button">Submit</button>
            </form>
        </div>
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

</body>

</html>