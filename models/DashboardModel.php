<?php
class DashboardModel extends Database
{
    public function getIncomeData()
    {
        try {
            $query = "SELECT DATE(tanggal_pesanan) as tanggal, SUM(total_harga) as jumlah 
                      FROM pesanan 
                      GROUP BY DATE(tanggal_pesanan) 
                      ORDER BY tanggal ASC";
            $stmt = $this->db->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch(Exception $e) {
            error_log("Error in getIncomeData: " . $e->getMessage());
            return [];
        }
    }

    public function getExpenseData()
    {
        try {
            $query = "SELECT DATE(tanggal_pengeluaran) as tanggal, SUM(jumlah) as jumlah 
                      FROM pengeluaran 
                      GROUP BY DATE(tanggal_pengeluaran) 
                      ORDER BY tanggal ASC";
            $stmt = $this->db->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch(Exception $e) {
            error_log("Error in getExpenseData: " . $e->getMessage());
            return [];
        }
    }

    // public function getEmployees()
    // {
    //     $query = "SELECT * FROM karyawan";
    //     $stmt = $this->db->query($query);
    //     return $stmt->fetchAll(PDO::FETCH_ASSOC);
    // }
}