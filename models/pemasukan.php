<?php
require_once __DIR__ . 'config.php'; // Pastikan jalur ini benar

class pemasukan extends Database {
    private $table_name = "pemasukan";
    public $id;
    public $id_pesanan;
    public $id_keranjang;
    public $jumlah;
    public $mulai_minggu;
    public $akhir_minggu;

    public function __construct() {
        parent::__construct();
    }

        public function create($data) {
            try {
                // Mulai transaksi database
                $this->db->beginTransaction();
                
                
                $barang = new Barang();
                $dataBarang = $barang->getById($data['barang_id']);
                
                if (!$dataBarang) {
                    throw new Exception("Barang tidak ditemukan");
                }
                
                if ($dataBarang['stok'] < $data['jumlah']) {
                    throw new Exception("Stok tidak mencukupi");
                }

                
                $query = "INSERT INTO " . $this->table_name . " (barang_id, jumlah, total_harga, tanggal_transaksi, nama_pembeli) 
                        VALUES (:barang_id, :jumlah, :total_harga, :tanggal_transaksi,:nama_pembeli)";
                $stmt = $this->db->prepare($query);
                
                $params = [
                    ':barang_id' => $data['barang_id'],
                    ':jumlah' => $data['jumlah'],
                    ':total_harga' => $data['total_harga'],
                    ':tanggal_transaksi' => $data['tanggal_transaksi'],
                    ':nama_pembeli' => $data['nama_pembeli']
                ];
                
                $stmt->execute($params);

                
                $stokBaru = $dataBarang['stok'] - $data['jumlah'];
                $queryUpdateStok = "UPDATE barang SET stok = :stok WHERE id = :id";
                $stmtUpdate = $this->db->prepare($queryUpdateStok);
                $stmtUpdate->execute([
                    ':stok' => $stokBaru,
                    ':id' => $data['barang_id']
                ]);

                
                $this->db->commit();
                return true;

            } catch (Exception $e) {
                // Rollback jika terjadi error
                $this->db->rollBack();
                throw $e;
            }
        }

    public function getAll() {
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($data) {
        $query = "UPDATE " . $this->table_name . " SET barang_id=:barang_id, jumlah=:jumlah, total_harga=:total_harga, tanggal_transaksi=:tanggal_transaksi WHERE id=:id";
        $stmt = $this->db->prepare($query);

        $stmt->bindParam(":barang_id", $data['barang_id']);
        $stmt->bindParam(":jumlah", $data['jumlah']);
        $stmt->bindParam(":total_harga", $data['total_harga']);
        $stmt->bindParam(":tanggal_transaksi", $data['tanggal_transaksi']);
        $stmt->bindParam(":id", $data['id']);

        return $stmt->execute();
    }

    public function delete($id) {
        $query = "DELETE FROM " . $this->table_name . " WHERE id=:id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(":id", $id);
        return $stmt->execute();
    }
}
?>