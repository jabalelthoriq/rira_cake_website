

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
        <div style="background-color: #4b2e2e;" class="fixed left-0 top-0 h-full w-64 text-white">
            <div class="p-6 border-b border-white border-opacity-20">
                <h1 class="text-2xl font-bold">Admin Panel</h1>
            </div>
            <nav class="mt-6">
                <a href="index.php?c=Auth&a=dashboardpage" class="block w-full p-6 bg-white bg-opacity-50">Dashboard</a>
                <a href="index.php?c=Auth&a=laporanpage"
                    class="block w-full p-6 hover:bg-white hover:bg-opacity-20">Laporan Keuangan</a>
                <a href="index.php?c=Auth&a=tambahmenupage"
                    class="block w-full p-6 hover:bg-white hover:bg-opacity-20">Tambah Menu</a>
                <a href="index.php?c=Auth&a=customerpage"
                    class="block w-full p-6 hover:bg-white hover:bg-opacity-20">Customer</a>
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
                                <th class="px-6 py-3 text-left">Kontak</th>
                                <th class="px-6 py-3 text-left">Tanggal Masuk</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            <?php foreach ($employees as $employee): ?>
                            <tr>
                                <td class="px-6 py-4"><?php echo $employee['id_karyawan']; ?></td>
                                <td class="px-6 py-4"><?php echo $employee['nama']; ?></td>
                                <td class="px-6 py-4"><?php echo $employee['kontak']; ?></td>
                                <td class="px-6 py-4"><?php echo $employee['tanggal_masuk']; ?></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
        </div>

        <script>
            const ctxIncome = document.getElementById('incomeChart').getContext('2d');
            const ctxExpense = document.getElementById('expenseChart').getContext('2d');

            const incomeData = <?php echo json_encode(array_column($incomeData, 'jumlah')); ?>;
            const expenseData = <?php echo json_encode(array_column($expenseData, 'jumlah')); ?>;

            const incomeChart = new Chart(ctxIncome, {
                type: 'line',
                data: {
                    labels: incomeData.map((_, index) => `Pemasukan ${index + 1}`), // Label untuk setiap pemasukan
                    datasets: [{
                        label: 'Pemasukan',
                        data: incomeData,
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });

            const expenseChart = new Chart(ctxExpense, {
                type: 'line',
                data: {
                    labels: expenseData.map((_, index) => `Pengeluaran ${index + 1}`), // Label untuk setiap pengeluaran
                    datasets: [{
                        label: 'Pengeluaran',
                        data: expenseData,
                        backgroundColor: 'rgba(255, 99, 132, 0.2)',
                        borderColor: 'rgba(255, 99, 132, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
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