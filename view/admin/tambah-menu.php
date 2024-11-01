<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Handle form submission
    $title = $_POST['title'] ?? '';
    $description = $_POST['description'] ?? '';
    $price = $_POST['price'] ?? '';
    
    // Handle file upload
    if (isset($_FILES['menu_image']) && $_FILES['menu_image']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = 'uploads/';
        $uploadFile = $uploadDir . uniqid() . '_' . basename($_FILES['menu_image']['name']);
        
        if (move_uploaded_file($_FILES['menu_image']['tmp_name'], $uploadFile)) {
            // File uploaded successfully
            // Here you would typically save the menu data to a database
            $success = true;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Menu - Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <div style="background-color: #5c4b4b;" class="fixed left-0 top-0 h-full w-64 text-white">
            <div class="p-6 border-b border-white border-opacity-20">
                <h1 class="text-2xl font-bold">Admin Panel</h1>
            </div>
            <nav class="mt-6">
                <a href="index.php?c=Auth&a=dashboardpage" class="block w-full p-6 hover:bg-white hover:bg-opacity-20">Dashboard</a>
                <a href="index.php?c=Auth&a=laporanpage" class="block w-full p-6 hover:bg-white hover:bg-opacity-20">Tambah Menu</a>
                <a href="index.php?c=Auth&a=tambahmenupage" class="block w-full p-6 bg-white bg-opacity-50">Laporan Keuangan</a>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="flex-1 ml-64 p-8">
            <div class="bg-white p-6 rounded-lg shadow">
                <h2 class="text-2xl font-bold mb-6">Tambah Menu Baru</h2>
                
                <?php if (isset($success)): ?>
                <div class="mb-4 p-4 bg-green-100 text-green-700 rounded">
                    Menu berhasil ditambahkan!
                </div>
                <?php endif; ?>

                <form action="tambah_menu.php" method="POST" enctype="multipart/form-data" class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Judul Menu</label>
                        <input type="text" name="title" required
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Deskripsi Menu</label>
                        <textarea name="description" rows="3" required
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"></textarea>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Harga Menu</label>
                        <input type="number" name="price" required
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Foto Menu</label>
                        <div class="mt-1 flex items-center">
                            <input type="file" name="menu_image" accept="image/*" required
                                class="block w-full text-sm text-gray-500
                                    file:mr-4 file:py-2 file:px-4
                                    file:rounded file:border-0
                                    file:text-sm file:font-semibold
                                    file:bg-[#5c4b4b] file:text-white
                                    hover:file:bg-opacity-80">
                        </div>
                    </div>
                    
                    <button type="submit" 
                        style="background-color: #5c4b4b;" 
                        class="text-white px-4 py-2 rounded hover:opacity-90">
                        Simpan Menu
                    </button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
