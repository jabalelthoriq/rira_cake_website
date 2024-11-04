<?php
class ProductModel extends Database {
    private $table = 'produk';

    public function getAllProducts() {
        try {
            $query = "SELECT id, nama, kategori, stok, harga,deskripsi, image FROM {$this->table}";
            $stmt = $this->db->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch(PDOException $e) {
            throw new Exception("Database error: " . $e->getMessage());
        }
    }

    public function getProductById($id) {
        try {
            $query = "SELECT * FROM {$this->table} WHERE id = :id";
            $stmt = $this->db->prepare($query);
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch(PDOException $e) {
            throw new Exception("Database error: " . $e->getMessage());
        }
    }
}