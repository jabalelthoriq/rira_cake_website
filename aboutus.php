<html>
<style>
  .contact-us {
    margin-top: 30px;
    display: flex;
    gap: 20px;
    justify-content: center;
}

button {
    padding: 10px 20px;
    border-radius: 25px;
    font-size: 16px;
    transition: background-color 0.3s ease;
    border: none;
    cursor: pointer;
    color: #fff;
}

/* WhatsApp button (Hijau) */
.whatsapp-link {
    background-color: #25D366;
}

.whatsapp-link:hover {
    background-color: #20b857;
}

/* Instagram button (Pink) */
.instagram-link {
    background-color: #E1306C;
}

.instagram-link:hover {
    background-color: #c82a5b;
}

/* Email button (Coklat Muda) */
.email-link {
    background-color: #D2B48C;
}

.email-link:hover {
    background-color: #b59270;
}
</style>

<head>
  <title>Rira Cake Cafe & Bakery</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="nav.css">
</head>
<body>
  <div class="navbar">
    <div>
      <a href="home.php">
        <img class="logo" alt="Rica Cake Logo" height="40" src="aset/gambar/logoweb.png" width="40" />
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
  <div class="king">
    <img alt="Bakery Image" src="aset/gambar/fresh-baked-gourmet-desserts-sweet-indulgence-generated-by-ai 1 (1).png" />
    <div class="text">
      <h1>Rira Cake.</h1>
      <p>
        Where the sweetness of homemade delicacies meets artisanal
        craftsmanship, offering a delectable and heartwarming cake experience
        for every occasion.
      </p>
    </div>
  </div>

  <div class="quote-section">
    <p class="quote">
      “We believe that every slice of cake brings a sweet, unforgettable
      moment to anyone who enjoys it.”
    </p>
    <p class="author">Syafriatus S., Director of Rira Cake</p>
  </div>

  <div class="map-section">
    <h2>Find us on Map</h2>
    <iframe
      src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3949.424154373322!2d113.72049301127193!3d-8.15994978172228!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd695b617d8f623%3A0xf6c4437632474338!2sPoliteknik%20Negeri%20Jember!5e0!3m2!1sid!2sid!4v1726996903102!5m2!1sid!2sid"
      width="350" height="200" style={{ border: 0 }} allowFullScreen={true} loading="lazy"></iframe>
  </div>

  <div class="contact-us">
    <button class="whatsapp-link" onclick="window.open('https://wa.me/+6282145483984', '_blank')">WhatsApp</button>
    <button class="instagram-link"
      onclick="window.open('https://www.instagram.com/annisaakrs_/profilecard/?igsh=MWhla3h0YTB0ZTNkYw==', '_blank')">Instagram
      Kami</button>
    <button class="email-link" onclick="window.location.href='mailto:annisaikrimatus@gmail.com'">Email Kami</button>
</div>
</body>
</html>
