<?php 
require_once '../../config/db.php'; 
if ($_SERVER['REQUEST_METHOD'] === 'POST') { 
$nama = $_POST['nama']; 
$alamat = $_POST['alamat']; 
$no_hp = $_POST['no_hp']; 
$stmt = $conn->prepare("INSERT INTO anggota (nama, alamat, no_hp) VALUES 
(?, ?, ?)"); 
$stmt->bind_param("sss", $nama, $alamat, $no_hp); 
$stmt->execute(); 
header("Location: index.php"); 
exit; 
} 
?> 
<h2>Tambah Anggota</h2> 
<form method="POST"> 
<input type="text" name="nama" placeholder="Nama" required><br> 
<input type="text" name="alamat" placeholder="Alamat" required><br> 
<input type="text" name="no_hp" placeholder="No HP" required><br> 
<button type="submit">Simpan</button> 
</form> 