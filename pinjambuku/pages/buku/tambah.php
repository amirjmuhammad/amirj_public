<?php 
require_once '../../config/db.php'; 
if ($_SERVER['REQUEST_METHOD'] === 'POST') { 
$judul = $_POST['judul']; 
$pengarang = $_POST['pengarang']; 
$penerbit = $_POST['penerbit']; 
$tahun = $_POST['tahun_terbit']; 
$stok = $_POST['stok']; 
$stmt = $conn->prepare("INSERT INTO buku (judul, pengarang, penerbit, 
tahun_terbit, stok) VALUES (?, ?, ?, ?, ?)"); 
$stmt->bind_param("ssssi", $judul, $pengarang, $penerbit, $tahun, $stok); 
$stmt->execute(); 
header("Location: index.php"); 
exit; 
} 
?> 
<h2>Tambah Buku</h2> 
<form method="POST"> 
<input type="text" name="judul" placeholder="Judul Buku" required><br> 
<input type="text" name="pengarang" placeholder="Pengarang" required><br> 
<input type="text" name="penerbit" placeholder="Penerbit" required><br> 
<input type="number" name="tahun_terbit" placeholder="Tahun Terbit" 
required><br> 
<input type="number" name="stok" placeholder="Stok" required><br> 
<button type="submit">Simpan</button> 
</form> 