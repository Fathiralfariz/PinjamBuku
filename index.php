<?php 
session_start(); 
if (!isset($_SESSION['petugas'])) { 
    header("Location: pages/login.php"); 
    exit; 
} 
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css">
    <title>Dashboard Perpustakaan</title>
</head>
<body class="bg-light">
    <div class="container py-5">
        <div class="text-center mb-5">
            <h2 class="fw-bold text-primary">
                <i class="bi bi-book"></i> Selamat Datang, <?= htmlspecialchars($_SESSION['petugas']['nama']) ?>
            </h2>
            <p class="text-muted">Sistem Manajemen Perpustakaan Digital</p>
        </div>

        <div class="row g-4">
            <div class="col-md-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body text-center py-4">
                        <i class="bi bi-people-fill display-4 text-success mb-3"></i>
                        <h5>Manajemen Anggota</h5>
                        <p class="text-muted mb-4">Kelola data anggota perpustakaan</p>
                        <a href="pages/anggota/" class="btn btn-success">Akses</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body text-center py-4">
                        <i class="bi bi-book-fill display-4 text-primary mb-3"></i>
                        <h5>Manajemen Buku</h5>
                        <p class="text-muted mb-4">Kelola inventaris buku perpustakaan</p>
                        <a href="pages/buku/" class="btn btn-primary">Akses</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body text-center py-4">
                        <i class="bi bi-cart4 display-4 text-warning mb-3"></i>
                        <h5>Peminjaman Buku</h5>
                        <p class="text-muted mb-4">Proses peminjaman dan pengembalian</p>
                        <a href="pages/peminjaman/" class="btn btn-warning">Akses</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-grid gap-2 col-md-4 mx-auto mt-5">
            <a href="logout.php" class="btn btn-outline-danger">
                <i class="bi bi-box-arrow-right"></i> Logout
            </a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
