<?php 
require_once '../../config/db.php'; 
$result = $conn->query("SELECT * FROM buku"); 
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <style>
        .table-responsive {
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            overflow: hidden;
        }
        .table thead {
            background-color: #0d6efd;
            color: white;
        }
        .btn-add {
            background-color: #0d6efd;
            color: white;
            transition: all 0.3s;
        }
        .btn-add:hover {
            background-color: #0b5ed7;
            transform: translateY(-2px);
        }
        .action-buttons {
            white-space: nowrap;
        }
    </style>
    <title>Data Buku Perpustakaan</title>
</head>
<body class="bg-light">
    <div class="container py-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="mb-0 fw-bold">
                <i class="bi bi-book-fill me-2"></i>Data Buku
            </h2>
            <a href="tambah.php" class="btn btn-add">
                <i class="bi bi-plus-lg me-1"></i>Tambah Buku
            </a>
        </div>

        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Judul</th>
                        <th>Stok</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    <?php while($row = $result->fetch_assoc()): ?>
                    <tr class="align-middle">
                        <td class="fw-semibold"><?= htmlspecialchars($row['id_buku']) ?></td>
                        <td><?= htmlspecialchars($row['judul']) ?></td>
                        <td><?= htmlspecialchars($row['pengarang']) ?></td>
                        <td><?= htmlspecialchars($row['penerbit']) ?></td>
                        <td><?= htmlspecialchars($row['tahun_terbit']) ?></td>
                        <td><?= htmlspecialchars($row['stok']) ?></td>
                        <td class="action-buttons text-center">
                            <a href="edit.php?id=<?= htmlspecialchars($row['id_buku']) ?>" 
                               class="btn btn-sm btn-warning me-1"
                               data-bs-toggle="tooltip" 
                               title="Edit">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                            <a href="hapus.php?id=<?= htmlspecialchars($row['id_buku']) ?>" 
                               class="btn btn-sm btn-danger" 
                               onclick="return confirm('Yakin ingin menghapus buku ini?')"
                               data-bs-toggle="tooltip"
                               title="Hapus">
                                <i class="bi bi-trash3"></i>
                            </a>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Inisialisasi tooltip Bootstrap
        const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        })
    </script>
</body>
</html>
