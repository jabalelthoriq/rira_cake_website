<?php
class DashboardModel extends Database
{
    public function getIncomeData()
    {
        $query = "SELECT jumlah FROM pemasukkan";
        $stmt = $this->db->query($query);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getExpenseData()
    {
        $query = "SELECT jumlah FROM pengeluaran";
        $stmt = $this->db->query($query);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getEmployees()
    {
        $query = "SELECT * FROM karyawan";
        $stmt = $this->db->query($query);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}