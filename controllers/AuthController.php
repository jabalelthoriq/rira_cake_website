<?php
require_once 'models/PDF_Generator.php';
require_once 'models/pengguna.php';
require_once 'models/pengeluaran.php';
require_once 'models/DashboardModel.php';
class AuthController
{
    private $model;
    private $baseUrl;
    private $productModel;
    private $pengeluaranModel;
    private $transaksiModel;
    
    



    public function __construct()
    {
        session_start();
        $this->productModel = new ProductModel();
        $this->model = new pengguna();
        $this->pengeluaranModel = new pengeluaran();
        $this->transaksiModel = new TransaksiModel();
        $this->baseUrl = BASE_URL;
        //  
    }

    // pelanggan
    public function index()
    {
        require_once 'view/pelanggan/login.php';
    }
    public function homepage()
    {
        $favoriteMenuItems = $this->productModel->getFavoriteMenuItems();
        require_once 'view/pelanggan/home.php';
    }
    public function aboutuspage()
    {
        require_once 'view/pelanggan/aboutus.php';
    }
    public function contactpage()
    {
        require_once 'view/pelanggan/contact.php';
    }
   

    



    // admin
    public function dashboardpage() {
        // Get current month's date range
        $startDate = date('Y-m-01');
        $endDate = date('Y-m-t');

        // Get orders statistics
        $totalOrders = $this->transaksiModel->getMonthlyOrderCount($startDate, $endDate);
        $pendingOrders = $this->transaksiModel->getMonthlyOrderCountByStatus($startDate, $endDate, 'pending');
        $confirmedOrders = $this->transaksiModel->getMonthlyOrderCountByStatus($startDate, $endDate, 'confirmed');

        // Get daily data for charts
        $expenseData = $this->pengeluaranModel->getMonthlyExpenseData();
        $incomeData = $this->transaksiModel->getMonthlyIncomeData();

        // Format data for charts
        $expenseDates = array_column($expenseData, 'tanggal');
        $expenseAmounts = array_column($expenseData, 'total');
        
        $incomeDates = array_column($incomeData, 'tanggal');
        $incomeAmounts = array_column($incomeData, 'total');

        // Load the dashboard view
        require_once 'view/admin/dashboard.php';
    }
    



    public function register()
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $data = [
            'nama' => $_POST['nama'],
            'email' => $_POST['email'],
            'telepon' => $_POST['telepon'],
            'alamat' => $_POST['alamat'],
            'password' => password_hash($_POST['password'], PASSWORD_DEFAULT)
        ];

        if ($this->model->register($data)) {
            // Set SweetAlert registration success notification
            $_SESSION['sweetalert'] = [
                'type' => 'success',
                'title' => 'Registrasi Successful ;)',
                'text' => 'Your account has been created. Please login.'
            ];
            header("Location: " . $this->baseUrl . "/index.php?c=Auth&a=index");
            exit();
        } else {
            // Set SweetAlert registration error notification
            $_SESSION['sweetalert'] = [
                'type' => 'error',
                'title' => 'Registrasi Failed :(',
                'text' => 'Failed to register. Please try again.'
            ];
            header("Location: " . $this->baseUrl . "/index.php?c=Auth&a=index");
            exit();
        }
    }
    require_once 'view/register.php';
}

