<?php
session_start();
echo '<link rel="stylesheet" type="text/css" href="style.css">';

if (isset($_POST['login-button'])) {
    // Ambil data dari form dan sanitasi
    $username = htmlspecialchars(trim($_POST['username']));
    $password = htmlspecialchars(trim($_POST['password']));

    // Verifikasi username, email, dan password
    // Contoh sederhana, sebaiknya gunakan database untuk menyimpan dan memverifikasi pengguna
    $validUsername = 'E41231544';
    $validPasswordHash = password_hash('jabal', PASSWORD_DEFAULT); // Simulasi password hash

    // Cek kredensial
    if ($username === $validUsername && password_verify($password, $validPasswordHash)) {
        $_SESSION['user'] = $username;
        header("Location: home.php"); // Redirect ke halaman dashboard jika login berhasil
        exit();
    } else {
        echo "<script type='text/javascript'>
                alert('Login Gagal :( ');
                window.location.href = 'index.php';
              </script>";
        return;
    }
}
?>