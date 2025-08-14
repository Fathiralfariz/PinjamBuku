<?php 
require_once '../../config/db.php'; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') { 
    $judul = $_POST['judul']; 
    $pengarang = $_POST['pengarang']; 
    $penerbit = $_POST['penerbit']; 
    $tahun = $_POST['tahun_terbit']; 
    $stok = $_POST['stok']; 

    $stmt = $conn->prepare("INSERT INTO buku (judul, pengarang, penerbit, tahun_terbit, stok) VALUES (?, ?, ?, ?, ?)"); 
    $stmt->bind_param("ssssi", $judul, $pengarang, $penerbit, $tahun, $stok); 
    $stmt->execute(); 

    header("Location: index.php"); 
    exit; 
} 
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title>Tambah Buku</title>
</head>
<body class="bg-light">
    <div class="container py-5">
        <h2 class="text-center mb-4">Tambah Buku</h2>
        <div class="card shadow-sm">
            <div class="card-body">
                <form method="POST">
                    <div class="mb-3">
                        <label for="judul" class="form-label">Judul Buku</label>
                        <input type="text" name="judul" class="form-control" id="judul" placeholder="Masukkan judul buku" required>
                    </div>
                    <div class="mb-3">
                        <label for="pengarang" class="form-label">Pengarang</label>
                        <input type="text" name="pengarang" class="form-control" id="pengarang" placeholder="Masukkan nama pengarang" required>
                    </div>
                    <div class="mb-3">
                        <label for="penerbit" class="form-label">Penerbit</label>
                        <input type="text" name="penerbit" class="form-control" id="penerbit" placeholder="Masukkan nama penerbit" required>
                    </div>
                    <div class="mb-3">
                        <label for="tahun_terbit" class="form-label">Tahun Terbit</label>
                        <input type="number" name="tahun_terbit" class="form-control" id="tahun_terbit" placeholder="Masukkan tahun terbit" required>
                    </div>
                    <div class="mb-3">
                        <label for="stok" class="form-label">Stok</label>
                        <input type="number" name="stok" class="form-control" id="stok" placeholder="Masukkan jumlah stok" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Simpan</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
