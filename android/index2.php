<?php
require_once 'config2.php';


// Membuat instance dari Database
$database = new Database();
$db = $database->getConnection(); // Mendapatkan koneksi database

    