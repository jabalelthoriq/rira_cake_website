<?php
$financialData = [
    ['name' => 'Jan', 'income' => 12000000, 'expense' => 8000000],
    ['name' => 'Feb', 'income' => 19000000, 'expense' => 12000000],
    ['name' => 'Mar', 'income' => 15000000, 'expense' => 9000000],
    ['name' => 'Apr', 'income' => 17000000, 'expense' => 11000000],
    ['name' => 'May', 'income' => 20000000, 'expense' => 13000000],
    ['name' => 'Jun', 'income' => 23000000, 'expense' => 15000000]
];

$employees = [
    ['id' => 1, 'name' => 'John Doe', 'position' => 'Manager', 'contact' => '081234567890'],
    ['id' => 2, 'name' => 'Jane Smith', 'position' => 'Chef', 'contact' => '082345678901'],
    ['id' => 3, 'name' => 'Mike Johnson', 'position' => 'Waiter', 'contact' => '083456789012']
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
</head>
<body class="bg-gray-100">
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <div style="background-color: #5c4b4b;" class="fixed left-0 top-0 h-full w-64 text-white">
            <div class="p-6 border-b border-white border-opacity-20">
                <h1 class="text-2xl font-bold">Admin Panel</h1>
            </div>
            <nav class="mt-6">
                <a href="index.php?c=Auth&a=dashboardpage" class="block w-full p-6 bg-white bg-opacity-50">Dashboard</a>
                <a href="index.php?c=Auth&a=laporanpage" class="block w-full p-6 hover:bg-white hover:bg-opacity-20">Tambah Menu</a>
                <a href="index.php?c=Auth&a=tambahmenupage" class="block w-full p-6 hover:bg-white hover:bg-opacity-20">Laporan Keuangan</a>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="flex-1 ml-64 p-8">
            <h2 class="text-2xl font-bold mb-6">Dashboard</h2>
            
            <!-- Charts -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
                <div class="bg-white p-4 rounded-lg shadow">
                    <h3 class="text-lg font-semibold mb-4">Grafik Pemasukan</h3>
                    <canvas id="incomeChart"></canvas>
                </div>
                
                <div class="bg-white p-4 rounded-lg shadow">
                    <h3 class="text-lg font-semibold mb-4">Grafik Pengeluaran</h3>
                    <canvas id="expenseChart"></canvas>
                </div>
            </div>

            <!-- Employee Table -->
            <div class="bg-white p-6 rounded-lg shadow">
                <h3 class="text-lg font-semibold mb-4">Detail Karyawan</h3>
                <div class="overflow-x-auto">
                    <table class="min-w-full">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left">ID</th>
                                <th class="px-6 py-3 text-left">Nama</th>
                                <th class="px-6 py-3 text-left">Posisi</th>
                                <th class="px-6 py-3 text-left">Kontak</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            <?php foreach ($employees as $employee): ?>
                            <tr>
                                <td class="px-6 py-4"><?php echo $employee['id']; ?></td>
                                <td class="px-6 py-4"><?php echo $employee['name']; ?></td>
                                <td class="px-6 py-4"><?php echo $employee['position']; ?></td>
                                <td class="px-6 py-4"><?php echo $employee['contact']; ?></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Initialize Charts
        const months = <?php echo json_encode(array_column($financialData, 'name')); ?>;
        const incomeData = <?php echo json_encode(array_column($financialData, 'income')); ?>;
        const expenseData = <?php echo json_encode(array_column($financialData, 'expense')); ?>;

        // Income Chart
        new Chart(document.getElementById('incomeChart'), {
            type: 'line',
            data: {
                labels: months,
                datasets: [{
                    label: 'Pemasukan',
                    data: incomeData,
                    borderColor: '#5c4b4b',
                    tension: 0.1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Expense Chart
        new Chart(document.getElementById('expenseChart'), {
            type: 'line',
            data: {
                labels: months,
                datasets: [{
                    label: 'Pengeluaran',
                    data: expenseData,
                    borderColor: '#82ca9d',
                    tension: 0.1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</body>
</html>
