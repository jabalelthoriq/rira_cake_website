<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Pengeluaran - Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        .popup-overlay { position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.5); display: none; justify-content: center; align-items: center; } 
        .popup-content { background: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); width: 90%; max-width: 500px; } 
        .close-btn { float: right; cursor: pointer; font-size: 20px; }
        
        .header-container {
    display: flex;
    justify-content:space-between;
    margin-bottom: -30px;
    
      
        
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

        .image{
            background-color: #2E8B57;
            color: white;
            padding: 6px;
            border-radius: 5px;
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
                <a href="index.php?c=Auth&a=dashboardpage" class="block w-full p-6 hover:bg-white hover:bg-opacity-20">Dashboard</a>
                <a href="index.php?c=Auth&a=laporanpage" class="block w-full p-6 bg-white bg-opacity-50">Laporan Keuangan</a>
                <a href="index.php?c=Auth&a=tambahmenupage" class="block w-full p-6 hover:bg-white hover:bg-opacity-20">Tambah Menu</a>
                <a href="index.php?c=Auth&a=customerpage" class="block w-full p-6 hover:bg-white hover:bg-opacity-20">Customer</a>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="flex-1 ml-64 p-8 space-y-8">
        <div class="header-container" >
          <h2 class="text-2xl font-bold mb-6">Laporan Keuangan</h2>
            <button class="logout-btn" onclick="handleLogout()">
                <svg class="logout-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                    <polyline points="16 17 21 12 16 7"></polyline>
                    <line x1="21" y1="12" x2="9" y2="12"></line>
                </svg>
                Logout
            </button>
            </div>
            <div class="bg-white p-6 rounded-lg shadow">
            <h2 class="text-lg font-bold mb-4">Input Pengeluaran</h2>
            <form action="index.php?c=Auth&a=tambahpengeluaran" method="POST" class="space-y-4">
    <div>
        <label class="block text-sm font-medium text-gray-700">Nama Pengeluaran</label>
        <input type="text" id="nama" name="nama" required
            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-700">Jumlah (Rp)</label>
        <input type="number" id="jumlah" name="jumlah" required
            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
    </div>
    
    <div>
        <label class="block text-sm font-medium text-gray-700">Deskripsi</label>
        <textarea id="deskripsi" name="deskripsi" rows="3" required
            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"></textarea>
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-700">Tanggal Transaksi</label>
        <input type="date" id="tanggal" name="tanggal" required
            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
    </div>
    
    <button type="submit" 
    style="background-color: #2E8B57;" 
    class="text-white px-4 py-2 rounded hover:opacity-90"
    onclick="return confirmAdd(event)">
        Tambah Pengeluaran
    </button>
</form>
            </div>

            <div class="bg-white p-6 rounded-lg shadow">
            <h2 class="text-lg font-bold mb-4">Data Pengeluaran</h2>
                
                <!-- Informasi Total Data -->
                <?php if(isset($totalData)): ?>
                <div class="mb-4 p-4 bg-gray-100 rounded">
                    Total Data: <?php echo $totalData; ?> data
                    <?php if(!empty($search)): ?>
                        | Hasil pencarian "<?php echo htmlspecialchars($search); ?>": <?php echo count($data); ?> data
                    <?php endif; ?>
                </div>
                <?php endif; ?>


                <!-- Form Pencarian -->
                <div class="mb-4">
                    <form action="index.php" method="GET" class="d-flex">
                        <input type="hidden" name="c" value="Auth">
                        <input type="hidden" name="a" value="laporanpage">  
                        <input type="text" name="search" class="form-control me-2" 
                               placeholder="Cari berdasarkan nama..." 
                               value="<?php echo isset($search) ? htmlspecialchars($search) : ''; ?>">
                        <button type="submit" class="btn btn-primary">Cari</button>
                        <?php if(isset($search) && !empty($search)): ?>
                            <a href="index.php?c=Auth&a=laporanpage" class="btn btn-secondary ms-2">Reset</a>
                        <?php endif; ?>
                    </form>
                </div>

                <?php if(isset($dataPengeluaran) && !empty($dataPengeluaran)): ?>
                    <div class="overflow-x-auto">
                    <table class="table table-bordered">
    <thead class="table-light">
        <tr>
            <th>No</th>
            <th>Nama Pengeluaran</th>
            <th>Jumlah</th>
            <th>Deskripsi</th>
            <th>Tanggal</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        $no = ($page - 1) * $perPage + 1;
        foreach($dataPengeluaran as $pengeluaran): 
        ?>
        <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo htmlspecialchars($pengeluaran['nama']); ?></td>
            <td>Rp <?php echo number_format($pengeluaran['jumlah'], 0, ',', '.'); ?></td>
            <td><?php echo htmlspecialchars($pengeluaran['deskripsi']); ?></td>
            <td><?php echo date('d-m-Y', strtotime($pengeluaran['tanggal_pengeluaran'])); ?></td>
            <td>
            <button class="btn btn-warning btn-sm" onclick="openPopup('<?php echo $pengeluaran['id']; ?>',
                                    '<?php echo htmlspecialchars($pengeluaran['nama'], ENT_QUOTES); ?>', 
                                    '<?php echo htmlspecialchars($pengeluaran['jumlah'], ENT_QUOTES); ?>', 
                                    '<?php echo htmlspecialchars(addslashes($pengeluaran['deskripsi'])); ?>')">Edit Menu</button> 
                   <a href="#" class="btn btn-danger btn-sm" onclick="confirmDelete1(<?php echo $pengeluaran['id']; ?>)">Delete</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

                    </div>

                    

                    <!-- Pagination -->
                    <?php if($totalPages > 1): ?>
                    <nav aria-label="Page navigation" class="mt-4">
                        <ul class="pagination justify-content-center">
                            <!-- Tombol Previous -->
                            <li class="page-item <?php echo ($page <= 1) ? 'disabled' : ''; ?>">
                                <a class="page-link" 
                                   href="index.php?c=Auth&a=laporanpage&page=<?php echo ($page-1); ?><?php echo !empty($search) ? '&search='.$search : ''; ?>">
                                    Previous
                                </a>
                            </li>
                            
                            <?php for($i = 1; $i <= $totalPages; $i++): ?>
                                <li class="page-item <?php echo ($page == $i) ? 'active' : ''; ?>">
                                    <a class="page-link" 
                                       href="index.php?c=Auth&a=laporanpage&page=<?php echo $i; ?><?php echo !empty($search) ? '&search='.$search : ''; ?>">
                                        <?php echo $i; ?>
                                    </a>
                                </li>
                            <?php endfor; ?>

                            <!-- Tombol Next -->
                            <li class="page-item <?php echo ($page >= $totalPages) ? 'disabled' : ''; ?>">
                                <a class="page-link" 
                                   href="index.php?c=Auth&a=laporanpage&page=<?php echo ($page+1); ?><?php echo !empty($search) ? '&search='.$search : ''; ?>">
                                    Next
                                </a>
                            </li>
                        </ul>
                    </nav>
                    <?php endif; ?>
                <?php else: ?>
                    <div class="alert alert-warning text-center">
                        <?php echo !empty($search) ? 'Tidak ada hasil pencarian untuk "'.htmlspecialchars($search).'"' : 'Tidak ada data'; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        
    </div>


    
    <div class="popup-overlay" id="popupOverlay"> 
        <div class="popup-content"> 
            <span class="close-btn" onclick="closePopup()">&times;</span> 
            <h2 class="text-2xl font-bold mb-6">Edit Menu</h2> 
            <form action="index.php?c=Auth&a=updatepengeluaran" method="POST" enctype="multipart/form-data"> 
                <input type="hidden" name="id" id="edit-id"> 
                <div> 
                    <label class="block text-sm font-medium text-gray-700">Nama Pengeluaran</label> 
                    <input type="text" name="nama" id="edit-nama" required 
                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                </div>
                <div class="mt-4"> 
                    <label class="block text-sm font-medium text-gray-700">Jumlah</label> 
                    <input type="number" name="jumlah" id="edit-jumlah" required 
                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                </div>
                <div class="mt-4"> 
                    <label class="block text-sm font-medium text-gray-700">Deskripsi</label> 
                    <textarea name="deskripsi" id="edit-deskripsi" rows="3" required 
                              class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"></textarea>
                </div>
                <div class="mt-6">
                    <button type="submit" style="background-color: #2E8B57;" 
                            class="text-white px-4 py-2 rounded hover:opacity-90"
                            onclick="return confirmEdit(event)">
                        Simpan Perubahan
                    </button>
                </div>
            </form> 
        </div> 
        
    </div>


    <script> 
    
    function openPopup(id, nama, jumlah, deskripsi) {
        
        document.getElementById('edit-id').value = id;
        document.getElementById('edit-nama').value = nama;
        document.getElementById('edit-jumlah').value = jumlah;
        document.getElementById('edit-deskripsi').value = deskripsi;
        
      
        document.getElementById('popupOverlay').style.display = 'flex';
    } 
    function closePopup() { document.getElementById('popupOverlay').style.display = 'none'; } 

    function handleLogout() {
    Swal.fire({
        title: 'Logout Confirmation',
        text: 'Are you sure you want to logout?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, Logout',
        cancelButtonText: 'Cancel'
    }).then((result) => {
        if (result.isConfirmed) {
            localStorage.removeItem('token');
            sessionStorage.clear();
            window.location.href = 'index.php?c=Auth&a=homepage';
        }
    });
}
    </script>
    

    <div class="bg-white p-6 rounded-lg shadow" style="margin-left: 290px; margin-right: 30px; margin-bottom: 40px;">
            <h2 class="text-lg font-bold mb-4">Data Pemasukan</h2>
        
        <?php if(isset($dataPemasukan) && !empty($dataPemasukan)): ?>
            <div class="overflow-x-auto">
                <table class="table table-bordered w-full">
                    <thead class="table-light">
                        <tr>
                            <th class="px-4 py-2" style="width: 5%">No</th>
                            <th class="px-4 py-2" style="width: 15%">Nama Pelanggan</th>
                            <th class="px-4 py-2" style="width: 15%">Total Pemasukan</th>
                            <th class="px-4 py-2" style="width: 10%">Kode Bank</th>
                            <th class="px-4 py-2" style="width: 10%">Tanggal</th>
                            <th class="px-4 py-2" style="width: 15%">Bukti Transfer</th>
                            <th class="px-4 py-2" style="width: 15%">Status</th>
                            <th class="px-4 py-2" style="width: 15%">Aksi</th>
                                
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $no = ($page - 1) * $perPage + 1;
                        foreach($dataPemasukan as $pemasukan): 
                        ?>
                        <tr>
                            <td class="px-4 py-2 text-center"><?php echo $no++; ?></td>
                            <td class="px-4 py-2"><?php echo htmlspecialchars($pemasukan['nama']); ?></td>
                            <td class="px-4 py-2">Rp <?php echo number_format($pemasukan['total_harga'], 0, ',', '.'); ?></td>
                            <td class="px-4 py-2"><?php echo htmlspecialchars($pemasukan['kode_bank']); ?></td>
                            <td class="px-4 py-2"><?php echo date('d-m-Y', strtotime($pemasukan['tanggal_pesanan'])); ?></td>
                            <td class="px-4 py-2 text-center">
                                <a href="payment/<?php echo htmlspecialchars($pemasukan['image']); ?>" 
                                   target="_blank" 
                                   class="btn btn-sm btn-primary">
                                    Lihat Bukti
                                </a>
                            </td>
                            <td class="px-4 py-2 text-center">
                                <button onclick="updateStatus('<?php echo $pemasukan['id']; ?>', '<?php echo $pemasukan['status'] ?? 'pending'; ?>')" 
                                        class="btn btn-sm <?php echo ($pemasukan['status'] ?? 'pending') === 'confirmed' ? 'btn-success' : 'btn-warning'; ?>">
                                    <?php echo ($pemasukan['status'] ?? 'pending') === 'confirmed' ? 'Sudah Dikonfirmasi' : 'Menunggu Konfirmasi'; ?>
                                </button>
                            </td>
                            <td class="px-4 py-2 text-center">
                                <button type="button" class="btn btn-info btn-sm" onclick="showOrderDetails(<?php echo $pemasukan['id']; ?>)">
                                    Detail
                                </button>
                   <a href="#" class="btn btn-danger btn-sm" onclick="confirmDelete2(<?php echo $pemasukan['id']; ?>)">Delete</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <!-- Pagination -->
                <?php if($totalPages > 1): ?>
                    <nav aria-label="Page navigation" class="mt-4">
                        <ul class="pagination justify-content-center">
                            <!-- Tombol Previous -->
                            <li class="page-item <?php echo ($page <= 1) ? 'disabled' : ''; ?>">
                                <a class="page-link" 
                                   href="index.php?c=Auth&a=laporanpage&page=<?php echo ($page-1); ?><?php echo !empty($search) ? '&search='.$search : ''; ?>">
                                    Previous
                                </a>
                            </li>
                            
                            <?php for($i = 1; $i <= $totalPages; $i++): ?>
                                <li class="page-item <?php echo ($page == $i) ? 'active' : ''; ?>">
                                    <a class="page-link" 
                                       href="index.php?c=Auth&a=laporanpage&page=<?php echo $i; ?><?php echo !empty($search) ? '&search='.$search : ''; ?>">
                                        <?php echo $i; ?>
                                    </a>
                                </li>
                            <?php endfor; ?>

                            <!-- Tombol Next -->
                            <li class="page-item <?php echo ($page >= $totalPages) ? 'disabled' : ''; ?>">
                                <a class="page-link" 
                                   href="index.php?c=Auth&a=laporanpage&page=<?php echo ($page+1); ?><?php echo !empty($search) ? '&search='.$search : ''; ?>">
                                    Next
                                </a>
                            </li>
                        </ul>
                    </nav>
                    <?php endif; ?>
                <?php else: ?>
                    <div class="alert alert-warning text-center">
                        <?php echo !empty($search) ? 'Tidak ada hasil pencarian untuk "'.htmlspecialchars($search).'"' : 'Tidak ada data'; ?>
                    </div>
        <?php endif; ?>
    </div>

    

    <!-- Modal Detail Pesanan -->
    <div class="modal fade" id="orderDetailModal" tabindex="-1" aria-labelledby="orderDetailModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="orderDetailModalLabel">Detail Pesanan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="orderDetailContent">
                    <!-- Content will be loaded dynamically -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <script>
    function updateStatus(orderId, currentStatus) {
        const newStatus = currentStatus === 'confirmed' ? 'pending' : 'confirmed';
        const confirmText = currentStatus === 'confirmed' ? 
            'Apakah Anda yakin ingin membatalkan konfirmasi pesanan ini?' : 
            'Apakah Anda yakin ingin mengkonfirmasi pesanan ini?';
        const successText = currentStatus === 'confirmed' ? 
            'Konfirmasi pesanan berhasil dibatalkan!' : 
            'Pesanan berhasil dikonfirmasi!';

        Swal.fire({
            title: 'Konfirmasi Status',
            text: confirmText,
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#2E8B57',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Lanjutkan!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                // Show loading state
                Swal.fire({
                    title: 'Memproses...',
                    allowOutsideClick: false,
                    didOpen: () => {
                        Swal.showLoading();
                    }
                });

                // Send AJAX request
                fetch('index.php?c=Auth&a=updateOrderStatus', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: `id=${orderId}&status=${currentStatus}`
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        Swal.fire({
                            title: 'Berhasil!',
                            text: successText,
                            icon: 'success',
                            timer: 2000,
                            showConfirmButton: false
                        }).then(() => {
                            location.reload(); // Refresh halaman
                        });
                    } else {
                        Swal.fire({
                            title: 'Error!',
                            text: data.message || 'Terjadi kesalahan saat mengubah status',
                            icon: 'error'
                        });
                    }
                })
                .catch(error => {
                    Swal.fire({
                        title: 'Error!',
                        text: 'Terjadi kesalahan pada server',
                        icon: 'error'
                    });
                    console.error('Error:', error);
                });
            }
        });
    }

    function showOrderDetails(orderId) {
        fetch(`index.php?c=Auth&a=getOrderDetails&id=${orderId}`)
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    const pesanan = data.pesanan;
                    const details = data.detail;
                    
                    let detailHtml = `
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <h6 class="fw-bold">Informasi Pesanan</h6>
                                <table class="table table-sm">
                                    <tr>
                                        <td width="40%">Nama</td>
                                        <td>: ${pesanan.nama}</td>
                                    </tr>
                                    <tr>
                                        <td>Email</td>
                                        <td>: ${pesanan.email}</td>
                                    </tr>
                                    <tr>
                                        <td>Tanggal</td>
                                        <td>: ${new Date(pesanan.tanggal_pesanan).toLocaleDateString('id-ID')}</td>
                                    </tr>
                                    <tr>
                                        <td>Kode Bank</td>
                                        <td>: ${pesanan.kode_bank}</td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-md-6">
                                <h6 class="fw-bold">Status Pesanan</h6>
                                <table class="table table-sm">
                                    <tr>
                                        <td width="40%">Status</td>
                                        <td>: <span class="badge ${pesanan.status === 'confirmed' ? 'bg-success' : 'bg-warning'}">
                                            ${pesanan.status === 'confirmed' ? 'Sudah Dikonfirmasi' : 'Menunggu Konfirmasi'}
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Total</td>
                                        <td>: Rp ${new Intl.NumberFormat('id-ID').format(pesanan.total_harga)}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>

                        <div class="table-responsive mt-3">
                            <h6 class="fw-bold">Detail Produk</h6>
                            <table class="table table-bordered">
                                <thead class="table-light">
                                    <tr>
                                        <th class="text-center" width="5%">No</th>
                                        <th>Produk</th>
                                        <th class="text-center" width="15%">Jumlah</th>
                                        <th class="text-end" width="20%">Harga</th>
                                        <th class="text-end" width="20%">Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    ${details.map((item, index) => `
                                        <tr>
                                            <td class="text-center">${index + 1}</td>
                                            <td>${item.nama_produk}</td>
                                            <td class="text-center">${item.quantity}</td>
                                            <td class="text-end">Rp ${new Intl.NumberFormat('id-ID').format(item.harga_produk)}</td>
                                            <td class="text-end">Rp ${new Intl.NumberFormat('id-ID').format(item.harga_produk * item.quantity)}</td>
                                        </tr>
                                    `).join('')}
                                </tbody>
                                <tfoot class="table-light">
                                    <tr>
                                        <td colspan="4" class="text-end fw-bold">Total:</td>
                                        <td class="text-end fw-bold">Rp ${new Intl.NumberFormat('id-ID').format(pesanan.total_harga)}</td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>

                        ${pesanan.image ? `
                            <div class="mt-3">
                                <h6 class="fw-bold">Bukti Pembayaran</h6>
                                <img src="payment/${pesanan.image}" class="img-fluid rounded" style="max-height: 300px">
                            </div>
                        ` : ''}
                    `;
                    
                    document.getElementById('orderDetailContent').innerHTML = detailHtml;
                    // Tampilkan modal menggunakan Bootstrap
                    const modal = new bootstrap.Modal(document.getElementById('orderDetailModal'));
                    modal.show();
                } else {
                    alert(data.message || 'Terjadi kesalahan saat mengambil detail pesanan');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Terjadi kesalahan saat mengambil detail pesanan');
            });
    }

    function confirmDelete1(pengeluaranId) {
    Swal.fire({
        title: 'Confirm Delete',
        text: 'Are you sure you want to delete this extends?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Yes,Delete!',
        cancelButtonText: 'Cancel'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = 'index.php?c=Auth&a=delete3&id=' + pengeluaranId;
        }
    });
}

