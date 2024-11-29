<?php
require_once 'index2.php';

$response = array();

if ($db) {
    $nama = isset($_POST['nama']) ? trim($_POST['nama']) : null;
    $password = isset($_POST['password']) ? trim($_POST['password']) : null;

    // Memeriksa apakah input ada dan tidak kosong
    if ($nama && $password) {
        $query = "SELECT * FROM pengguna WHERE nama = :nama AND password = :password";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':nama', $nama);
        $stmt->bindParam(':password', $password);
        $stmt->execute();
        
        $row = $stmt->rowCount();

        if ($row > 0) {
            array_push($response, array('status' => 'OK')); // Output OK jika login berhasil
        } else {
            array_push($response, array('status' => 'FAILED'));
        }
    } else {
        array_push($response, array('status' => 'Failed', 'message' => 'Input tidak boleh kosong'));
    }
} else {
    array_push($response, array('status' => 'Failed'));
}

echo json_encode(array("server_response" => $response));
$db = null;
?>