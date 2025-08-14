<?php 
require_once '../../config/db.php'; 
$result = $conn->query("SELECT * FROM anggota"); 
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title>Data Anggota</title>
</head>
<body class="bg-light">
    <div class="container py-5">
        <h2 class="text-center mb-4">Data Anggota</h2>
        <div class="text-end mb-3">
            <a href="tambah.php" class="btn btn-primary">Tambah Anggota</a>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="table-light">
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>No HP</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($row = $result->fetch_assoc()): ?> 
                    <tr> 
                        <td><?= htmlspecialchars($row['id_anggota']) ?></td> 
                        <td><?= htmlspecialchars($row['nama']) ?></td> 
                        <td><?= htmlspecialchars($row['alamat']) ?></td>
                        <td><?= htmlspecialchars($row['no_hp']) ?></td>
                        <td>
                            <a href="edit.php?id=<?= htmlspecialchars($row['id_anggota']) ?>" class="btn btn-warning btn-sm">Edit</a>
                            <a href="hapus.php?id=<?= htmlspecialchars($row['id_anggota']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus?')">Hapus</a>
                        </td> 
                    </tr> 
                    <?php endwhile; ?> 
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
