

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer - Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .header-container {
    display: flex;
    justify-content:space-between;
    
      
        
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
                <a href="index.php?c=Auth&a=tambahmenupage" class="block w-full p-6 hover:bg-white hover:bg-opacity-20">Tambah Menu</a>
                <a href="index.php?c=Auth&a=customerpage" class="block w-full p-6 bg-white bg-opacity-50">Customer</a>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="flex-1 ml-64 p-8">
        <div class="header-container" >
          <h2 class="text-2xl font-bold mb-6">Customer</h2>
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
                <h2 class="text-lg font-bold mb-4">Data Customer</h2>
                
                <!-- Informasi Total Data -->
                <?php if(isset($totalData)): ?>
                <div class="alert alert-info">
                    Total Data: <?php echo $totalData; ?> data
                    <?php if(!empty($search)): ?>
                        | Hasil pencarian "<?php echo htmlspecialchars($search); ?>": <?php echo count($data); ?> data
                    <?php endif; ?>
                </div>
                <?php endif; ?>


                <!-- Form Pencarian -->
                <div class="row mb-3">
                    <div class="col-md-6">
                        <form action="index.php" method="GET" class="d-flex">
                            <input type="hidden" name="c" value="Auth">
                            <input type="hidden" name="a" value="customerpage">  
                            <input type="text" name="search" class="form-control me-2" 
                                   placeholder="Cari berdasarkan nama..." 
                                   value="<?php echo isset($search) ? htmlspecialchars($search) : ''; ?>">
                            <button type="submit" class="btn btn-primary">Cari</button>
                            <?php if(isset($search) && !empty($search)): ?>
                                <!-- <a href="index.php?c=Auth&a=customer" class="btn btn-secondary ms-2">Reset</a> -->
                            <?php endif; ?>
                        </form>
                    </div>
                    <?php if(isset($totalData)): ?>
                    <div class="col-md-6 text-end">
                        Menampilkan <?php echo count($data); ?> dari <?php echo $totalData; ?> data
                        (Halaman <?php echo $page; ?> dari <?php echo $totalPages; ?>)
                    </div>
                    <?php endif; ?>
                </div>
        
        <?php if(isset($data) && !empty($data)): ?>
            <table class="table table-bordered">
                <thead class="table-light">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Telepon</th>
                        <th>Alamat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $no = ($page - 1) * $perPage + 1;
                    foreach($data as $user): 
                    ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $user['nama']; ?></td>
                        <td><?php echo $user['email']; ?></td>
                        <td><?php echo $user['telepon']; ?></td>
                        <td><?php echo $user['alamat']; ?></td>
                        <td>
                            <!-- <a href="index.php?c=Auth&a=edit&id=<?php echo $user['id_user']; ?>" 
                               class="btn btn-warning btn-sm">Edit</a> -->
                            <a href="index.php?c=Auth&a=delete&id=<?php echo $user['id_user']; ?>" 
                               class="btn btn-danger btn-sm" 
                               onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                               <a href="index.php?c=Auth&a=downloadPDF&id=<?php echo $user['id_user']; ?>" 
       class="btn btn-info btn-sm">
       <i class="fas fa-file-pdf"></i>Cetak PDF
    </a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <!-- Pagination -->
            <?php if($totalPages > 1): ?>
            <nav aria-label="Page navigation">
                <ul class="pagination justify-content-center">
                    <!-- Tombol Previous -->
                    <li class="page-item <?php echo ($page <= 1) ? 'disabled' : ''; ?>">
                        <a class="page-link" 
                           href="index.php?c=Auth&a=customerpage&page=<?php echo ($page-1); ?><?php echo !empty($search) ? '&search='.$search : ''; ?>">
                            Previous
                        </a>
                    </li>
                    
                    <?php for($i = 1; $i <= $totalPages; $i++): ?>
                        <li class="page-item <?php echo ($page == $i) ? 'active' : ''; ?>">
                            <a class="page-link" 
                               href="index.php?c=Auth&a=customerpage&page=<?php echo $i; ?><?php echo !empty($search) ? '&search='.$search : ''; ?>">
                                <?php echo $i; ?>
                            </a>
                        </li>
                    <?php endfor; ?>

                    <!-- Tombol Next -->
                    <li class="page-item <?php echo ($page >= $totalPages) ? 'disabled' : ''; ?>">
                        <a class="page-link" 
                           href="index.php?c=Auth&a=customerpage&page=<?php echo ($page+1); ?><?php echo !empty($search) ? '&search='.$search : ''; ?>">
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
    <script>
        function handleLogout() {
            
            localStorage.removeItem('token');
            sessionStorage.clear();

            window.location.href = 'index.php?c=Auth&a=homepage';
        }
    </script>
</body>
</html>