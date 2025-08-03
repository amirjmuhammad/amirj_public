<?php 
session_start(); 
if (!isset($_SESSION['petugas'])) { 
header("Location: pages/login.php"); 
exit; 
} 
?> 
<h2>Selamat Datang, <?= htmlspecialchars($_SESSION['petugas']['nama']) 
?></h2> 
<ul> 
<li><a href="pages/anggota/">Manajemen Anggota</a></li> 
<li><a href="pages/buku/">Manajemen Buku</a></li> 
<li><a href="pages/peminjaman/">Peminjaman Buku</a></li> 
<li><a href="logout.php">Logout</a></li> 
</ul> 