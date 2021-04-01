<?php
include_once("config.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Homepage</title>
</head>
<body>
<a href="form_buku.php">Add New Book</a><br><br>
<table width="80%" border="1">
<tr>
	<th>ID Buku</th>
	<th>Kode Buku</th>
	<th>Judul Buku</th>
	<th>Penulis Buku</th>
	<th>Penerbit Buku</th>
	<th>Tahun Penerbit</th>
	<th>Stok</th>
	<th>Opsi</th>
</tr>
	<?php
	$no = 1;
	$tampil = mysqli_query($koneksi, "SELECT * FROM bukiu ORDER BY id_buku");
	while($data = mysqli_fetch_array($tampil)) :
?>

<tr>
	<td><?=$no++;?></td>
	<td><?=$data['kode_buku']?></td>
	<td><?=$data['judul_buku']?></td>
	<td><?=$data['penulis_buku']?></td>
	<td><?=$data['penerbit_buku']?></td>
	<td><?=$data['tahun_penerbit']?></td>
	<td><?=$data['stok']?></td>
	<td><a href='edit.php?id=$user_data[id_buku]'>Edit</a> | <a href='delete.php?id=$user_data[id_buku]'>Delete</a></td>
</tr>

<?php endwhile; // penutup perulangan 
?> 

</table>
</body>
</html>
