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
<nav class="navbar navbar-expand-sm bg-dark">
  <ul class="navbar-nav">
    <li class="nav-item">
      <a href="form_buku.php" class="btn btn-light" role="button">Add New Book</a>
    </li>
  </ul>
</nav>
<br>
<div class="container-sm mt-3 ">
<table class="table table-bordered">
    <thead class="thead-dark">
<tr>
	<th><center>ID Buku</center></th>
	<th><center>Kode Buku</center></th>
	<th><center>Judul Buku</center></th>
	<th><center>Penulis Buku</center></th>
	<th><center>Penerbit Buku</center></th>
	<th><center>Tahun Penerbit</center></th>
	<th><center>Stok</center></th>
	<th colspan="2"><center>Fungsi</center></th>
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
	echo "<td><a class='btn btn-info' href='edit.php?id=$user_data[id_buku]'>Edit</a>";
	echo "<td><a class='btn btn-danger' href='delete.php?id=$user_data[id_buku]'>Delete</a></td></tr>";
}
?>
</table>
</div>
</body>
</html>