<?php 
require_once '../../config/db.php'; 
$id = $_GET['id']; 
// ambil id_buku untuk menambah stok 
$data = $conn->query("SELECT id_buku FROM peminjaman WHERE id_pinjam = $id")
>fetch_assoc(); 
$id_buku = $data['id_buku']; 
// update status & tanggal kembali 
$conn->query("UPDATE peminjaman SET status = 'dikembalikan', tanggal_kembali 
= NOW() WHERE id_pinjam = $id"); 
// tambah stok buku 
$conn->query("UPDATE buku SET stok = stok + 1 WHERE id_buku = $id_buku"); 
header("Location: index.php"); 
exit; 