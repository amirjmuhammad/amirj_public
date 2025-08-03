<?php 
require_once '../../config/db.php'; 
$id = $_GET['id']; 
$conn->query("DELETE FROM anggota WHERE id_anggota = $id"); 
header("Location: index.php"); 
exit; 