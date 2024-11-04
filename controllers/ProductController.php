<?php
class ProductController extends Database {
    private $productModel;

    public function __construct() {
        parent::__construct();
        $this->productModel = new ProductModel(); // Hapus parameter $db karena sudah extend Database
    }

    public function index() {
        try {
            $products = $this->productModel->getAllProducts(); // Changed variable name to match view
            if (!$products) {
                $products = [];
            }
            require_once ROOT_DIR . '/view/pelanggan/ProductView.php'; // Fixed path
        } catch(Exception $e) {
            die("Error: " . $e->getMessage());
        }
    }

    public function show($id) {
        try {
            $product = $this->productModel->getProductById($id);
            if (!$product) {
                $_SESSION['error'] = "Product not found";
                header("Location: " . BASE_URL . "/index.php?c=produkpage");
                exit;
            }
            require_once ROOT_DIR . '/view/pelanggan/ProductView.php';
        } catch(Exception $e) {
            die("Error: " . $e->getMessage());
        }
    }
}