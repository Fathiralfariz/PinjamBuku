<?php 
require_once '../../config/db.php'; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') { 
    $nama = $_POST['nama']; 
    $alamat = $_POST['alamat']; 
    $no_hp = $_POST['no_hp']; 

    $stmt = $conn->prepare("INSERT INTO anggota (nama, alamat, no_hp) VALUES (?, ?, ?)"); 
    $stmt->bind_param("sss", $nama, $alamat, $no_hp); 
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
    <title>Tambah Anggota</title>
</head>
<body class="bg-light">
    <div class="container py-5">
        <h2 class="text-center mb-4">Tambah Anggota</h2>
        <div class="card shadow-sm">
            <div class="card-body">
                <form method="POST">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" name="nama" class="form-control" id="nama" placeholder="Masukkan nama" required>
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <input type="text" name="alamat" class="form-control" id="alamat" placeholder="Masukkan alamat" required>
                    </div>
                    <div class="mb-3">
                        <label for="no_hp" class="form-label">No HP</label>
                        <input type="text" name="no_hp" class="form-control" id="no_hp" placeholder="Masukkan nomor HP" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Simpan</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
