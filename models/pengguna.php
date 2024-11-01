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
    
    
    public function getAllUsers($page = 1, $perPage = 5, $search = '') {
        $offset = ($page - 1) * $perPage;
        
        $query = "SELECT id_user, nama, email, telepon, alamat, role FROM pengguna";
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

    public function getUserDetail($id) {
        $query = "SELECT * FROM pengguna WHERE id_user = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getTotalUsers($search = '') {
        $query = "SELECT COUNT(*) as total FROM pengguna";
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

    public function getUserById($id) {
        $query = "SELECT * FROM pengguna WHERE id_user = :id";
        $stmt = $this->db->prepare($query);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    public function update($data) {
        if(empty($data['password'])) {
            $query = "UPDATE pengguna SET 
                      nama = :nama,
                      email = :email,
                      telepon = :telepon,
                      alamat = :alamat
                      WHERE id_user = :id_user";
            
            $stmt = $this->db->prepare($query);
            return $stmt->execute([
                ':nama' => $data['nama'],
                ':email' => $data['email'],
                ':telepon' => $data['telepon'],
                ':alamat' => $data['alamat'],
                ':id_user' => $data['id_user']
            ]);
        } else {
            $query = "UPDATE pengguna SET 
                      nama = :nama,
                      email = :email,
                      telepon = :telepon,
                      alamat = :alamat,
                      password = :password
                      WHERE id_user = :id_user";
            
            $stmt = $this->db->prepare($query);
            return $stmt->execute([
                ':nama' => $data['nama'],
                ':email' => $data['email'],
                ':telepon' => $data['telepon'],
                ':alamat' => $data['alamat'],
                ':password' => password_hash($data['password'], PASSWORD_DEFAULT),
                ':id_user' => $data['id_user']
            ]);
        }
    }
    
    public function delete($id) {
        $query = "DELETE FROM pengguna WHERE id_user = :id";
        $stmt = $this->db->prepare($query);
        return $stmt->execute([':id' => $id]);
    }
}