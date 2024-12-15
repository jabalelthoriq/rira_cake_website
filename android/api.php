<?php
// Database connection
$servername = "localhost";
$username = "root"; // Use your DB username
$password = ""; // Use your DB password
$dbname = "rira_cake"; // Use your DB name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Read the request parameters
$action = isset($_GET['action']) ? $_GET['action'] : '';

// Perform the action based on the 'action' parameter
switch ($action) {
//     case 'login':
//         // loginUser($conn);
//         break;
//     case 'register':
//         registerUser($conn);
//         break;
    case 'get_produk':
        getProduk($conn);
        break;

        case 'fav_produk':
            favProduk($conn);
            break;
            case 'transaksi':
                transaksi($conn);
                break;
    default:
        echo json_encode(['status' => 'error', 'message' => 'Invalid action']);
        break;
}

// Login function
// function loginUser($conn) {
//     $data = json_decode(file_get_contents("php://input"));

//     if (!isset($data->username) || !isset($data->password)) {
//         echo json_encode(['status' => 'error', 'message' => 'Username and password are required']);
//         return;
//     }

//     $username = $data->username;
//     $password = $data->password;

//     $stmt = $conn->prepare("SELECT customer_id, password FROM customers WHERE username = ?");
//     $stmt->bind_param("s", $username);
//     $stmt->execute();
//     $stmt->store_result();

//     if ($stmt->num_rows == 0) {
//         echo json_encode(['status' => 'error', 'message' => 'Invalid username or password']);
//         return;
//     }

//     $stmt->bind_result($id, $hashed_password);
//     $stmt->fetch();

//     if (password_verify($password, $hashed_password)) {
//         echo json_encode(['status' => 'success', 'message' => 'Login successful', 'user_id' => $id]);
//     } else {
//         echo json_encode(['status' => 'error', 'message' => 'Invalid username or password']);
//     }

//     $stmt->close();
// }

// Register function
// function registerUser($conn) {
//     $data = json_decode(file_get_contents("php://input"));

//     if (!isset($data->fullname) || !isset($data->email) || !isset($data->username) || !isset($data->password)) {
//         echo json_encode(['status' => 'error', 'message' => 'Fullname, email, username, and password are required']);
//         return;
//     }

//     $fullname = $data->fullname;
//     $email = $data->email;
//     $username = $data->username;
//     $password = $data->password;

//     $stmt = $conn->prepare("SELECT customer_id FROM customers WHERE username = ? OR email = ?");
//     $stmt->bind_param("ss", $username, $email);
//     $stmt->execute();
//     $stmt->store_result();

//     if ($stmt->num_rows > 0) {
//         echo json_encode(['status' => 'error', 'message' => 'Username or Email already in use']);
//         return;
//     }

//     $hashed_password = password_hash($password, PASSWORD_DEFAULT);

//     $stmt = $conn->prepare("INSERT INTO customers (fullname, email, username, password) VALUES (?, ?, ?, ?)");
//     $stmt->bind_param("ssss", $fullname, $email, $username, $hashed_password);

//     if ($stmt->execute()) {
//         echo json_encode(['status' => 'success', 'message' => 'Registration successful']);
//     } else {
//         echo json_encode(['status' => 'error', 'message' => 'Registration error']);
//     }

//     $stmt->close();
// }


function getProduk($conn) {
    $sql = "SELECT id, nama, harga,  image FROM produk"; // Replace with your table/column names
    $result = $conn->query($sql);

    // Array to hold items data
    $items = array();

    if ($result->num_rows > 0) {
        // Fetch all items from the database
        while ($row = $result->fetch_assoc()) {
            $item = array(
                'id' => $row['id'],
                'nama' => $row['nama'],
                'harga' => $row['harga'],
                'image' => base64_encode($row['image']), // Encode BLOB as Base64
            );
            array_push($items, $item);
        }
        
        // Return the items data as JSON
        echo json_encode($items);
    } else {
        // No items found
        echo json_encode([]);
    }
}

