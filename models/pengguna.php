<?php
class pengguna extends Database {
    
    public function register($data) {
        try {
            $query = "INSERT INTO pengguna (nama, email, password, telepon, alamat) 
                      VALUES (:nama, :email, :password, :telepon, :alamat)";
                      
            $stmt = $this->db->prepare($query);
            
            $params = [
                ':nama' => $data['nama'],
                ':email' => $data['email'],
                ':password' => $data['password'],
                ':telepon' => $data['telepon'],
                ':alamat' => $data['alamat']
            ];
            
            return $stmt->execute($params);
        } catch(PDOException $e) {
            // Untuk debugging
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

        public function login($nama, $password) {
            try {
                $query = "SELECT id_user, nama, password, role FROM pengguna WHERE nama = :nama";
                $stmt = $this->db->prepare($query);
                $stmt->execute([':nama' => $nama]);
                
                if ($user = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    // Verify password using password_verify
                    if (password_verify($password, $user['password'])) {
                        return $user;
                    }
                }
                return false;
            } catch(PDOException $e) {
                error_log("Login Error: " . $e->getMessage());
                return false;
            }
        }
    
    
        public function getAllUsersbyRole($page, $perPage, $search, $role) {
            $offset = ($page - 1) * $perPage;
            
            $query = "SELECT * FROM pengguna 
                      WHERE role = :role 
                      AND (nama LIKE :search 
                      OR email LIKE :search )
                      LIMIT :offset, :perPage";
            
            $stmt = $this->db->prepare($query);
            $searchTerm = "%$search%";
            
            $stmt->bindValue(':role', $role, PDO::PARAM_STR);
            $stmt->bindValue(':search', $searchTerm, PDO::PARAM_STR);
            $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
            $stmt->bindValue(':perPage', $perPage, PDO::PARAM_INT);
            
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

    public function getUserDetail($id) {
        $query = "SELECT * FROM pengguna WHERE id_user = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getTotalUsersbyRole($search, $role) {
        $query = "SELECT COUNT(*) as total 
                  FROM pengguna 
                  WHERE role = :role 
                  AND (nama LIKE :search 
                  OR email LIKE :search)";
        
        $stmt = $this->db->prepare($query);
        $searchTerm = "%$search%";
        
        $stmt->bindValue(':role', $role, PDO::PARAM_STR);
        $stmt->bindValue(':search', $searchTerm, PDO::PARAM_STR);
        
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['total'];
    }

    public function getUserById($id) {
        $query = "SELECT * FROM pengguna WHERE id_user = :id";
        $stmt = $this->db->prepare($query);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    
    public function delete($id) {
        $query = "DELETE FROM pengguna WHERE id_user = :id";
        $stmt = $this->db->prepare($query);
        return $stmt->execute([':id' => $id]);
    }
}