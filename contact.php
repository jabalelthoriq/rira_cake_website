<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - Rira Cake</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="nav.css">
    <style>


        

        

        .container {
            margin: 0 auto;
            width: 90%;
            margin-top: 5px;
            display: flex;
            justify-content: space-evenly;
            padding: 20px;
            flex-wrap: wrap;
            gap: 30px;
            box-shadow: 0 0 0 rgba(0,0,0,0.0);
            background-color: #f5e6d3;
             
        }

        .map {
            position: absolute ;
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

        .map h3{
            color: #333;
            font-size: 20px;
            margin-bottom: 10px;
        }

        .map iframe{
            border-radius: 10px;
            width:100%; 
            height:230px; 
            style:border:0; 
        }

        .form-logo{
            display: flex;
            gap: 16px;
            padding: 16px;
            justify-content: flex-end; 
            max-width: 1200px;
            margin: 0 auto;
            padding-top: 0;
        }
        .whatsup{
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

        .whatsup:hover{
            background-color: #128C7E;
            transform: translateY(-2px) translateX(4px);
            box-shadow: 0 4px 8px rgba(0,0,0,0.4);
            
        }

        .ig{
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
        transform: translateY(-2px) translateX(4px) ;
        box-shadow: 0 4px 8px rgba(0,0,0,0.4);
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
            background-color: #f5e6d3 ;
            color: #6c3b16 ;
            border: 2px solid #6c3b16;
            padding: 15px 40px;
            border-radius: 15px;
            cursor: pointer;
            font-size: 18px;
            transition: background-color 0.3s, transform 0.2s;
            box-shadow:  0 4px 8px rgba(0,0,0,0.2);
            font-size: 1.5rem;
        }

        .send-button:hover {
            background-color: #6c3b16;
            transform: translateY(-2px) translateX(5px);
            color: #f5e6d3;
            box-shadow:  0 4px 8px rgba(0,0,0,0.8);
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
    <a href="index.php" class="fas fa-user">
      </a>
    <i class="fas fa-shopping-basket"></i>
   </div>
  </div>


  <div class="k" >
      <img
        alt="Bakery Image"
        src="aset/gambar/contact us.jpg"
      />
      <div class="text">
      <div class="contact-title">Contact Us</div>
        <p>
        If you have any questions, feedback, or need assistance, please don't hesitate to reach out to our team. We're here to help you anytime and will respond as quickly as possible. Additionally, we love hearing your suggestions and feedback to continuously improve our services.
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
                    <img src="aset/gambar/phone.svg" alt="phone">
                </span>
                <div>+62812 1314 1500</div>
            </div>
            
            <div class="contact-method">
                <span>
                    <img src="aset/gambar/message.svg" alt="message">
                </span>
                <div>
                    info@riracake.com
                    <small>(For Inquiries)</small>
                </div>
            </div>
            
            <div >
                <h3>Find Us On</h3>
                <div class="form-logo">
                <div class="whatsup" >
                <a href = "https://wa.me/6281358128401" >
                    <img src="aset/gambar/whatsapp.svg" alt="">
                </a>
                </div>

                <div class="ig" >
                <a href = "https://www.instagram.com/jabalelthoriq?igsh=d2hwMmR1ODQyZ3l4" >
                    <img src="aset/gambar/instagram.svg" alt="">
                </a>
                </div>

                <a href="#" class="social-link">
                    <span>📸</span>
                    <span>@RiraCakeOfficial</span>
                </a>
                </div>
            </div>
        </div>


        <div class="map" >
        <h3>Find us on map</h3>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d8203.180626654344!2d113.7224550261931!3d-8.160107184783222!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd695b617d8f623%3A0xf6c4437632474338!2sPoliteknik%20Negeri%20Jember!5e0!3m2!1sid!2sid!4v1729883989113!5m2!1sid!2sid" allowfullscreen="" ; loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

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
   
</body>
</html>