<?php

// Sample transaction data
$transactions = [
    ['date' => '2024-03-01', 'description' => 'Penjualan Menu A', 'amount' => 500000],
    ['date' => '2024-03-02', 'description' => 'Penjualan Menu B', 'amount' => 750000],
    ['date' => '2024-03-03', 'description' => 'Penjualan Menu C', 'amount' => 625000]
];

$expenses = [
    ['date' => '2024-03-01', 'description' => 'Bahan Baku', 'amount' => 300000],
    ['date' => '2024-03-02', 'description' => 'Utilitas', 'amount' => 200000],
    ['date' => '2024-03-03', 'description' => 'Gaji Karyawan', 'amount' => 1500000]
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Keuangan - Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <div style="background-color: #4b2e2e;" class="fixed left-0 top-0 h-full w-64 text-white">
            <div class="p-6 border-b border-white border-opacity-20">
                <h1 class="text-2xl font-bold">Admin Panel</h1>
            </div>
            <nav class="mt-6">
                <a href="index.php?c=Auth&a=dashboardpage" class="block w-full p-6 hover:bg-white hover:bg-opacity-20">Dashboard</a>
                <a href="index.php?c=Auth&a=laporanpage" class="block w-full p-6 bg-white bg-opacity-50">Laporan Keuangan</a>
                <a href="index.php?c=Auth&a=tambahmenupage" class="block w-full p-6 hover:bg-white hover:bg-opacity-20">Tambah Menu</a>
                <a href="index.php?c=Auth&a=customerpage" class="block w-full p-6 hover:bg-white hover:bg-opacity-20">Customer</a>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="flex-1 ml-64 p-8">
            <div class="bg-white p-6 rounded-lg shadow">
                <h2 class="text-2xl font-bold mb-6">Laporan Keuangan</h2>
                
                <!-- Pemasukan -->
                <div class="mb-8">
                    <h4 class="text-md font-semibold mb-2">Detail Pemasukan</h4>
                    <div class="overflow-x-auto">
                        <table class="min-w-full">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left">Tanggal</th>
                                    <th class="px-6 py-3 text-left">Deskripsi</th>
                                    <th class="px-6 py-3 text-left">Jumlah</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                <?php foreach ($transactions as $transaction): ?>
                                <tr>
                                    <td class="px-6 py-4"><?php echo $transaction['date']; ?></td>
                                    <td class="px-6 py-4"><?php echo $transaction['description']; ?></td>
                                    <td class="px-6 py-4">Rp <?php echo number_format($transaction['amount'], 0, ',', '.'); ?></td>
                                </tr>
                                <?php endforeach; ?>
                                <tr class="bg-gray-50 font-semibold">
                                    <td class="px-6 py-4" colspan="2">Total Pemasukan</td>
                                    <td class="px-6 py-4">Rp <?php echo number_format(array_sum(array_column($transactions, 'amount')), 0, ',', '.'); ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Pengeluaran -->
                <div>
                    <h4 class="text-md font-semibold mb-2">Detail Pengeluaran</h4>
                    <div class="overflow-x-auto">
                        <table class="min-w-full">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left">Tanggal</th>
                                    <th class="px-6 py-3 text-left">Deskripsi</th>
                                    <th class="px-6 py-3 text-left">Jumlah</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                <?php foreach ($expenses as $expense): ?>
                                <tr>
                                    <td class="px-6 py-4"><?php echo $expense['date']; ?></td>
                                    <td class="px-6 py-4"><?php echo $expense['description']; ?></td>
                                    <td class="px-6 py-4">Rp <?php echo number_format($expense['amount'], 0, ',', '.'); ?></td>
                                </tr>
                                <?php endforeach; ?>
                                <tr class="bg-gray-50 font-semibold">
                                    <td class="px-6 py-4" colspan="2">Total Pengeluaran</td>
                                    <td class="px-6 py-4">Rp <?php echo number_format(array_sum(array_column($expenses, 'amount')), 0, ',', '.'); ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Summary -->
                <div class="mt-8 p-4 bg-gray-50 rounded-lg">
                    <h4 class="text-lg font-semibold mb-4">Ringkasan</h4>
                    <?php
                    $total_income = array_sum(array_column($transactions, 'amount'));
                    $total_expense = array_sum(array_column($expenses, 'amount'));
                    $profit = $total_income - $total_expense;
                    ?>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div class="p-4 bg-blue-100 rounded">
                            <p class="text-sm text-blue-800">Total Pemasukan</p>
                            <p class="text-lg font-bold text-blue-800">Rp <?php echo number_format($total_income, 0, ',', '.'); ?></p>
                        </div>
                        <div class="p-4 bg-red-100 rounded">
                            <p class="text-sm text-red-800">Total Pengeluaran</p>
                            <p class="text-lg font-bold text-red-800">Rp <?php echo number_format($total_expense, 0, ',', '.'); ?></p>
                        </div>
                        <div class="p-4 <?php echo $profit >= 0 ? 'bg-green-100' : 'bg-red-100'; ?> rounded">
                            <p class="text-sm <?php echo $profit >= 0 ? 'text-green-800' : 'text-red-800'; ?>">Profit/Loss</p>
                            <p class="text-lg font-bold <?php echo $profit >= 0 ? 'text-green-800' : 'text-red-800'; ?>">
                                Rp <?php echo number_format($profit, 0, ',', '.'); ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>