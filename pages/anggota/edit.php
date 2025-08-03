<?php 
require_once '../../config/db.php'; 
$id = $_GET['id']; 
$data = $conn->query("SELECT * FROM anggota WHERE id_anggota = $id")->fetch_assoc(); 
if ($_SERVER['REQUEST_METHOD'] === 'POST') { 
$nama = $_POST['nama']; 
$alamat = $_POST['alamat']; 
$no_hp = $_POST['no_hp']; 
$stmt = $conn->prepare("UPDATE anggota SET nama=?, alamat=?, no_hp=? 
WHERE id_anggota=?"); 
$stmt->bind_param("sssi", $nama, $alamat, $no_hp, $id); 
$stmt->execute(); 
header("Location: index.php"); 
exit; 
} 
?> 
<h2>Edit Anggota</h2> 
<form method="POST"> 
<input type="text" name="nama" value="<?= $data['nama'] ?>" required><br> 
<input type="text" name="alamat" value="<?= $data['alamat'] ?>" 
required><br> 
<input type="text" name="no_hp" value="<?= $data['no_hp'] ?>" 
required><br> 
<button type="submit">Update</button> 
</form>