public function login() {
    try {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nama = filter_input(INPUT_POST, 'nama', FILTER_SANITIZE_STRING);
            $password = $_POST['password'];

            if (empty($nama) || empty($password)) {
                throw new Exception('Username and password are required');
            }

            $user = $this->model->login($nama, $password);

            if ($user) {
                // Set session data
                $_SESSION['id_user'] = $user['id_user'];
                $_SESSION['nama'] = $user['nama'];
                $_SESSION['role'] = $user['role'];
                $_SESSION['logged_in'] = true;

                // Set SweetAlert login success notification
                $_SESSION['sweetalert'] = [
                    'type' => 'success',
                    'title' => 'Login Successful ;)',
                    'text' => 'WELCOME, ' . $user['nama'] . '!'
                ];

                // Redirect based on role
                $this->redirectBasedOnRole();

            } else {
                throw new Exception('Invalid username or password');
            }
        }
    } catch (PDOException $e) {
        // Handle database-related errors
        $_SESSION['sweetalert'] = [
            'type' => 'error',
            'title' => 'Database Error :(',
            'text' => 'An error occurred while processing your request'
        ];
        // Log the actual error for debugging
        error_log($e->getMessage());
        $this->redirectToLogin();
    } catch (Exception $e) {
        // Handle general errors
        $_SESSION['sweetalert'] = [
            'type' => 'error',
            'title' => 'Login Failed :(',
            'text' => $e->getMessage()
        ];
        $this->redirectToLogin();
    }
}

private function redirectToLogin() {
    header('Location: ' . $this->baseUrl . '/index.php?c=Auth&a=index');
    exit();
}

private function redirectBasedOnRole() 
{
    try {
        // Validasi session
        if (!isset($_SESSION)) {
            session_start();
        }

        // Validasi login dan role dengan pesan error yang spesifik
        if (!isset($_SESSION['logged_in'])) {
            throw new Exception('Silakan login terlebih dahulu');
        }

        if (!isset($_SESSION['role'])) {
            throw new Exception('Role pengguna tidak valid');
        }

        // Validasi nilai role
        $allowedRoles = ['admin', 'pelanggan'];
        if (!in_array($_SESSION['role'], $allowedRoles)) {
            throw new Exception('Role pengguna tidak dikenali');
        }

        // Store base URL in variable
        $redirectUrl = $this->baseUrl . '/index.php?c=Auth&a=';

        // Tentukan halaman tujuan berdasarkan role
        $targetPage = '';
        switch ($_SESSION['role']) {
            case 'admin':
                $targetPage = 'dashboardpage';
                break;
            case 'pelanggan':
                $targetPage = 'homepage';
                break;
            default:
                // Seharusnya tidak pernah terjadi karena sudah divalidasi di atas
                throw new Exception('Role tidak valid');
        }

        // Cek apakah headers sudah terkirim
        if (headers_sent($filename, $linenum)) {
            // Jika headers sudah terkirim, gunakan JavaScript
            echo "<script>
                    // Tampilkan SweetAlert untuk error
                    Swal.fire({
                        icon: 'error',
                        title: 'Terjadi Kesalahan',
                        text: 'Mengalihkan ke halaman yang sesuai...',
                        timer: 2000,
                        showConfirmButton: false
                    }).then(function() {
                        window.location.href = '" . $redirectUrl . $targetPage . "';
                    });
                </script>";
        } else {
            // Set session untuk SweetAlert sukses
            $_SESSION['sweetalert'] = [
                'type' => 'success',
                'title' => 'Login Berhasil',
                'text' => 'Selamat datang, ' . ($_SESSION['nama'] ?? 'Pengguna')
            ];
            
            // Redirect menggunakan header
            header("Location: " . $redirectUrl . $targetPage);
        }
        
        exit();

    } catch (Exception $e) {
        // Log error untuk debugging
        error_log('Redirect Error: ' . $e->getMessage() . ' pada ' . date('Y-m-d H:i:s'));

        // Set session untuk SweetAlert error
        $_SESSION['sweetalert'] = [
            'type' => 'error',
            'title' => 'Terjadi Kesalahan',
            'text' => $e->getMessage()
        ];

        // Redirect ke halaman login
        if (headers_sent($filename, $linenum)) {
            echo "<script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Terjadi Kesalahan',
                        text: '" . $e->getMessage() . "',
                        timer: 2000,
                        showConfirmButton: false
                    }).then(function() {
                        window.location.href = '" . $this->baseUrl . "/index.php?c=Auth&a=index';
                    });
                </script>";
        } else {
            header("Location: " . $this->baseUrl . "/index.php?c=Auth&a=index");
        }
        exit();
    }
}

