<?php

class pengeluaran extends Database {
    private $table_name = "pengeluaran";
    

    public function __construct() {
        parent::__construct();
    }

    public function tambahpengeluaran($data) {
        try {
            $query = "INSERT INTO pengeluaran (nama, deskripsi, jumlah, tanggal_pengeluaran) 
                      VALUES (:nama, :deskripsi, :jumlah, :tanggal_pengeluaran)";
                      
            $stmt = $this->db->prepare($query);
            
            $params = [
                ':nama' => $data['nama'],
                ':deskripsi' => $data['deskripsi'],
                ':jumlah' => $data['jumlah'],
                ':tanggal_pengeluaran' => $data['tanggal_pengeluaran']
              
            ];
            
            return $stmt->execute($params);
        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    public function getAllData($page = 1, $perPage = 5, $search = '') {
        $offset = ($page - 1) * $perPage;
        $query = "SELECT id, nama, deskripsi, jumlah, tanggal_pengeluaran FROM pengeluaran";
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
    public function getTotalData ($search = '') {
        $query = "SELECT COUNT(*) as total FROM pengeluaran";
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


   

    public function delete($id) {
        $query = "DELETE FROM pengeluaran WHERE id = :id";
        $stmt = $this->db->prepare($query);
        return $stmt->execute([':id' => $id]);
    }

    public function updatepengeluaran($data) {

        $query = "UPDATE pengeluaran SET 
                  nama = :nama,
                  jumlah = :jumlah,
                  deskripsi = :deskripsi
                  WHERE id = :id";
        
        $stmt = $this->db->prepare($query);
        return $stmt->execute([
            ':nama' => $data['nama'],
            ':jumlah' => $data['jumlah'],
            ':deskripsi' => $data['deskripsi'],
            ':id' => $data['id']
        ]);
    }
}
?>