<?php
class TransaksiModel extends Database {
    private $table = 'pesanan';
    private $detail_table = 'pesanan_detail';

    public function tambahpesanan($data) {
        try {
            $this->db->beginTransaction();

            // Insert pesanan utama
            $query = "INSERT INTO pesanan (nama, email, total_harga, kode_bank, tanggal_pesanan, image, id_user) 
                      VALUES (:nama, :email, :total_harga, :kode_bank, :tanggal_pesanan, :image, :id_user)";
            
            $stmt = $this->db->prepare($query);
            $result = $stmt->execute([
                ':nama' => $data['nama'],
                ':email' => $data['email'],
                ':total_harga' => $data['total_harga'],
                ':kode_bank' => $data['kode_bank'],
                ':tanggal_pesanan' => $data['tanggal_pesanan'],
                ':image' => $data['image'],
                ':id_user' => $data['id_user']
            ]);

            if (!$result) {
                throw new Exception("Gagal menyimpan pesanan");
            }

            $pesanan_id = $this->db->lastInsertId();
            $cart_items = json_decode($data['cart_items'], true);

            // Insert detail pesanan
            foreach ($cart_items as $item) {
                $detail_query = "INSERT INTO pesanan_detail (id_pesanan, id_produk, nama_produk, harga, quantity) 
                                VALUES (:id_pesanan, :id_produk, :nama_produk, :harga, :quantity)";
                
                $detail_stmt = $this->db->prepare($detail_query);
                $detail_result = $detail_stmt->execute([
                    ':id_pesanan' => $pesanan_id,
                    ':id_produk' => $item['id'],
                    ':nama_produk' => $item['nama'],
                    ':harga' => $item['harga'],
                    ':quantity' => $item['quantity']
                ]);

                if (!$detail_result) {
                    throw new Exception("Gagal menyimpan detail pesanan");
                }
            }

            $this->db->commit();
            return true;

        } catch (Exception $e) {
            $this->db->rollBack();
            error_log("Database Error: " . $e->getMessage());
            return false;
        }
    }

    public function getAllPemasukan($page, $perPage, $search = '') {
        try {
            $offset = ($page - 1) * $perPage;
            
            $query = "SELECT p.*, pd.nama_produk, pd.quantity, pd.harga, 
                            COALESCE(p.status, 'pending') as status 
                     FROM pesanan p 
                     LEFT JOIN pesanan_detail pd ON p.id = pd.id_pesanan 
                     WHERE 1=1";
            
            if (!empty($search)) {
                $query .= " AND (p.nama LIKE :search 
                          OR pd.nama_produk LIKE :search 
                          OR p.tanggal_pesanan LIKE :search)";
            }
            
            $query .= " GROUP BY p.id ORDER BY p.tanggal_pesanan DESC LIMIT :offset, :perPage";
            
            $stmt = $this->db->prepare($query);
            
            if (!empty($search)) {
                $searchParam = "%$search%";
                $stmt->bindParam(':search', $searchParam, PDO::PARAM_STR);
            }
            
            $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
            $stmt->bindParam(':perPage', $perPage, PDO::PARAM_INT);
            $stmt->execute();
            
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch(Exception $e) {
            error_log("Error in getAllPemasukan: " . $e->getMessage());
            return [];
        }
    }

    public function getTotalPemasukan($search = '') {
        try {
            $query = "SELECT COUNT(DISTINCT p.id) as total FROM pesanan p 
                     LEFT JOIN pesanan_detail pd ON p.id = pd.id_pesanan WHERE 1=1";
            
            if (!empty($search)) {
                $query .= " AND (p.nama LIKE :search 
                          OR pd.nama_produk LIKE :search 
                          OR p.tanggal_pesanan LIKE :search)";
            }
            
            $stmt = $this->db->prepare($query);
            
            if (!empty($search)) {
                $searchParam = "%$search%";
                $stmt->bindParam(':search', $searchParam, PDO::PARAM_STR);
            }
            
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result['total'];
        } catch(Exception $e) {
            error_log("Error in getTotalPemasukan: " . $e->getMessage());
            return 0;
        }
    }

    public function updateStatus($id, $newStatus) {
        try {
            $this->db->beginTransaction();
            
            // Update status pesanan
            $query = "UPDATE pesanan SET status = :status WHERE id = :id";
            $stmt = $this->db->prepare($query);
            $params = [
                ':id' => $id,
                ':status' => $newStatus
            ];
            
            if (!$stmt->execute($params)) {
                throw new Exception("Gagal mengupdate status");
            }

            // Jika status berubah menjadi confirmed, kurangi stok
            if ($newStatus === 'confirmed') {
                $details = $this->getPesananDetailById($id);
                foreach ($details as $item) {
                    $queryStok = "UPDATE produk 
                                 SET stok = stok - :quantity 
                                 WHERE id = :id AND stok >= :quantity";
                    $stmtStok = $this->db->prepare($queryStok);
                    $resultStok = $stmtStok->execute([
                        ':quantity' => $item['quantity'],
                        ':id' => $item['id_produk']
                    ]);

                    if ($stmtStok->rowCount() === 0) {
                        throw new Exception("Stok produk {$item['nama_produk']} tidak mencukupi");
                    }
                }
            }
            // Jika status berubah dari confirmed ke pending, kembalikan stok
            else if ($newStatus === 'pending') {
                $details = $this->getPesananDetailById($id);
                foreach ($details as $item) {
                    $queryStok = "UPDATE produk 
                                 SET stok = stok + :quantity 
                                 WHERE id = :id";
                    $stmtStok = $this->db->prepare($queryStok);
                    $stmtStok->execute([
                        ':quantity' => $item['quantity'],
                        ':id' => $item['id_produk']
                    ]);
                }
            }

            $this->db->commit();
            return true;

        } catch(Exception $e) {
            $this->db->rollBack();
            error_log("Error in updateStatus: " . $e->getMessage());
            throw $e;
        }
    }

    public function getPesananById($id) {
        try {
            $query = "SELECT p.* FROM pesanan p WHERE p.id = ?";
            $stmt = $this->db->prepare($query);
            $stmt->execute([$id]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch(Exception $e) {
            error_log("Error in getPesananById: " . $e->getMessage());
            throw $e;
        }
    }

    public function getPesananDetailById($id) {
        try {
            $query = "SELECT 
                        pd.*,
                        b.nama as nama_produk,
                        b.harga as harga_produk
                     FROM pesanan_detail pd 
                     JOIN produk b ON pd.id_produk = b.id 
                     WHERE pd.id_pesanan = ?";
            $stmt = $this->db->prepare($query);
            $stmt->execute([$id]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch(Exception $e) {
            error_log("Error in getPesananDetailById: " . $e->getMessage());
            throw $e;
        }
    }

    public function getStokProduk($id_produk) {
        try {
            $query = "SELECT stok FROM produk WHERE id = :id";
            $stmt = $this->db->prepare($query);
            $stmt->execute([':id' => $id_produk]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result ? $result['stok'] : 0;
        } catch(Exception $e) {
            error_log("Error in getStokProduk: " . $e->getMessage());
            return 0;
        }
    }
    public function delete($id) {
        $query = "DELETE FROM pesanan WHERE id = :id";
        $stmt = $this->db->prepare($query);
        return $stmt->execute([':id' => $id]);
    }
}