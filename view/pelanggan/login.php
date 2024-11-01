

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Rira Cake</title>
  <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
  <link rel="stylesheet" href="style.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head> 
<body class="body1">

  <div class="container" id="container">

    <div id="register_panel" class="form-container register-container">
      <form method="post" action="index.php?c=Auth&a=register" enctype="multipart/form-data">
        <h1>Register </h1>
        <input type="text" id="nama" name="nama" placeholder="Username" required>
        <input type="email" id="email" name="email" placeholder="Email" required>
        <input type="password" id="password" name="password" placeholder="Password" required>
        <input type="number" id="telepon" name="telepon" placeholder="Telepon" required>
        <input type="text" id="alamat" name="alamat" placeholder="Alamat" required>
        <button type="submit">Register</button>
      </form>
    </div>

    <div class="form-container login-container">
      <form method="post" action="index.php?c=Auth&a=login">
        <h1>Login </h1>
        <input type="text" id="nama" name="nama" placeholder="Username">
        <input type="password" id="password" name="password" placeholder="Password">
        <button type="submit"  name="login-button" id="login-button">Login</button>
      </form>
    </div>

    <div class="overlay-container">
      <div class="overlay">
        <div class="overlay-panel overlay-left">
          <h1 class="title2">Start your <br> journey</h1>
          <p>Create your Rira Cake account for exclusive discounts, personalized recommendations, and faster checkouts. Sweet perks await! 🍰✨</p>
          <button class="ghost" id="login">Login
            <i class="lni lni-arrow-left login"></i>
          </button>
        </div>
        <div class="overlay-panel overlay-right">
          <h1 class="title1">Rira <br> Cake</h1>
          <p>Welcome to Rira Cake! Every bite is a delightful experience. Come for the sweets, stay for the magic. 🍰✨</p>
          <button class="ghost" id="register">Register
            <i class="lni lni-arrow-right register"></i>
          </button>
        </div>
      </div>
    </div>

  </div>

  <script src="script.js"></script>
  
</body>
</html>
  