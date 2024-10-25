<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - Rira Cake</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background-color: white;
        }

        .navbar {
            background-color: #6c3b16;
            padding: 15px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            width: 40px;
            height: 40px;
        }

        .nav-links {
            display: flex;
            gap: 30px;
        }

        .nav-links a {
            color: white;
            text-decoration: none;
            font-size: 16px;
        }

        .icons {
            color: white;
            display: flex;
            gap: 20px;
            font-size: 18px;
        }

        .contact-title {
            text-align: center;
            color: black;
            font-size: 42px;
            margin: 50px 0;
            font-weight: bold;
        }

        .container {
            display: flex;
            max-width: 1400px;
            margin: 0 auto;
            gap: 60px;
            padding: 0 40px;
        }

        .contact-sidebar {
            background-color: rgb(242, 247, 255);
            padding: 40px;
            border-radius: 25px;
            width: 400px;
            height: fit-content;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
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
            border: 1px solid #ddd;
            padding: 40px;
            border-radius: 25px;
            background-color: white;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
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
            background-color: #6c3b16;
            color: white;
            border: none;
            padding: 15px 40px;
            border-radius: 15px;
            cursor: pointer;
            margin-left: 180px;
            font-size: 18px;
            transition: background-color 0.3s, transform 0.2s;
        }

        .send-button:hover {
            background-color: #8b4b1d;
            transform: translateY(-2px);
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
    </style>
</head>
<body>
    <div class="navbar">
        <div>
            <a href="home.php">
                <img class="logo" src="/api/placeholder/40/40" alt="Rica Cake Logo">
            </a>
        </div>
        <div class="nav-links">
            <a href="aboutus.php">About Us</a>
            <a href="order.php">Order</a>
            <a href="contact.php">Contact</a>
        </div>
        <div class="icons">
            <span>👤</span>
            <span>🛒</span>
        </div>
    </div>

    <div class="contact-title">Contact Us</div>

    <div class="container">
        <div class="contact-sidebar">
            <div class="contact-info">
                <h3>Hotline</h3>
                <div class="number">1500581</div>
            </div>
            
            <div class="contact-method">
                <span>📱</span>
                <div>+62812 1314 1500</div>
            </div>
            
            <div class="contact-method">
                <span>✉️</span>
                <div>
                    info@riracake.com
                    <small>(For Inquiries)</small>
                </div>
            </div>
            
            <div class="social-links">
                <h3>Find Us On</h3>
                <a href="#" class="social-link">
                    <span>📸</span>
                    <span>@RiraCakeOfficial</span>
                </a>
            </div>
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