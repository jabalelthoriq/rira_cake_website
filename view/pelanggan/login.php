<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Rira Cake</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
  <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
  <link rel="stylesheet" href="style.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<style>
  * {
  box-sizing: border-box;
}

.body1 {
  display: flex;
  background-color: #F8EDE3;
  justify-content: center;
  align-items: center;
  flex-direction: column;
  font-family: "Poppins", sans-serif;
  overflow: hidden;
  height: 100vh;
}

h1 {
  font-weight: 700;
  letter-spacing: -1.5px;
  margin: 0;
  margin-bottom: 15px;
}

h1.title1 {
  font-size: 70px;
  line-height: 60px;
  margin: 0;
  text-shadow: 0 0 10px rgba(16, 64, 74, 0.5);
}

h1.title2 {
  font-size: 60px;
  line-height: 60px;
  margin: 0;
  text-shadow: 0 0 10px rgba(16, 64, 74, 0.5);
}

p {
  font-size: 14px;
  font-weight: 100;
  line-height: 20px;
  letter-spacing: 0.5px;
  margin: 20px 0 30px;
  text-shadow: 0 0 10px rgba(16, 64, 74, 0.5);
}

span {
  font-size: 14px;
  margin-top: 25px;
}

a {
  color: #333;
  font-size: 14px;
  text-decoration: none;
  margin: 15px 0;
  transition: 0.3s ease-in-out;
}

a:hover {
  color: #FFE7CA;
}

.content {
  display: flex;
  width: 100%;
  height: 50px;
  align-items: center;
  justify-content: space-around;
}

.content .checkbox {
  display: flex;
  align-items: center;
  justify-content: center;
}

.content input {
  accent-color: #333;
  width: 12px;
  height: 12px;
}

.content label {
  font-size: 14px;
  user-select: none;
  padding-left: 5px;
}

button {
  position: relative;
  border-radius: 20px;
  border: 1px solid #4D290E;
  background-color: #4D290E;
  color: #ffffff;
  font-size: 15px;
  font-weight: 700;
  margin: 10px;
  padding: 12px 80px;
  letter-spacing: 1px;
  text-transform: capitalize;
  transition: 0.3s ease-in-out;
}

button:hover {
  letter-spacing: 3px;
}

button:active {
  transform: scale(0.95);
}

button:focus {
  outline: none;
}

button.ghost {
  background-color: rgba(225, 225, 225, 0.2);
  border: 2px solid #fff;
  color: #FFE7CA;
}

button.ghost i{
  position: absolute;
  opacity: 0;
  transition: 0.3s ease-in-out;
}

button.ghost i.register{
  right: 70px;
}

button.ghost i.login{
  left: 70px;
}

button.ghost:hover i.register{
  right: 40px;
  opacity: 1;
}

button.ghost:hover i.login{
  left: 40px;
  opacity: 1;
}

form {
  background-color: #fff;
  display: flex;
  align-items: center;
  justify-content: center;
  flex-direction: column;
  padding: 0 50px;
  height: 100%;
  text-align: center;
}

input {
  background-color: #eee;
  border-radius: 10px;
  border: none;
  padding: 12px 15px;
  margin: 8px 0;
  width: 100%;
}

.container {
  background-color: #fff;
  border-radius: 25px;
  box-shadow: 0 14px 28px rgba(0, 0, 0, 0.25), 0 10px 10px rgba(0, 0, 0, 0.22);
  position: relative;
  overflow: hidden;
  width: 768px;
  max-width: 100%;
  min-height: 500px;
}

.form-container {
  position: absolute;
  top: 0;
  height: 100%;
  transition: all 0.6s ease-in-out;
}

.login-container {
  left: 0;
  width: 50%;
  z-index: 2;
}

.container.right-panel-active .login-container {
  transform: translateX(100%);
}

.register-container {
  left: 0;
  width: 50%;
  opacity: 0;
  z-index: 1;
}

.container.right-panel-active .register-container {
  transform: translateX(100%);
  opacity: 1;
  z-index: 5;
  animation: show 0.6s;
}

@keyframes show {
  0%,
  49.99% {
    opacity: 0;
    z-index: 1;
  }

  50%,
  100% {
    opacity: 1;
    z-index: 5;
  }
}

