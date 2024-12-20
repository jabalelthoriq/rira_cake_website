
<?php
class ProductModel extends Database {
    private $table = 'produk';

    public function getAllProduct($page = 1, $perPage = 5, $search = '') {
        $offset = ($page - 1) * $perPage;
        $query = "SELECT id, nama, kategori, stok, harga, deskripsi, image FROM produk";
        if(!empty($search)) {
            $query .= " WHERE nama LIKE :search";
        }
        $query .= " LIMIT :offset, :perPage";
        
        $stmt = $this->db->prepare($query);
        
        if(!empty($search)) {
            $stmt->bindValue(':search', "%$search%", PDO::PARAM_STR);
        }
        $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
        $stmt->bindValue(':perPage', $perPage, PDO::PARAM_INT);
        
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);   
    }

    public function getTotalProduct ($search = '') {
        $query = "SELECT COUNT(*) as total FROM produk";
        if(!empty($search)) {
            $query .= " WHERE nama LIKE :search";
        }
        
        $stmt = $this->db->prepare($query);
        if(!empty($search)) {
            $stmt->bindValue(':search', "%$search%", PDO::PARAM_STR);
        }
        
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['total'];
    }


    public function tambahmenu($data) {
        try {
            $query = "INSERT INTO produk (id, nama, kategori, stok, harga, deskripsi, image) 
                      VALUES (:id, :nama, :kategori, :stok, :harga, :deskripsi, :image)";
                      
            $stmt = $this->db->prepare($query);
            
            $params = [
                ':id' => $data['id'],
                ':nama' => $data['nama'],
                ':kategori' => $data['kategori'],
                ':stok' => $data['stok'],
                ':harga' => $data['harga'],
                ':deskripsi' => $data['deskripsi'],
                ':image' => isset($data['image']) ? $data['image'] : NULL 
            ];
            
            return $stmt->execute($params);
        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }
    public function delete($id) {
        $query = "SELECT image FROM produk WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->execute([':id' => $id]);
        $imagePath = $stmt->fetchColumn();
    
        
        $query = "DELETE FROM produk WHERE id = :id";
        $stmt = $this->db->prepare($query);
        if ($stmt->execute([':id' => $id])) {
            $fullImagePath = 'uploads/' . $imagePath;
            if ($imagePath && file_exists($fullImagePath)) {
                unlink($fullImagePath);
            }
            return true;
        }
        return false;
    }
    
    
    public function update($data) {

            $query = "UPDATE produk SET 
                      nama = :nama,
                      kategori = :kategori,
                      stok = :stok,
                      harga = :harga,
                      deskripsi = :deskripsi,
                      image = :image
                      WHERE id = :id";
            
            $stmt = $this->db->prepare($query);
            return $stmt->execute([
                ':nama' => $data['nama'],
                ':kategori' => $data['kategori'],
                ':stok' => $data['stok'],
                ':harga' => $data['harga'],
                ':deskripsi' => $data['deskripsi'],
                ':image' => $data['image'],
                ':id' => $data['id']
            ]);
        }
    }

   
