<?php
include_once("config.php");

//all users data from db 
$result = mysqli_query($mysqli, "SELECT * FROM bukiu ORDER BY id_buku DESC "); 
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
</tr>
<?php
while($user_data = mysqli_fetch_array($result))
{
	echo "<tr>";
	echo "<td>".$user_data['id_buku']."</td>";
	echo "<td>".$user_data['kode_buku']."</td>";
	echo "<td>".$user_data['judul_buku']."</td>";
	echo "<td>".$user_data['penulis_buku']."</td>";
	echo "<td>".$user_data['penerbit_buku']."</td>";
	echo "<td>".$user_data['tahun_penerbit']."</td>";
	echo "<td>".$user_data['stok']."</td>";
	echo "<td><a href='edit.php?id=$user_data[id_buku]'>Edit</a> | <a href='delete.php?id=$user_data[id_buku]'>Delete</a></td></tr>";  
}
?>
</table>
</body>
</html>