// Tambahkan fungsi helper untuk validasi session
private function validateSession() 
{
    if (!isset($_SESSION)) {
        session_start();
    }
    
    if (!isset($_SESSION['logged_in']) || !isset($_SESSION['role'])) {
        return false;
    }
    
    return true;
}



    public function customerpage()
    {
        if (!isset($_SESSION['logged_in'])) {
            header('Location: ' . $this->baseUrl . '/index.php?c=Auth&a=index');
            exit();
        }
        
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $perPage = 10;

        $search = isset($_GET['search']) ? $_GET['search'] : '';
        $role = 'pelanggan';

        // Modifikasi pemanggilan method untuk menyertakan filter role
        $data = $this->model->getAllUsersbyRole($page, $perPage, $search, $role);
        $totalData = $this->model->getTotalUsersbyRole($search, $role);
        $totalPages = ceil($totalData / $perPage);

        // Siapkan data untuk view
        $viewData = [
            'data' => $data,
            'totalData' => $totalData,
            'totalPages' => $totalPages,
            'page' => $page,
            'perPage' => $perPage,
            'search' => $search
        ];

        // Extract variabel untuk digunakan di view
        extract($viewData);

        require_once 'view/admin/customer.php';
    }

    public function tambahmenupage() {
        if(!isset($_SESSION['logged_in'])) {
            header('Location: index.php?c=Auth&a=index');
            return;
        }
        
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $perPage = 10; // jumlah data per halaman
        $search = isset($_GET['search']) ? $_GET['search'] : '';
        
        $data = $this->productModel->getAllProduct($page, $perPage, $search);
        $totalData = $this->productModel->getTotalProduct($search);
        $totalPages = ceil($totalData / $perPage);
        
        require_once 'view/admin/tambah-menu.php';
    }
    
   



    public function downloadPDF()
    {
        if (!isset($_SESSION['logged_in'])) {
            header('Location: index.php?c=Auth&a=customerpage');
            return;
        }

        if (!isset($_GET['id'])) {
            header('Location: index.php?c=Auth&a=customerpage');
            return;
        }

        $id = $_GET['id'];
        $userData = $this->model->getUserDetail($id);

        if (!$userData) {
            header('Location: index.php?c=Auth&a=customerpage');
            return;
        }

        $pdf = new PDF_Generator();
        $pdf->AliasNbPages();
        $pdf->AddPage();
        $pdf->UserInfo($userData);

        $filename = "user_detail_" . $userData['nama'] . ".pdf";
        $pdf->Output('D', $filename);
    }


   


    public function delete()
    {
        

        $id = $_GET['id'];
        if ($this->model->delete($id)) {
            header('Location: index.php?c=Auth&a=customerpage');
        } else {
            echo "Hapus data gagal!";
        }
    }

    

public function delete2() {
    
    $id = $_GET['id'];
    if($this->productModel->delete($id)) {
        header('Location: index.php?c=Auth&a=tambahmenupage');
    } else {
        echo "Hapus data gagal!";
    }
}
public function delete3() {
    
    $id = $_GET['id'];
    if($this->pengeluaranModel->delete($id)) {
        header('Location: index.php?c=Auth&a=laporanpage');
    } else {
        echo "Hapus data gagal!";
    }
}
public function delete4() {
    
    $id = $_GET['id'];
    if($this->transaksiModel->delete($id)) {
        header('Location: index.php?c=Auth&a=laporanpage');
    } else {
        echo "Hapus data gagal!";
    }
}

public function productpage() {
    if(!isset($_SESSION)) {
        session_start();
    }
    
    // Set default values
    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    $perPage = 16; 
    $search = isset($_GET['search']) ? $_GET['search'] : '';
    $category = isset($_GET['category']) ? $_GET['category'] : '';
    
    // Get data from model
    $dataProduct = $this->productModel->getAllProduct($page, $perPage, $search, $category);
    $totalDataProduct = $this->productModel->getTotalProduct($search, $category);
    $totalPages = ceil($totalDataProduct / $perPage);
    
    // Include these variables in the view
    require_once 'view/pelanggan/ProductView.php';
}

