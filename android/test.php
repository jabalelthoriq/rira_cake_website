<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = isset($_POST['nama']) ? trim($_POST['nama']) : null;
    $email = isset($_POST['email']) ? trim($_POST['email']) : null;
    $password = isset($_POST['password']) ? trim($_POST['password']) : null;
    $telepon = isset($_POST['telepon']) ? trim($_POST['telepon']) : null;
    $alamat = isset($_POST['alamat']) ? trim($_POST['alamat']) : null;

    echo "Nama: $nama<br>";
    echo "Email: $email<br>";
    echo "Password: $password<br>";
    echo "Telepon: $telepon<br>";
    echo "Alamat: $alamat<br>";
} else {
?>
    <form action="insertr.php" method="POST">
        <input type="text" name="nama" placeholder="Nama" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <input type="number" name="telepon" placeholder="telepon" required>
        <input type="text" name="alamat" placeholder="alamat" required>
        <button type="submit">Kirim</button>
    </form>
<?php
}
?> 