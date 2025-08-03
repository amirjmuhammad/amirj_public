<?php 
require_once '../../config/db.php'; 
session_start(); 
if ($_SERVER['REQUEST_METHOD'] === 'POST') { 
$id_anggota = $_POST['id_anggota']; 
$id_buku = $_POST['id_buku']; 
$tanggal_pinjam = date('Y-m-d'); 
$status = 'dipinjam'; 
$id_petugas = $_SESSION['petugas']['id_petugas']; 
$stmt = $conn->prepare("INSERT INTO peminjaman (id_anggota, id_buku, 
id_petugas, tanggal_pinjam, status) VALUES (?, ?, ?, ?, ?)"); 
$stmt->bind_param("iiiss", $id_anggota, $id_buku, $id_petugas, 
$tanggal_pinjam, $status); 
$stmt->execute(); 
// Kurangi stok buku 
$conn->query("UPDATE buku SET stok = stok - 1 WHERE id_buku = $id_buku"); 
header("Location: index.php"); 
exit; 
} 
$anggota = $conn->query("SELECT * FROM anggota"); 
$buku = $conn->query("SELECT * FROM buku WHERE stok > 0"); 
?> 
<h2>Tambah Peminjaman</h2> 
<form method="POST"> 
<label>Anggota</label><br> 
<select name="id_anggota" required> 
<?php while($a = $anggota->fetch_assoc()): ?> 
<option value="<?= $a['id_anggota'] ?>"><?= $a['nama'] ?></option> 
<?php endwhile; ?> 
</select><br> 
<label>Buku</label><br> 
<select name="id_buku" required> 
<?php while($b = $buku->fetch_assoc()): ?> 
<option value="<?= $b['id_buku'] ?>"><?= $b['judul'] ?></option> 
<?php endwhile; ?> 
</select><br> 
<button type="submit">Simpan</button> 
</form> 