function favProduk($conn) {
    $sql = "SELECT id, nama, harga, deskripsi, image FROM produk ORDER BY stok ASC LIMIT 4"; // Replace with your table/column names
    $result = $conn->query($sql);

    // Array to hold items data
    $items = array();

    if ($result->num_rows > 0) {
        // Fetch all items from the database
        while ($row = $result->fetch_assoc()) {
            $item = array(
                'id' => $row['id'],
                'nama' => $row['nama'],
                'harga' => $row['harga'],
                'deskripsi' => $row['deskripsi'],
                'image' => base64_encode($row['image']), // Encode BLOB as Base64
            );
            array_push($items, $item);
        }
        
        // Return the items data as JSON
        echo json_encode($items);
    } else {
        // No items found
        echo json_encode([]);
    }
}

function transaksi($conn) {
    // Enable error reporting
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    // Validasi input
    if (!isset($_POST['nama']) || !isset($_POST['email']) || 
        !isset($_POST['kode_bank']) || !isset($_POST['total_harga']) || 
        !isset($_POST['tanggal_pesanan']) || !isset($_FILES['image'])) {
        echo json_encode([
            "success" => false, 
            "message" => "Semua field harus diisi"
        ]);
        return;
    }

    // Cek apakah file diupload
    if (!isset($_FILES['image']) || $_FILES['image']['error'] !== UPLOAD_ERR_OK) {
        echo json_encode([
            "success" => false, 
            "message" => "File gambar tidak diupload atau terjadi kesalahan saat mengupload."
        ]);
        return;
    }

    // Ambil data dari POST
    $username = trim($_POST['nama']);
    $email = trim($_POST['email']);
    $bank = trim($_POST['kode_bank']);
    $total = trim($_POST['total_harga']);
    $tanggal = trim($_POST['tanggal_pesanan']);

    // Validasi file upload
    $target_dir = "../payment/";
    
    // Pastikan direktori uploads ada
    if (!is_dir($target_dir)) {
        if (!mkdir($target_dir, 0755, true)) {
            echo json_encode([
                "success" => false, 
                "message" => "Gagal membuat direktori upload"
            ]);
            return;
        }
    }

    // Cek apakah file adalah gambar valid
    $allowedTypes = ['jpg', 'jpeg', 'png', 'gif'];
    $imageFileType = strtolower(pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION));
    
    if (!in_array($imageFileType, $allowedTypes)) {
        echo json_encode([
            "success" => false, 
            "message" => "Tipe file tidak diizinkan. Hanya JPG, JPEG, PNG & GIF yang diperbolehkan."
        ]);
        return;
    }

    // Validasi ukuran file (maks 5MB)
    if ($_FILES["image"]["size"] > 5000000) {
        echo json_encode([
            "success" => false, 
            "message" => "Ukuran file terlalu besar. Maks 5MB."
        ]);
        return;
    }

    // Generate unique filename
    $target_file = $target_dir . uniqid() . "." . $imageFileType;

    // Upload file
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        try {
            // Persiapkan statement SQL dengan mysqli
            $stmt = $conn->prepare("INSERT INTO pesanan (nama, email, total_harga, kode_bank, image, tanggal_pesanan, id_user) VALUES (?, ?, ?, ?, ?, ?, ?)");
            
            // Binding parameter dengan mysqli
            $id_user = 0; // Ganti dengan metode yang sesuai
            $stmt->bind_param("ssdsssi", $username, $email, $total, $bank, $target_file, $tanggal, $id_user);

            // Eksekusi query
            if ($stmt->execute()) {
                echo json_encode([
                    "success" => true, 
                    "message" => "Transaksi berhasil",
                    "file" => $target_file
                ]);
            } else {
                // Hapus file yang sudah diupload jika query gagal
                unlink($target_file);
                echo json_encode([
                    "success" => false, 
                    "message" => "Gagal menyimpan pesanan: " . $stmt->error
                ]);
            }

            $stmt->close();
        } catch(Exception $e) {
            // Hapus file yang sudah diupload jika terjadi error
            unlink($target_file);
            echo json_encode([
                "success" => false, 
                "message" => "Error: " . $e->getMessage()
            ]);
        }
    } else {
        echo json_encode([
            "success" => false, 
            "message" => "Gagal mengupload file"
        ]);
    }
}



$conn->close();
?>