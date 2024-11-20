<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Menu - Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
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
        .product-image { max-width: 200px; max-height: 200px; }
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
                <a href="index.php?c=Auth&a=laporanpage" class="block w-full p-6 hover:bg-white hover:bg-opacity-20">Laporan Keuangan</a>
                <a href="index.php?c=Auth&a=tambahmenupage" class="block w-full p-6 bg-white bg-opacity-50">Tambah Menu</a>
                <a href="index.php?c=Auth&a=customerpage" class="block w-full p-6 hover:bg-white hover:bg-opacity-20">Customer</a>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="flex-1 ml-64 p-8 space-y-8">
        <div class="header-container" >
          <h2 class="text-2xl font-bold mb-6">Tambah Menu</h2>
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
                <h2 class="text-lg font-bold mb-4">Tambah Menu Baru</h2>
                
                <?php if (isset($success)): ?>
                <div class="mb-4 p-4 bg-green-100 text-green-700 rounded">
                    Menu berhasil ditambahkan!
                </div>
                <?php endif; ?>

                <form action="index.php?c=Auth&a=tambahmenu" method="POST" enctype="multipart/form-data" class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Nama Menu</label>
                        <input type="text" id="nama" name="nama" required
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Kategori</label>
                        <input type="text" id="kategori" name="kategori" required
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Stok</label>
                        <input type="text" id="stok" name="stok" required
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Harga Menu</label>
                        <input type="text" id="harga" name="harga" required
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Deskripsi Menu</label>
                        <textarea id="deskripsi" name="deskripsi" rows="3" required
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"></textarea>
                    </div>
                    
        
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Foto Menu</label>
                        <div class="mt-4">
                            <?php if (!empty($product['image'])): ?>
                                <img src="uploads/<?php echo htmlspecialchars($product['image']); ?>" alt="Product Image" class="product-image" />
                            <?php else: ?>
                                <p>No image available.</p>
                            <?php endif; ?>
                            <input type="hidden" name="image_lama" value="<?= htmlspecialchars($product['image']); ?>">
                        </div>
                        <input type="file" name="image" accept="image/*"
                               class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded file:border-0 file:text-sm file:font-semibold file:bg-[#5c4b4b] file:text-white hover:file:bg-opacity-80">
                    </div>
                    
                    <button type="submit" 
                        style="background-color: #2E8B57;" 
                        class="text-white px-4 py-2 rounded hover:opacity-90"
                        onclick="showNotification('success')">
                        Simpan Menu
                    </button>
                    <div class="notification-container" id="notificationContainer"></div>
                </form>
            </div>

            <div class="bg-white p-6 rounded-lg shadow">
                <h2 class="text-lg font-bold mb-4">Data Produk</h2>
                
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
                        <input type="hidden" name="a" value="tambahmenupage">  
                        <input type="text" name="search" class="form-control me-2" 
                               placeholder="Cari berdasarkan nama..." 
                               value="<?php echo isset($search) ? htmlspecialchars($search) : ''; ?>">
                        <button type="submit" class="btn btn-primary">Cari</button>
                        <?php if(isset($search) && !empty($search)): ?>
                            <a href="index.php?c=Auth&a=tambahmenupage" class="btn btn-secondary ms-2">Reset</a>
                        <?php endif; ?>
                    </form>
                </div>

                <?php if(isset($data) && !empty($data)): ?>
                    <div class="overflow-x-auto">
                        <table class="table table-bordered">
                            <thead class="table-light">
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Kategori</th>
                                    <th>Stok</th>
                                    <th>Harga</th>
                                    <th>Deskripsi</th>
                                    <th>Image</th>
                                    <th>Aksi</th>
                                </tr>   
                            </thead>
                            <tbody>
                                <?php 
                                $no = ($page - 1) * $perPage + 1;
                                foreach($data as $product): 
                                ?>
                                <tr>
                                
                                <td><?php echo $no++; ?></td>   
                                    <td><?php echo htmlspecialchars($product['nama']); ?></td>
                                    <td><?php echo htmlspecialchars($product['kategori']); ?></td>
                                    <td><?php echo htmlspecialchars($product['stok']); ?></td>
                                    <td><?php echo htmlspecialchars($product['harga']); ?></td>
                                    <td><?php echo htmlspecialchars($product['deskripsi']); ?></td>
                                    <td><img src="uploads/<?php echo htmlspecialchars($product['image']); ?>" alt="Product Image" class="product-image" /></td>

                                    <td>
                                <button class="btn btn-warning btn-sm" onclick="openPopup('<?php echo $product['id']; ?>',
                                    '<?php echo htmlspecialchars($product['nama'], ENT_QUOTES); ?>', 
                                    '<?php echo htmlspecialchars($product['kategori'], ENT_QUOTES); ?>', 
                                    '<?php echo htmlspecialchars($product['stok'], ENT_QUOTES); ?>', 
                                    '<?php echo htmlspecialchars($product['harga'], ENT_QUOTES); ?>', 
                                    '<?php echo htmlspecialchars($product['deskripsi'], ENT_QUOTES); ?>',
                                    '<?php echo htmlspecialchars($product['image']); ?>')">Edit Menu</button> 
                                    
                                        <a href="index.php?c=Auth&a=delete2&id=<?php echo $product['id']; ?>" 
                                           class="btn btn-danger btn-sm" 
                                           onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                                           <!-- <a href="index.php?c=Auth&a=downloadPDF&id=<?php echo $user['id']; ?>" 
                                           class="btn btn-info btn-sm">
                                           <i class="fas fa-file-pdf"></i>Cetak PDF
                                        </a> -->
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
                                   href="index.php?c=Auth&a=tambahmenupage&page=<?php echo ($page-1); ?><?php echo !empty($search) ? '&search='.$search : ''; ?>">
                                    Previous
                                </a>
                            </li>
                            
                            <?php for($i = 1; $i <= $totalPages; $i++): ?>
                                <li class="page-item <?php echo ($page == $i) ? 'active' : ''; ?>">
                                    <a class="page-link" 
                                       href="index.php?c=Auth&a=tambahmenupage&page=<?php echo $i; ?><?php echo !empty($search) ? '&search='.$search : ''; ?>">
                                        <?php echo $i; ?>
                                    </a>
                                </li>
                            <?php endfor; ?>

                            <!-- Tombol Next -->
                            <li class="page-item <?php echo ($page >= $totalPages) ? 'disabled' : ''; ?>">
                                <a class="page-link" 
                                   href="index.php?c=Auth&a=tambahmenupage&page=<?php echo ($page+1); ?><?php echo !empty($search) ? '&search='.$search : ''; ?>">
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
            <form action="index.php?c=Auth&a=update" method="POST" enctype="multipart/form-data"> 
                <input type="hidden" name="id" id="edit-id"> 
                <div> 
                    <label class="block text-sm font-medium text-gray-700">Nama Menu</label> 
                    <input type="text" name="nama" id="edit-nama" required 
                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                </div>
                <div class="mt-4"> 
                    <label class="block text-sm font-medium text-gray-700">Kategori</label> 
                    <input type="text" name="kategori" id="edit-kategori" required 
                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                </div>
                <div class="mt-4"> 
                    <label class="block text-sm font-medium text-gray-700">Stok</label> 
                    <input type="text" name="stok" id="edit-stok" required 
                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                </div>
                <div class="mt-4"> 
                    <label class="block text-sm font-medium text-gray-700">Harga</label> 
                    <input type="text" name="harga" id="edit-harga" required 
                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                </div>
                <div class="mt-4"> 
                    <label class="block text-sm font-medium text-gray-700">Deskripsi</label> 
                    <textarea name="deskripsi" id="edit-deskripsi" rows="3" required 
                              class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"></textarea>
                </div>
                <div class="mt-4"> 
                    <label class="block text-sm font-medium text-gray-700">Foto Menu</label> 
                    <div class="mt-4">
                        <img id="edit-image" src="uploads/<?php echo htmlspecialchars($product['image']); ?>" alt="Product Image" class="product-image" style="display: none;">
                        <input type="hidden" name="image_lama" id="image_lama" >
                    </div>
                    <input type="file" name="image" accept="image/*"
                           class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded file:border-0 file:text-sm file:font-semibold file:bg-[#5c4b4b] file:text-white hover:file:bg-opacity-80">
                </div>
                
                <div class="mt-6">
                    <button type="submit" style="background-color: #2E8B57;" 
                            class="text-white px-4 py-2 rounded hover:opacity-90">
                        Simpan Perubahan
                    </button>
                </div>
            </form> 
        </div> 
    </div>
    <script> 
    
    function openPopup(id, nama, kategori, stok, harga, deskripsi, image) {
        document.getElementById('edit-id').value = id;
        document.getElementById('edit-nama').value = nama;
        document.getElementById('edit-kategori').value = kategori;
        document.getElementById('edit-stok').value = stok;
        document.getElementById('edit-harga').value = harga;
        document.getElementById('edit-deskripsi').value = deskripsi;

        // Set the image source for the edit form
        const imageElement = document.getElementById('edit-image');
        if (imageElement) {
            imageElement.src = 'uploads/' + image; // Set the image source
        }

        document.getElementById('popupOverlay').style.display = 'flex';
    } 
    function closePopup() { document.getElementById('popupOverlay').style.display = 'none'; } 

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

        function handleLogout() {
            
            localStorage.removeItem('token');
            sessionStorage.clear();

            window.location.href = 'index.php?c=Auth&a=homepage';
        } 
    </script>
</body>
</html>