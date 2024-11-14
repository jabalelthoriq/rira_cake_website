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
    



    public function __construct()
    {
        session_start();
        $this->productModel = new ProductModel();
        $this->model = new pengguna();
        $this->pengeluaranModel = new pengeluaran();
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
    public function dashboardpage()
    {
        $dashboardModel = new DashboardModel();

        $incomeData = $dashboardModel->getIncomeData();
        $expenseData = $dashboardModel->getExpenseData();
        $employees = $dashboardModel->getEmployees();

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
                $_SESSION['register_success'] = "Pendaftaran berhasil! Silakan login.";
                header("Location: " . $this->baseUrl . "/index.php?c=Auth&a=index");
                exit();
            } else {
                $_SESSION['register_error'] = "Gagal mendaftar. Silakan coba lagi.";
                header("Location: " . $this->baseUrl . "/index.php?c=Auth&a=register");
                exit();
            }
        }
        require_once 'view/register.php';
    }

    public function login()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nama = filter_input(INPUT_POST, 'nama', FILTER_SANITIZE_STRING);
            $password = $_POST['password'];

            // Remove role from POST since we'll get it from database
            $user = $this->model->login($nama, $password);

            if ($user) {
                // Set session data
                $_SESSION['id_user'] = $user['id_user'];
                $_SESSION['nama'] = $user['nama'];
                $_SESSION['role'] = $user['role'];
                $_SESSION['logged_in'] = true;

                // Redirect based on role
                $this->redirectBasedOnRole();
            } else {
                $_SESSION['login_error'] = "Username atau password salah";
                header('Location: ' . $this->baseUrl . '/index.php?c=Auth&a=index');
                exit();
            }
        }
    }

    private function redirectBasedOnRole()
    {
        if (!isset($_SESSION['logged_in']) || !isset($_SESSION['role'])) {
            header("Location: " . $this->baseUrl . "/index.php?c=Auth&a=index");
            exit();
        }

        switch ($_SESSION['role']) {
            case 'admin':
                header("Location: " . $this->baseUrl . "/index.php?c=Auth&a=dashboardpage");
                break;
            case 'pelanggan':
                header("Location: " . $this->baseUrl . "/index.php?c=Auth&a=homepage");
                break;
            default:
                session_destroy();
                header("Location: " . $this->baseUrl . "/index.php?c=Auth&a=homepage");
        }
        exit();
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
        if (!isset($_SESSION['user'])) {
            header('Location: index.php?c=Auth&a=index');
            return;
        }

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

public function productpage() {
    if(!isset($_SESSION)) {
        session_start();
    }
    
    // Set default values
    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    $perPage = 16; // jumlah data per halaman
    $search = isset($_GET['search']) ? $_GET['search'] : '';
    
    // Get data from model
    $dataProduct = $this->productModel->getAllProduct($page, $perPage, $search);
    $totalDataProduct = $this->productModel->getTotalProduct($search);
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
        
        // Proses jika ada upload foto baru
        if(isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $fileExtension = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
            $newFileName = time() . '_' . uniqid() . '.' . $fileExtension;
            $targetDir = 'uploads/';
            $targetFile = $targetDir . $newFileName;
            
            if (!is_dir($targetDir)) {
                mkdir($targetDir, 0777, true);
            }
            
            if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {
                if(!empty($_POST['image_lama']) && file_exists($_POST['image_lama'])) {
                    unlink($_POST['image_lama']);
                }
                $image = $targetFile;
            }
        }

        $data = [
            'id' => $_POST['id'],
            'nama' => $_POST['nama'],
            'kategori' => $_POST['kategori'],
            'stok' => $_POST['stok'],
            'harga' => $_POST['harga'],
            'deskripsi' => $_POST['deskripsi']
            
          
        ];
        
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
            $_SESSION['success'] = "Pengeluaran berhasil ditambahkan!";
            header("Location: " . $this->baseUrl . "/index.php?c=Auth&a=laporanpage");
            exit();
        } else {
            $_SESSION['input_error'] = "Gagal menambahkan pengeluaran. Silakan coba lagi.";
            header("Location: " . $this->baseUrl . "/index.php?c=Auth&a=laporanpage");
            exit();
        }
    }
}

public function laporanpage    () {
    if(!isset($_SESSION['logged_in'])) {
        header('Location: ' . $this->baseUrl . '/index.php?c=Auth&a=index');
        exit();
    }
    // Set default values
    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    $perPage = 10; // jumlah data per halaman
    $search = isset($_GET['search']) ? $_GET['search'] : '';
    
    // Get data from model
    $dataPengeluaran = $this->pengeluaranModel->getAllData($page, $perPage, $search);
    $totalDataPengeluaran = $this->pengeluaranModel->getTotalData($search);
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
            header('Location: index.php?c=Auth&a=laporanpage');
            exit;
        } else {
            header('Location: index.php?c=Auth&a=edit&id=' . $_POST['id']);
            exit;
        }
    }
}

}