public function tambahmenu() {
    // Cek session dengan benar
    if(!isset($_SESSION['logged_in'])) {
        header('Location: ' . $this->baseUrl . '/index.php?c=Auth&a=index');
        return;
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Validasi input
        if(empty($_POST['nama']) || empty($_POST['kategori']) || 
           empty($_POST['stok']) || empty($_POST['harga'])) {
            $_SESSION['menu_error'] = "Semua field harus diisi!";
            header("Location: " . $this->baseUrl . "/index.php?c=Auth&a=tambahmenupage");
            exit();
        }

        $data = [
            'nama' => htmlspecialchars($_POST['nama']),
            'kategori' => htmlspecialchars($_POST['kategori']),
            'stok' => (int)$_POST['stok'],
            'harga' => (float)$_POST['harga'],
            'deskripsi' => htmlspecialchars($_POST['deskripsi'])
        ];

        // Handle file upload
        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $uploadDir = __DIR__ . '/../uploads/'; // Path absolut ke direktori upload
            
            // Buat direktori jika belum ada
            if (!file_exists($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }
            
            // Generate nama file unik
            $fileExtension = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
            $fileName = uniqid() . '.' . $fileExtension;
            $uploadFile = $uploadDir . $fileName;

            // Upload file
            if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadFile)) {
                $data['image'] = $fileName;
            } else {
                $_SESSION['menu_error'] = "Gagal mengunggah gambar.";
                header("Location: " . $this->baseUrl . "/index.php?c=Auth&a=tambahmenupage");
                exit();
            }
        }

        // Simpan ke database
        if ($this->productModel->tambahmenu($data)) {
            $_SESSION['success'] = "Menu berhasil ditambahkan!";
            header("Location: " . $this->baseUrl . "/index.php?c=Auth&a=tambahmenupage");
            exit();
        } else {
            $_SESSION['menu_error'] = "Gagal menambahkan menu. Silakan coba lagi.";
            header("Location: " . $this->baseUrl . "/index.php?c=Auth&a=tambahmenupage");
            exit();
        }
    }
}

public function update() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Initialize the data array
        $data = [
            'id' => $_POST['id'],
            'nama' => $_POST['nama'],
            'kategori' => $_POST['kategori'],
            'stok' => $_POST['stok'],
            'harga' => $_POST['harga'],
            'deskripsi' => $_POST['deskripsi'],
        ];

        // Check if a new image is uploaded
        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $fileExtension = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
            $newFileName = time() . '_' . uniqid() . '.' . $fileExtension;
            $targetDir = 'uploads/';
            $targetFile = $targetDir . $newFileName;

            // Create the directory if it doesn't exist
            if (!is_dir($targetDir)) {
                mkdir($targetDir, 0777, true);
            }

            // Move the uploaded file
            if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {
                // Delete the old image if it exists
                if (!empty($_POST['image_lama'])) {
                    $oldImagePath = $targetDir . $_POST['image_lama'];
                    if (file_exists($oldImagePath)) {
                        unlink($oldImagePath);
                    }
                }
                // Set the new image path
                $data['image'] = $newFileName; // Store only the filename
            } else {
                // Handle upload error
                $_SESSION['menu_error'] = "Gagal mengunggah gambar.";
                header("Location: " . $this->baseUrl . "/index.php?c=Auth&a=edit&id=" . $_POST['id']);
                exit();
            }
        } else {
            // If no new image is uploaded, keep the old image
            $data['image'] = $_POST['image_lama'];
        }

        // Update the database
        if ($this->productModel->update($data)) {
            header('Location: index.php?c=Auth&a=tambahmenupage');
            exit;
        } else {
            header('Location: index.php?c=Auth&a=edit&id=' . $_POST['id']);
            exit;
        }
    }
}
public function tambahpengeluaran() {
    if(!isset($_SESSION['logged_in'])) {
        header('Location: ' . $this->baseUrl . '/index.php?c=Auth&a=index');
        return;
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Validasi input
        if(empty($_POST['nama']) || empty($_POST['deskripsi']) || 
           empty($_POST['jumlah']) || empty($_POST['tanggal'])) {
            $_SESSION['input_error'] = "Semua field harus diisi!";
            header("Location: " . $this->baseUrl . "/index.php?c=Auth&a=laporanpage");
            exit();
        }

        $data = [
            'nama' => htmlspecialchars($_POST['nama']),
            'deskripsi' => htmlspecialchars($_POST['deskripsi']),
            'jumlah' => (int)$_POST['jumlah'],
            'tanggal_pengeluaran' => $_POST['tanggal']
        ];

        // Simpan ke database
        if ($this->pengeluaranModel->tambahpengeluaran($data)) {
            $_SESSION['success'] = "Data pengeluaran berhasil ditambahkan!";
            header("Location: " . $this->baseUrl . "/index.php?c=Auth&a=laporanpage");
            exit;
        } else {
            $_SESSION['error'] = "Gagal menambahkan data pengeluaran!";
            header("Location: " . $this->baseUrl . "/index.php?c=Auth&a=laporanpage");
            exit;
        }
    }
}