.overlay-container {
  
  position: absolute;
  top: 0;
  left: 50%;
  width: 50%;
  height: 100%;
  overflow: hidden;
  transition: transform 0.6s ease-in-out;
  z-index: 100;
}

.container.right-panel-active .overlay-container {
  transform: translate(-100%);
}

.overlay {
  background-image: url('view/aset/gambar/roti.jpg');
  background-repeat: no-repeat;
  background-size: cover;
  background-position: 0 0;
  color: #FFE7CA;
  position: relative;
  left: -100%;
  height: 100%;
  width: 200%;
  transform: translateX(0);
  transition: transform 0.6s ease-in-out;
}

.overlay::before {
  content: "";
  position: absolute;
  left: 0;
  right: 0;
  top: 0;
  bottom: 0;
  background: linear-gradient(
    to top,
    rgba(46, 94, 109, 0.4) 40%,
    rgba(46, 94, 109, 0)
  );
}

.container.right-panel-active .overlay {
  transform: translateX(50%);
}

.overlay-panel {
  position: absolute;
  display: flex;
  align-items: center;
  justify-content: center;
  flex-direction: column;
  padding: 0 40px;
  text-align: center;
  top: 0;
  height: 100%;
  width: 50%;
  transform: translateX(0);
  transition: transform 0.6s ease-in-out;

}

.overlay-left {
  transform: translateX(-20%);
  
}

.container.right-panel-active .overlay-left {
  transform: translateX(0);
}

.overlay-right {
  right: 0;
  transform: translateX(0);
}

.container.right-panel-active .overlay-right {
  transform: translateX(20%);
}

.social-container {
  margin: 20px 0;
}

.social-container a {
  border: 1px solid #dddddd;
  border-radius: 50%;
  display: inline-flex;
  justify-content: center;
  align-items: center;
  margin: 0 5px;
  height: 40px;
  width: 40px;
  transition: 0.3s ease-in-out;
}

.social-container a:hover {
  border: 1px solid #FFE7CA;
}

.image {
  width: 10%; 
  height: auto; 
  margin: 0;
  padding: 0;
}

.body2 {
  background: url(aset/gambar/roti.jpg);
  background-position: center;
  background-size: cover;
  background-repeat: no-repeat;
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
    color: white;
}
.navbar .icons i {
    color: #FFFFFF;
    font-size: 20px;
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
    <a href="index.php?c=Auth&a=productpage">Order</a>
    <a href="index.php?c=Auth&a=contactpage">Contact</a>
   </div>
   <div class="icons">
    <a href="index.php?c=Auth&a=index" class="fas fa-user">
      </a>
    <i class="fas fa-shopping-basket"></i>
   </div>
  </div>
<div class="body1">
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
        <input type="text" id="nama" name="nama" placeholder="Username" required>
        <input type="password" id="password" name="password" placeholder="Password" required>
        <button type="submit" name="login-button" id="login-button" >Login</button>
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
  </div>
  <script>
    const registerButton = document.getElementById("register");
    const loginButton = document.getElementById("login");
    const container = document.getElementById("container");

    registerButton.addEventListener("click", () => {
        container.classList.add("right-panel-active");
    });

    loginButton.addEventListener("click", () => {
        container.classList.remove("right-panel-active");
       
    });

    // // Check for login success or error messages
    // <?php if (isset($_SESSION['login_success'])): ?>
    //     Swal.fire({
    //         title: 'Success!',
    //         text: '<?php echo $_SESSION['login_success']; ?>',
    //         icon: 'success',
    //         confirmButtonText: 'OK'
    //     });
    //     <?php unset($_SESSION['login_success']); // Clear the session variable ?>
    // <?php elseif (isset($_SESSION['login_error'])): ?>
    //     Swal.fire({
    //         title: 'Error!',
    //         text: '<?php echo $_SESSION['login_error']; ?>',
    //         icon: 'error',
    //         confirmButtonText: 'OK'
    //     });
    //     <?php unset($_SESSION['login_error']); // Clear the session variable ?>
    // <?php endif; ?>

    
  </script>
  
</body>
</html>
  