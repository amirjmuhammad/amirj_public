<?php 
require_once '../../config/db.php'; 
$id = $_GET['id']; 
$data = $conn->query("SELECT * FROM buku WHERE id_buku = $id")
>fetch_assoc(); 
if ($_SERVER['REQUEST_METHOD'] === 'POST') { 
$judul = $_POST['judul']; 
$pengarang = $_POST['pengarang']; 
$penerbit = $_POST['penerbit']; 
$tahun = $_POST['tahun_terbit']; 
$stok = $_POST['stok']; 
$stmt = $conn->prepare("UPDATE buku SET judul=?, pengarang=?, penerbit=?, 
tahun_terbit=?, stok=? WHERE id_buku=?"); 
$stmt->bind_param("ssssii", $judul, $pengarang, $penerbit, $tahun, $stok, 
$id); 
$stmt->execute(); 
header("Location: index.php"); 
exit; 
} 
?> 
<h2>Edit Buku</h2> 
<form method="POST"> 
<input type="text" name="judul" value="<?= $data['judul'] ?>" 
required><br> 
<input type="text" name="pengarang" value="<?= $data['pengarang'] ?>" 
required><br> 
<input type="text" name="penerbit" value="<?= $data['penerbit'] ?>" 
required><br> 
<input type="number" name="tahun_terbit" value="<?= $data['tahun_terbit'] 
?>" required><br> 
<input type="number" name="stok" value="<?= $data['stok'] ?>" 
required><br> 
<button type="submit">Update</button> 
</form>