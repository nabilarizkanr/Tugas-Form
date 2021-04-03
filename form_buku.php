<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>Form Input Data Buku</title>

</head>
<body>
<nav class="navbar navbar-expand-sm bg-dark">
  <ul class="navbar-nav">
    <li class="nav-item">
      <a href="index.php" class="btn btn-light" role="button">HOME</a>
    </li>
  </ul>
</nav>
<div class="container-md mt-3 border bg-white">
<form action="action-input-data.php" method="POST" name="form-input-data">
   <center><font style="font-family:elephant; font-size:160%;">Form Input Data Buku</font></center>
   <br><br>
   <form> 
   <div class="form-group">
    <label>Kode Buku</label>
    <input type="text" class="form-control" placeholder="Masukkan kode buku">
  </div>
  <div class="form-group">
    <label>Judul Buku</label>
    <input type="text" class="form-control" placeholder="Masukkan judul buku">
  </div>
  <div class="form-group">
    <label>Penulis Buku</label>
    <input type="text" class="form-control" placeholder="Masukkan penulis buku">
  </div>
  <div class="form-group">
    <label>Penerbit Buku</label>
    <input type="text" class="form-control" placeholder="Masukkan penerbit buku">
  </div>
  <div class="form-group">
    <label>Tahun Terbit</label>
    <input type="text" maxlength="8" class="form-control" placeholder="Masukkan tahun terbit buku">
  </div>
  <div class="form-group">
    <label>Stok</label>
    <input type="text" class="form-control" placeholder="Masukkan stok buku">
  </div>
  <div class="form-group">
    <label>Penerbit Buku</label>
    <input type="text" class="form-control" placeholder="Masukkan penerbit buku">
  </div>
  <center>
  <input type="submit" name="Submit" value="Add" class="btn btn-info">   
                <input type="reset" name="reset" value="Cancel" class="btn btn-danger"></td>
        </tr>

</form>
</div>
    <?php
//Kalau Form submitted, insert data ke table bukiu
if(isset($_POST['Submit'])) {
    $kode_buku = $_POST['kode_buku'];
    $judul_buku = $_POST['judul_buku'];
    $penulis_buku = $_POST['penulis_buku'];
    $penerbit_buku = $_POST['penerbit_buku'];
    $tahun_penerbit = $_POST['tahun_penerbit'];
    $stok= $_POST['stok'];

    //Include db file koneksi
    include_once("config.php");

    //Insert Data ke Table
    $result = mysqli_query($mysqli,"INSERT INTO bukiu(kode_buku,judul_buku,penulis_buku,penerbit_buku,tahun_penerbit,stok) VALUES ('$kode_buku','judul_buku','penulis_buku','penerbit_buku','tahun_penerbit','stok')");

    //Show Message kalau sukses...
    echo "Added Succesfully. <a href='index.php'>View Data</a>";
}
?>
</div>
</body>
</html>
