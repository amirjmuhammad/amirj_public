<?php 
require_once '../../config/db.php'; 
$result = $conn->query("SELECT * FROM buku"); 
?> 
<h2>Data Buku</h2> 
<a href="tambah.php">Tambah Buku</a> 
<table border="1"> 
<tr><th>ID</th><th>Judul</th><th>Stok</th><th>Aksi</th></tr> 
<?php while($row = $result->fetch_assoc()): ?> 
<tr> 
<td><?= $row['id_buku'] ?></td> 
<td><?= $row['judul'] ?></td> 
<td><?= $row['stok'] ?></td> 
<td> 
<a href="edit.php?id=<?= $row['id_buku'] ?>">Edit</a> |  
<a href="hapus.php?id=<?= $row['id_buku'] ?>" onclick="return 
confirm('Hapus?')">Hapus</a> 
</td> 
</tr> 
<?php endwhile; ?> 
</table> 