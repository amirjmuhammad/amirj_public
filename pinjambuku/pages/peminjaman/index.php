<?php 
require_once '../../config/db.php'; 
$query = "SELECT peminjaman.*, anggota.nama AS nama_anggota, buku.judul AS 
judul_buku  
FROM peminjaman 
JOIN anggota ON peminjaman.id_anggota = anggota.id_anggota 
JOIN buku ON peminjaman.id_buku = buku.id_buku"; 
$result = $conn->query($query); 
?> 
<h2>Data Peminjaman</h2> 
<a href="tambah.php">Tambah Peminjaman</a> 
<table border="1"> 
<tr><th>ID</th><th>Anggota</th><th>Buku</th><th>Tgl 
Pinjam</th><th>Status</th><th>Aksi</th></tr> 
<?php while($row = $result->fetch_assoc()): ?> 
<tr> 
<td><?= $row['id_pinjam'] ?></td> 
<td><?= $row['nama_anggota'] ?></td> 
<td><?= $row['judul_buku'] ?></td> 
<td><?= $row['tanggal_pinjam'] ?></td> 
<td><?= $row['status'] ?></td> 
<td> 
<?php if($row['status'] === 'dipinjam'): ?> 
<a href="kembali.php?id=<?= $row['id_pinjam'] 
?>">Kembalikan</a> 
<?php else: ?> 
Selesai 
<?php endif; ?> 
</td> 
</tr> 
<?php endwhile; ?> 
</table> 