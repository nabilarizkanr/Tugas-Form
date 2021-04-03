<?php
include_once("config.php");

//Jika tombol simpan di klik
if(isset($_POST['submit']))
{
    //Data akan diedit atau disimpan baru
    if($_GET['hal'] == "edit")
    {
        //Data akan diedit
        $edit = mysqli_query($koneksi, "UPDATE bukiu SET 
                                        kode_buku = '$_POST[kode_buku]',
                                        judul_buku = '$_POST[judul_buku]',
                                        penulis_buku = '$_POST[penulis_buku]',
                                        penerbit_buku = '$_POST[penerbit_buku]',
                                        tahun_penerbit = '$_POST[tahun_penerbit]',
                                        stok = '$_POST[stok]'
                                        WHERE id_buku = '$_GET[id_buku]'
        ");
        if($edit)
        {
            echo "<script>
                    alert('Edit Data Sukses');
                    document.location='index.php';
                    </script>";
        }else
        {
            echo "<script>
                    alert('Edit Data Gagal');
                    document.location='index.php';
                    </script>";
        }
    }else
    {
        //Data akan disimpan baru
        $submit = mysqli_query($koneksi, "INSERT INTO bukiu (kode_buku, judul_buku, penulis_buku, penerbit_buku, tahun_penerbit, stok) VALUES 
        (
        '$_POST[kode_buku]',
        '$_POST[judul_buku]',
        '$_POST[penulis_buku]',
        '$_POST[penerbit_buku]',
        '$_POST[tahun_penerbit]',
        '$_POST[stok]')
        ");
        if($submit)
        {
            echo "<script>
                    alert('Simpan Data Sukses');
                    document.location='index.php';
                    </script>";
        }else
        {
            echo "<script>
                    alert('Simpan Data Gagal');
                    document.location='index.php';
                    </script>";
        }
    }
}

    if(isset($_GET['hal']))
    {
        if($_GET['hal'] == "edit")
        {
            $tampil = mysqli_query($koneksi, "SELECT * FROM bukiu WHERE id_buku='$_GET[id_buku]'
                ");
            $data = mysqli_fetch_array($tampil);
            if($data)
            {
                $ekode_buku = $data['kode_buku'];
                $ejudul_buku = $data['judul_buku'];
                $epenulis_buku = $data['penulis_buku'];
                $epenerbit_buku = $data['penerbit_buku'];
                $etahun_penerbit = $data['tahun_penerbit'];
                $estok = $data['stok'];
            }
        }
        else if($_GET['hal'] == "hapus")
        {
            $hapus = mysqli_query($koneksi, "DELETE FROM bukiu WHERE id_buku='$_GET[id_buku]' ");
            if($hapus)
            {
               echo "<script>
                    alert('Sukses Hapus Data!');
                    document.location = 'index.php';
                    </script>";
             }
        }
    }

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
<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1>SIMPLE LIBRARY</h1>
    <p>Buku Buku Terbaik Di Seluruh Dunia</p>
  </div>
</div>
<div class="container-md mt-3 border bg-white">
<form action="index.php" method="POST" name="form-input-data">
   <center><font style="font-family:cursive; font-size:160%;">Form Input Data Buku</font></center>
   <br><br>
   <form> 
   <div class="form-group">
    <label>Kode Buku</label>
    <input type="text" class="form-control" name="kode_buku" value="<?=@$ekode_buku?>" maxlength="6" placeholder="Masukkan kode buku">
  </div>
  <div class="form-group">
    <label>Judul Buku</label>
    <input type="text" class="form-control" name="judul_buku" value="<?=@$ejudul_buku?>" maxlength="30" placeholder="Masukkan judul buku">
  </div>
  <div class="form-group">
    <label>Penulis Buku</label>
    <input type="text" class="form-control" name="penulis_buku" value="<?=@$epenulis_buku?>" maxlength="30" placeholder="Masukkan penulis buku">
  </div>
  <div class="form-group">
    <label>Penerbit Buku</label>
    <input type="text" class="form-control" name="penerbit_buku" value="<?=@$epenerbit_buku?>" maxlength="30"  placeholder="Masukkan penerbit buku">
  </div>
  <div class="form-group">
    <label>Tahun Terbit</label>
    <input type="text" maxlength="8" class="form-control" name="tahun_penerbit" value="<?=@$etahun_penerbit?>" placeholder="Masukkan tahun terbit buku">
  </div>
  <div class="form-group">
    <label>Stok</label>
    <input type="text" class="form-control" name="stok" value="<?=@$estok?>" maxlength="12"  placeholder="Masukkan stok buku">
  </div>
  <br><center>
  <input type="submit" name="Submit" value="submit" class="btn btn-info">   
                <input type="reset" name="reset" value="Cancel" class="btn btn-danger"></td>
        </tr>
</form><br>
</div>
<div class="container-md mt-3 border bg-white">
<form action="index.php" method="POST" name="form-input-data">
   <center><font style="font-family:cursive; font-size:160%;">Data Buku</font></center>
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
            $no = 1;
            $tampil = mysqli_query($koneksi, "SELECT * FROM bukiu ORDER BY id_buku");
            while($data = mysqli_fetch_array($tampil)):
        ?>

        <tr>
            <td><?=$no++;?></td>
            <td><?=$data['kode_buku']?></td>
            <td><?=$data['judul_buku']?></td>
            <td><?=$data['penulis_buku']?></td>
            <td><?=$data['penerbit_buku']?></td>
            <td><?=$data['tahun_penerbit']?></td>
            <td><?=$data['stok']?></td>
            <td><a class='btn btn-info' href='index.php?hal=edit&id_buku=<?=$data['id_buku']?>'>Edit</a> | 
                <a class='btn btn-danger' href='index.php?hal=hapus&id_buku=<?=$data['id_buku']?>' 
                onclick="return confirm('Apakah yakin ingin menghapus data ini?')">Delete</a></td>
        </tr>

        <?php endwhile; // penutup perulangan 
        ?> 

</table>
</body>
</html>