function confirmDelete2(pemasukanId) {
    Swal.fire({
        title: 'Confirm Delete',
        text: 'Are you sure you want to delete this income?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Yes,Delete!',
        cancelButtonText: 'Cancel'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = 'index.php?c=Auth&a=delete4&id=' + pemasukanId;
        }
    });
}

function confirmAdd(event) {
    event.preventDefault();
    Swal.fire({
        title: 'Konfirmasi',
        text: 'Apakah anda yakin ingin menambah data pengeluaran ini?',
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#2E8B57',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, Tambahkan!',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            // Show loading state
            Swal.fire({
                title: 'Memproses...',
                allowOutsideClick: false,
                didOpen: () => {
                    Swal.showLoading();
                }
            });
            // Submit the form
            event.target.closest('form').submit();
        }
    });
    return false;
}

function confirmEdit(event) {
    event.preventDefault();
    Swal.fire({
        title: 'Konfirmasi',
        text: 'Apakah anda yakin ingin menyimpan perubahan ini?',
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#2E8B57',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, Simpan!',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            // Show loading state
            Swal.fire({
                title: 'Memproses...',
                allowOutsideClick: false,
                didOpen: () => {
                    Swal.showLoading();
                }
            });
            // Submit the form
            event.target.closest('form').submit();
        }
    });
    return false;
}

// Add success notification after form submission
<?php if(isset($_SESSION['success'])): ?>
    Swal.fire({
        title: 'Berhasil!',
        text: '<?php echo $_SESSION['success']; ?>',
        icon: 'success',
        timer: 2000,
        showConfirmButton: false
    });
    <?php unset($_SESSION['success']); ?>
<?php endif; ?>

// Add error notification after form submission
<?php if(isset($_SESSION['error'])): ?>
    Swal.fire({
        title: 'Error!',
        text: '<?php echo $_SESSION['error']; ?>',
        icon: 'error',
        timer: 2000,
        showConfirmButton: false
    });
    <?php unset($_SESSION['error']); ?>
<?php endif; ?>

    </script>

    <!-- Pastikan Bootstrap JS sudah dimuat -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>