public function laporanpage() {
    if(!isset($_SESSION['logged_in'])) {
        header('Location: ' . $this->baseUrl . '/index.php?c=Auth&a=index');
        exit();
    }
    // Set default values
    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    $perPage = 10; // jumlah data per halaman
    $search = isset($_GET['search']) ? $_GET['search'] : '';
    
    // Get data pengeluaran
    $dataPengeluaran = $this->pengeluaranModel->getAllData($page, $perPage, $search);
    $totalDataPengeluaran = $this->pengeluaranModel->getTotalData($search);
    
    // Get data pemasukan dari pesanan
    $dataPemasukan = $this->transaksiModel->getAllPemasukan($page, $perPage, $search);
    $totalDataPemasukan = $this->transaksiModel->getTotalPemasukan($search);
    
    $totalPages = ceil($totalDataPengeluaran / $perPage);
    require_once 'view/admin/laporan.php';
}
public function updatepengeluaran() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
 
        $data = [
            'id' => $_POST['id'],
            'nama' => $_POST['nama'],
            'jumlah' => $_POST['jumlah'],
            'deskripsi' => $_POST['deskripsi'],
   
          
        ];
        
        if ($this->pengeluaranModel->updatepengeluaran($data)) {
            $_SESSION['success'] = "Data pengeluaran berhasil diperbarui!";
            header("Location: " . $this->baseUrl . "/index.php?c=Auth&a=laporanpage");
            exit;
        } else {
            $_SESSION['error'] = "Gagal memperbarui data pengeluaran!";
            header("Location: " . $this->baseUrl . "/index.php?c=Auth&a=laporanpage");
            exit;
        }
    }
}

public function tambahpesanan() {
    if (!isset($_SESSION['logged_in'])) {
        $_SESSION['error'] = "Silakan login terlebih dahulu";
        header('Location: ' . $this->baseUrl . '/index.php?c=Auth&a=index');
        exit();
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        try {
            // Validasi data
            if (empty($_POST['nama']) || empty($_POST['email']) || 
                empty($_POST['total_harga']) || empty($_POST['kode_bank']) || 
                empty($_POST['cart_data'])) {
                throw new Exception("Semua field harus diisi");
            }

            // Upload file
            $fileName = $this->handleFileUpload($_FILES['image']);

            // Prepare data
            $data = [
                'nama' => htmlspecialchars($_POST['nama']),
                'email' => htmlspecialchars($_POST['email']),
                'total_harga' => (int)$_POST['total_harga'],
                'kode_bank' => htmlspecialchars($_POST['kode_bank']),
                'tanggal_pesanan' => date('Y-m-d'),
                'image' => $fileName,
                'id_user' => $_SESSION['id_user'] ?? null,
                'cart_items' => $_POST['cart_data']
            ];

            // Simpan ke database
            if ($this->transaksiModel->tambahpesanan($data)) {
                // Set session flash untuk SweetAlert
                $_SESSION['sweetalert'] = [
                    'type' => 'success',
                    'title' => 'Order Successful ;)',
                    'text' => 'Thank you for your order. We are processing your order.',
                    'redirect' => $this->baseUrl . '/index.php?c=Auth&a=productpage'
                ];

                // Tambahkan script untuk reset cart di client-side
                $_SESSION['reset_cart'] = true;

                // Redirect ke halaman produk
                header('Location: ' . $this->baseUrl . '/index.php?c=Auth&a=productpage');
                exit();
            }

        } catch (Exception $e) {
            // Set session flash untuk SweetAlert error
            $_SESSION['sweetalert'] = [
                'type' => 'error',
                'title' => 'Error!',
                'text' => $e->getMessage(),
                'redirect' => $this->baseUrl . '/index.php?c=Auth&a=productpage'
            ];

            // Redirect ke halaman produk
            header('Location: ' . $this->baseUrl . '/index.php?c=Auth&a=productpage');
            exit();
        }
    }
}

