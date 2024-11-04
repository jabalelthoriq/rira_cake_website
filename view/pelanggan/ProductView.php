<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Produk - Rira Cake</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container py-5">
        <h2 class="mb-4">Daftar Produk</h2>
        
        <div class="row row-cols-1 row-cols-md-3 row-cols-lg-4 g-4">
            <?php if(!empty($products)): ?>
                <?php foreach($products as $product): ?>
                    <div class="col">
                        <div class="card h-100">
                            <img src="<?= BASE_URL ?>/assets/images/products/<?= htmlspecialchars($product['gambar'] ?? 'default.jpg') ?>" 
                                 class="card-img-top" 
                                 alt="<?= htmlspecialchars($product['nama']) ?>"
                                 style="height: 200px; object-fit: cover;">
                            <div class="card-body">
                                <h5 class="card-title"><?= htmlspecialchars($product['nama']) ?></h5>
                                <p class="card-text">
                                    <span class="badge bg-secondary"><?= htmlspecialchars($product['kategori']) ?></span>
                                </p>
                                <p class="card-text">
                                    Stok: <?= htmlspecialchars($product['stok']) ?>
                                </p>
                                <p class="card-text fw-bold">
                                    Rp <?= number_format($product['harga'], 0, ',', '.') ?>
                                </p>
                                <a href="<?= BASE_URL ?>/index.php?c=Product&a=show&id=<?= $product['id'] ?>" 
                                   class="btn btn-primary">Detail</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-12">
                    <div class="alert alert-info">
                        Tidak ada produk yang tersedia.
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>