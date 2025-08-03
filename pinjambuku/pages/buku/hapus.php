<?php 
require_once '../../config/db.php'; 
$id = $_GET['id']; 
$conn->query("DELETE FROM buku WHERE id_buku = $id"); 
header("Location: index.php"); 
exit; 