private function handleFileUpload($file) {
    if (!isset($file) || $file['error'] !== UPLOAD_ERR_OK) {
        throw new Exception("Bukti pembayaran harus diunggah");
    }

    $uploadDir = 'payment/';
    if (!is_dir($uploadDir)) {
        if (!mkdir($uploadDir, 0777, true)) {
            throw new Exception("Gagal membuat direktori upload");
        }
    }

    // Validasi tipe file
    $allowedTypes = ['image/jpeg', 'image/png', 'image/jpg'];
    if (!in_array($file['type'], $allowedTypes)) {
        throw new Exception("Tipe file tidak diizinkan. Gunakan JPG, JPEG, atau PNG");
    }

    // Validasi ukuran file (max 5MB)
    $maxSize = 5 * 1024 * 1024; // 5MB in bytes
    if ($file['size'] > $maxSize) {
        throw new Exception("Ukuran file terlalu besar. Maksimal 5MB");
    }

    // Generate nama file unik
    $fileExtension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
    $fileName = uniqid() . '.' . $fileExtension;
    $uploadFile = $uploadDir . $fileName;

    // Pindahkan file
    if (!move_uploaded_file($file['tmp_name'], $uploadFile)) {
        throw new Exception("Gagal mengunggah bukti pembayaran");
    }

    return $fileName;
}

public function getOrderDetails() {
    try {
        if (!isset($_GET['id'])) {
            throw new Exception('ID pesanan tidak ditemukan');
        }

        $orderId = $_GET['id'];
        
        // Ambil data pesanan dan detail dalam satu array
        $pesanan = $this->transaksiModel->getPesananById($orderId);
        $detailPesanan = $this->transaksiModel->getPesananDetailById($orderId);

        if (!$pesanan) {
            throw new Exception('Data pesanan tidak ditemukan');
        }

        header('Content-Type: application/json');
        echo json_encode([
            'success' => true,
            'pesanan' => $pesanan,
            'detail' => $detailPesanan
        ]);
        
    } catch (Exception $e) {
        header('Content-Type: application/json');
        echo json_encode([
            'success' => false,
            'message' => $e->getMessage()
        ]);
    }
}

public function updateOrderStatus() {
    try {
        if (!isset($_POST['id'])) {
            throw new Exception('ID pesanan tidak ditemukan');
        }

        $id = $_POST['id'];
        $newStatus = $_POST['status'] === 'confirmed' ? 'pending' : 'confirmed';

        $result = $this->transaksiModel->updateStatus($id, $newStatus);

        header('Content-Type: application/json');
        echo json_encode([
            'success' => true,
            'newStatus' => $newStatus,
            'message' => 'Status berhasil diperbarui'
        ]);

    } catch (Exception $e) {
        header('Content-Type: application/json');
        echo json_encode([
            'success' => false,
            'message' => $e->getMessage()
        ]);
    }
}

}



