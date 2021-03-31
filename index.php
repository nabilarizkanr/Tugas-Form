<?php
include_once("config.php");

//all users data from db 
$result = mysqli_query($mysqli, "SELECT * FROM bukiu ORDER BY id_buku DESC "); 
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<title>Homepage</title>
</head>
<body>
<div class="container">
<a href="form_buku.php">Add New Book</a><br><br>
<table class="table table-bordered">
    <thead class="thead-dark">
<tr>
	<th>ID Buku</th>
	<th>Kode Buku</th>
	<th>Judul Buku</th>
	<th>Penulis Buku</th>
	<th>Penerbit Buku</th>
	<th>Tahun Penerbit</th>
	<th>Stok</th>
	<th>Fungsi</th>
	<th></th>
</tr>
	</thead>
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
	echo "<td><a href='edit.php?id=$user_data[id_buku]'>Edit</a>";
	echo "<td><a href='delete.php?id=$user_data[id_buku]'>Delete</a></td></tr>";
}
?>
</table>
</body>
</html>