

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
    <style>
        .header-container {
            display: flex;
            justify-content: space-between;
        }
        .logout-btn {
            background-color: #fff;
            color: #dc2626;
            border: 1px solid #dc2626;
            padding: 0.5rem 1rem;
            border-radius: 4px;
            cursor: pointer;
            font-size: 0.875rem;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            margin-bottom: 20px;
        }
        .logout-btn:hover {
            background-color: #dc2626;
            color: #fff;
        }
        .logout-icon {
            width: 16px;
            height: 16px;
        }
        .notification-container {
            position: fixed;
            top: 20px;
            right: 20px;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .notification {
            padding: 15px;
            border-radius: 5px;
            width: 300px;
            display: flex;
            align-items: start;
            gap: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            animation: slideIn 0.3s ease-in-out;
            position: relative;
        }

        .notification.hide {
            animation: slideOut 0.3s ease-in-out forwards;
        }

        @keyframes slideIn {
            from {
                transform: translateX(100%);
                opacity: 0;
            }
            to {
                transform: translateX(0);
                opacity: 1;
            }
        }

        @keyframes slideOut {
            from {
                transform: translateX(0);
                opacity: 1;
            }
            to {
                transform: translateX(100%);
                opacity: 0;
            }
        }

        .notification-success {
            background-color: #E8F5E9;
            border-left: 4px solid #4CAF50;
        }
        .notification-icon {
            font-size: 20px;
        }

        .notification-content {
            flex-grow: 1;
        }

        .notification-title {
            font-weight: bold;
            margin-bottom: 5px;
        }

        .notification-message {
            font-size: 14px;
            color: #666;
        }
    </style>
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
                <a href="index.php?c=Auth&a=laporanpage" class="block w-full p-6 hover:bg-white hover:bg-opacity-20">Laporan Keuangan</a>
                <a href="index.php?c=Auth&a=tambahmenupage" class="block w-full p-6 hover:bg-white hover:bg-opacity-20">Tambah Menu</a>
                <a href="index.php?c=Auth&a=customerpage" class="block w-full p-6 hover:bg-white hover:bg-opacity-20">Customer</a>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="flex-1 ml-64 p-8">
            <div class="header-container">
                <h2 class="text-2xl font-bold mb-6">Dashboard</h2>
                <button class="logout-btn" onclick="handleLogout()">
                    <svg class="logout-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                        <polyline points="16 17 21 12 16 7"></polyline>
                        <line x1="21" y1="12" x2="9" y2="12"></line>
                    </svg>
                    Logout
                </button>
            </div>

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

            <!-- Employee Table
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
            </div> -->
        </div>
    </div>

    <script>
        
        const ctxIncome = document.getElementById('incomeChart').getContext('2d');
        const ctxExpense = document.getElementById('expenseChart').getContext('2d');

        // Retrieve income data
        const incomeData = <?php echo json_encode($incomeData ?? []); ?>;
        const formattedIncomeData = incomeData.map(item => ({
            tanggal: formatDate(item.tanggal),
            jumlah: parseFloat(item.jumlah) || 0
        }));

        // Retrieve expense data
        const expenseData = <?php echo json_encode($expenseData ?? []); ?>;
        const formattedExpenseData = expenseData.map(item => ({
            tanggal: formatDate(item.tanggal),
            jumlah: parseFloat(item.jumlah) || 0
        }));

        // Function to format date
        function formatDate(dateString) {
            if (!dateString) return '';
            const date = new Date(dateString);
            return date.toLocaleDateString('id-ID', {
                day: 'numeric',
                month: 'short',
                year: 'numeric'
            });
        }

        // Income Chart
        new Chart(ctxIncome, {
            type: 'line',
            data: {
                labels: formattedIncomeData.map(item => item.tanggal),
                datasets: [{
                    label: 'Pemasukan',
                    data: formattedIncomeData.map(item => item.jumlah),
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1,
                    tension: 0.1,
                    fill: true
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                return 'Rp ' + new Intl.NumberFormat('id-ID').format(context.raw);
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            callback: function(value) {
                                return 'Rp ' + new Intl.NumberFormat('id-ID').format(value);
                            }
                        }
                    },
                    x: {
                        ticks: {
                            maxRotation: 45,
                            minRotation: 45
                        }
                    }
                }
            }
        });

        // Expense Chart
        new Chart(ctxExpense, {
            type: 'line',
            data: {
                labels: formattedExpenseData.map(item => item.tanggal),
                datasets: [{
                    label: 'Pengeluaran',
                    data: formattedExpenseData.map(item => item.jumlah),
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 1,
                    tension: 0.1,
                    fill: true
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                return 'Rp ' + new Intl.NumberFormat('id-ID').format(context.raw);
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            callback: function(value) {
                                return 'Rp ' + new Intl.NumberFormat('id-ID').format(value);
                            }
                        }
                    },
                    x: {
                        ticks: {
                            maxRotation: 45,
                            minRotation: 45
                        }
                    }
                }
            }
        });

        function handleLogout() {
            localStorage.removeItem('token');
            sessionStorage.clear();
            window.location.href = 'index.php?c=Auth&a=homepage';
        }

        function showNotification(type) {
            const container = document.getElementById('notificationContainer');
            
            const icons = {
                success: '✓',
                error: '✕',
                warning: '⚠',
                info: 'ℹ'
            };

            const titles = {
                success: 'Success!',
                error: 'Error!',
                warning: 'Warning!',
                info: 'Information'
            };

            const messages = {
                success: 'Your action was completed successfully.',
                error: 'An error occurred. Please try again.',
                warning: 'Please proceed with caution.',
                info: 'Here is some useful information.'
            };

            const notification = document.createElement('div');
            notification.className = `notification notification-${type}`;
            notification.innerHTML = `
                <div class="notification-icon ${type}-icon">${icons[type]}</div>
                <div class="notification-content">
                    <div class="notification-title">${titles[type]}</div>
                    <div class="notification-message">${messages[type]}</div>
                </div>
                <button class="close-btn" onclick="closeNotification(this.parentElement)">×</button>
            `;

            container.appendChild(notification);

            // Auto remove after 3 seconds
            setTimeout(() => {
                closeNotification(notification);
            }, 3000);
        }
    </script>
</body>

</html>