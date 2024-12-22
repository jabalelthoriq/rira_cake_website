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
    case 'login':
        loginUser($conn);
        break;
    case 'register':
        registerUser($conn);
        break;
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


function loginUser($conn) {
    // Set header to return JSON response
    header('Content-Type: application/json');
    
    // Check connection
    if ($conn->connect_error) {
        http_response_code(500);
        echo json_encode(["error" => "Koneksi ke database gagal: " . $conn->connect_error]);
        exit;
    }
    
    // Inisialisasi respon
    $response = array();
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Ambil data dari POST
        $nama = isset($_POST['nama']) ? trim($_POST['nama']) : '';
        $password = isset($_POST['password']) ? $_POST['password'] : '';
        
        // Validasi input
        if (empty($nama) || empty($password)) {
            $response['success'] = false;
            $response['message'] = "Username dan password tidak boleh kosong!";
        } else {
            // Query untuk mengambil data user berdasarkan username saja
            $query = "SELECT * FROM pengguna WHERE nama = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("s", $nama);
            $stmt->execute();
            $result = $stmt->get_result();
            
            if ($result->num_rows > 0) {
                $user = $result->fetch_assoc();
                // Verifikasi password yang di-hash
                if (password_verify($password, $user['password'])) {
                    $response['success'] = true;
                    $response['message'] = "Login berhasil!";
                    $response['user'] = array(
                        'id_user' => $user['id_user'],
                        'nama' => $user['nama'],
                    );
                } else {
                    $response['success'] = false;
                    $response['message'] = "Username atau password salah!";
                }
            } else {
                $response['success'] = false;
                $response['message'] = "Username atau password salah!";
            }
        }
    } else {
        $response['success'] = false;
        $response['message'] = "Metode request tidak valid!";
    }
    
    // Tampilkan respon dalam format JSON
    echo json_encode($response);
}



function registerUser($conn) {
    header('Content-Type: application/json');
    
    // Check if it's a POST request
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        echo json_encode([
            'success' => false, 
            'message' => 'Invalid request method. Only POST is allowed.'
        ]);
        return;
    }

    // Get POST data
    $nama = isset($_POST['nama']) ? trim($_POST['nama']) : '';
    $email = isset($_POST['email']) ? trim($_POST['email']) : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';
    $telepon = isset($_POST['telepon']) ? trim($_POST['telepon']) : '';
    $alamat = isset($_POST['alamat']) ? trim($_POST['alamat']) : '';

    // Validate input
    if (empty($nama) || empty($email) || empty($password) || empty($telepon) || empty($alamat)) {
        echo json_encode([
            'success' => false,
            'message' => 'Semua field harus diisi!'
        ]);
        return;
    }

    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo json_encode([
            'success' => false,
            'message' => 'Format email tidak valid!'
        ]);
        return;
    }

    try {
        // Check if email or username already exists
        $stmt = $conn->prepare("SELECT id_user FROM pengguna WHERE nama = ? OR email = ?");
        if (!$stmt) {
            throw new Exception("Prepare statement error: " . $conn->error);
        }

        $stmt->bind_param("ss", $nama, $email);
        if (!$stmt->execute()) {
            throw new Exception("Execute error: " . $stmt->error);
        }

        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            echo json_encode([
                'success' => false,
                'message' => 'Email atau username sudah terdaftar!'
            ]);
            $stmt->close();
            return;
        }
        $stmt->close();

        // Hash password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Insert new user
        $stmt = $conn->prepare("INSERT INTO pengguna (nama, email, password, telepon, alamat) VALUES (?, ?, ?, ?, ?)");
        if (!$stmt) {
            throw new Exception("Prepare statement error: " . $conn->error);
        }

        $stmt->bind_param("sssss", $nama, $email, $hashed_password, $telepon, $alamat);
        
        if (!$stmt->execute()) {
            throw new Exception("Execute error: " . $stmt->error);
        }

        // Get the new user's ID
        $new_user_id = $stmt->insert_id;
        
        echo json_encode([
            'success' => true,
            'message' => 'Registrasi berhasil!',
            'user' => [
                'id_user' => $new_user_id,
                'nama' => $nama,
                'email' => $email,
                'telepon' => $telepon,
                'alamat' => $alamat
            ]
        ]);

        $stmt->close();

    } catch (Exception $e) {
        error_log("Registration error: " . $e->getMessage());
        echo json_encode([
            'success' => false,
            'message' => 'Terjadi kesalahan saat registrasi. Silakan coba lagi.'
        ]);
    }
}


function getProduk($conn) {
    $sql = "SELECT id, nama, harga, kategori, image FROM produk"; // Replace with your table/column names
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
                'kategori' => $row['kategori'],
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
    $sql = "SELECT id, nama, harga, deskripsi, image FROM produk ORDER BY stok ASC LIMIT 4";
    $result = $conn->query($sql);
    
    $items = array();
    
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            // Pastikan image tidak null
            $imageBase64 = null;
            if ($row['image']) {
                // Konversi BLOB ke base64 dengan format yang benar
                $imageBase64 = 'data:image/jpeg;base64,' . base64_encode($row['image']);
            }
            
            $item = array(
                'id' => $row['id'],
                'nama' => $row['nama'],
                'harga' => $row['harga'],
                'deskripsi' => $row['deskripsi'],
                'image' => $imageBase64 ?? '' // Kirim string kosong jika null
            );
            array_push($items, $item);
        }
    }
    
    header('Content-Type: application/json');
    echo json_encode($items);
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