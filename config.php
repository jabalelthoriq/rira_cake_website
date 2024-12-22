<?php
// Database Configuration
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'rira_cake');
define('BASE_URL', rtrim(dirname($_SERVER['SCRIPT_NAME']), '/'));
// Koneksi database
class Database {
    protected $db;
    
    public function __construct() {
        try {
            $this->db = new PDO(
                "mysql:host=".DB_HOST.";dbname=".DB_NAME,
                DB_USER,
                DB_PASS
            );
        } catch(PDOException $e) {
            die("Koneksi gagal: " . $e->getMessage());
        }
    }

    public function getConnection() {
        return $this->db;
    }
}