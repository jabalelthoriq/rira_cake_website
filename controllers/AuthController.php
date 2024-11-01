<?php
require_once 'models/PDF_Generator.php';
require_once 'models/pengguna.php';

class AuthController {
    private $model;
    private $baseUrl;

    public function __construct() {
        session_start();
        $this->model = new pengguna();
        $this->baseUrl = BASE_URL;
    }

    // pelanggan
    public function index() {
        require_once 'view/pelanggan/login.php';
    }
    public function homepage() {
        require_once 'view/pelanggan/home.php';
    }
    public function aboutuspage() {
        require_once 'view/pelanggan/aboutus.php';
    }
    public function contactpage() {
        require_once 'view/pelanggan/contact.php';
    }
    public function orderpage() {
        require_once 'view/pelanggan/order.php';
    }



    // admin
    public function dashboardpage    () {
        require_once 'view/admin/dashboard.php';
    }
    public function laporanpage    () {
        require_once 'view/admin/laporan.php';
    }
    public function tambahmenupage    () {
        require_once 'view/admin/tambah-menu.php';
    }
    
    public function register() {
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
    
    public function login() {
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

    private function redirectBasedOnRole() {
        if (!isset($_SESSION['logged_in']) || !isset($_SESSION['role'])) {
            header("Location: " . $this->baseUrl . "/index.php?c=Auth&a=index");
            exit();
        }
    
        switch($_SESSION['role']) {
            case 'admin':
                header("Location: " . $this->baseUrl . "/index.php?c=Auth&a=dashboardpage");
                break;
            case 'pelanggan':
                header("Location: " . $this->baseUrl . "/index.php?c=Auth&a=homepage");
                break;
            default:
                // If role is neither admin nor pengguna, destroy session and redirect to login
                session_destroy();
                header("Location: " . $this->baseUrl . "/index.php?c=Auth&a=homepage");
        }
        exit();
    }

    
    public function dashboard() {
        if(!isset($_SESSION['user'])) {
            header('Location: index.php?c=Auth&a=dashboardpage');
            return;
        }
        
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $perPage = 5; // jumlah data per halaman
        $search = isset($_GET['search']) ? $_GET['search'] : '';
        
        $data = $this->model->getAllUsers($page, $perPage, $search);
        $totalData = $this->model->getTotalUsers($search);
        $totalPages = ceil($totalData / $perPage);
        
        require_once 'admin/dashboard.php';
    }

   

    public function downloadPDF() {
        if(!isset($_SESSION['user'])) {
            header('Location: index.php?c=Auth&a=loginPage');
            return;
        }

        if(!isset($_GET['id'])) {
            header('Location: index.php?c=Auth&a=dashboard');
            return;
        }

        $id = $_GET['id'];
        $userData = $this->model->getUserDetail($id);

        if(!$userData) {
            header('Location: index.php?c=Auth&a=dashboard');
            return;
        }

        $pdf = new PDF_Generator();
        $pdf->AliasNbPages();
        $pdf->AddPage();
        $pdf->UserInfo($userData);
        
        $filename = "user_detail_" . $userData['nim'] . ".pdf";
        $pdf->Output('D', $filename);
    }
    
    public function logout() {
        session_destroy();
        header('Location: index.php?c=Auth&a=loginPage');
    }

    // Tambahkan method-method berikut di dalam class AuthController

public function edit() {
    if(!isset($_SESSION['user'])) {
        header('Location: index.php?c=Auth&a=loginPage');
        return;
    }
    
    $id = $_GET['id'];
    $user = $this->model->getUserById($id);
    require_once 'views/edit.php';
}

public function update() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Ambil foto yang sudah ada sebagai default
        $foto = $_POST['foto_lama'] ?? '';
        
        // Proses jika ada upload foto baru
        if(isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
            $fileExtension = pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION);
            $newFileName = time() . '_' . uniqid() . '.' . $fileExtension;
            $targetDir = 'uploads/profile/';
            $targetFile = $targetDir . $newFileName;
            
            if (!is_dir($targetDir)) {
                mkdir($targetDir, 0777, true);
            }
            
            if (move_uploaded_file($_FILES['foto']['tmp_name'], $targetFile)) {
                // Hapus foto lama jika ada dan bukan foto default
                if(!empty($_POST['foto_lama']) && file_exists($_POST['foto_lama'])) {
                    unlink($_POST['foto_lama']);
                }
                $foto = $targetFile;
            }
        }

        $data = [
            'id_user' => $_POST['id_user'],
            'nim' => $_POST['nim'],
            'nama' => $_POST['nama'],
            'email' => $_POST['email'],
            'foto' => $foto,
            'password' => $_POST['password']
        ];
        
        if ($this->model->update($data)) {
            header('Location: index.php?c=Auth&a=dashboard');
            exit;
        } else {
            header('Location: index.php?c=Auth&a=edit&id=' . $_POST['id_user']);
            exit;
        }
    }
}

public function delete() {
    if(!isset($_SESSION['user'])) {
        header('Location: index.php?c=Auth&a=loginPage');
        return;
    }
    
    $id = $_GET['id'];
    if($this->model->delete($id)) {
        header('Location: index.php?c=Auth&a=dashboard');
    } else {
        echo "Hapus data gagal!";
    }
}
}