<?php
require_once 'index2.php';

$response = array();

// Pastikan koneksi database berhasil
if ($db) {
    // Debugging: Tampilkan isi dari $_POST
    error_log("Isi dari \$_POST: " . print_r($_POST, true)); // Menyimpan log ke file error log

    // Menggunakan isset untuk menghindari undefined index
    $nama = isset($_POST['nama']) ? trim($_POST['nama']) : null;
    $email = isset($_POST['email']) ? trim($_POST['email']) : null;
    $password = isset($_POST['password']) ? trim($_POST['password']) : null;
    $telepon = isset($_POST['telepon']) ? trim($_POST['telepon']) : null;
    $alamat = isset($_POST['alamat']) ? trim($_POST['alamat']) : null;

    // Debugging: Tampilkan nilai variabel
    error_log("Nama: $nama, Email: $email, Password: $password, Telepon: $telepon, Alamat: $alamat");

    // Memeriksa apakah semua input ada dan tidak kosong
    if ($nama && $email && $password && $telepon && $alamat) {
        // Query untuk memasukkan data ke tabel pengguna
        $query = "INSERT INTO pengguna (nama, email, password, telepon, alamat) VALUES (:nama, :email, :password, :telepon, :alamat)";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':nama', $nama);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':telepon', $telepon);
        $stmt->bindParam(':alamat', $alamat);

        // Eksekusi query dan periksa hasilnya
        if ($stmt->execute()) {
            array_push($response, array('status' => 'OK')); // Output OK jika berhasil
        } else {
            array_push($response, array('status' => 'Failed', 'message' => 'Gagal mengeksekusi query: ' . implode(", ", $stmt->errorInfo())));
        }
    } else {
        // Jika input tidak valid, kembalikan respons JSON
        array_push($response, array('status' => 'Failed', 'message' => 'Input tidak boleh kosong'));
    }
} else {
    // Jika koneksi database gagal
    array_push($response, array('status' => 'Failed', 'message' => 'Koneksi database gagal'));
}

// Mengembalikan respons dalam format JSON
header('Content-Type: application/json'); // Pastikan header diatur untuk JSON
echo json_encode(array("server_response" => $response));

// Menutup koneksi PDO
$db = null;
?>