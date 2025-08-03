<?php 
require_once '../../config/db.php'; 
$result = $conn->query("SELECT * FROM anggota"); 
?> 
<h2>Data Anggota</h2> 
<a href="tambah.php">Tambah Anggota</a> 
<table border="1"> 
<tr><th>ID</th><th>Nama</th><th>Aksi</th></tr> 
<?php while($row = $result->fetch_assoc()): ?> 
<tr> 
<td><?= $row['id_anggota'] ?></td> 
<td><?= $row['nama'] ?></td> 
<td> 
<a href="edit.php?id=<?= $row['id_anggota'] ?>">Edit</a> |  
<a href="hapus.php?id=<?= $row['id_anggota'] ?>" onclick="return 
confirm('Hapus?')">Hapus</a> 
</td> 
</tr> 
<?php endwhile; ?> 
</table>