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

        <?php
            $no = 1;
            $tampil = mysqli_query($koneksi, "SELECT * FROM bukiu ORDER BY id_buku");
            while($data = mysqli_fetch_array($tampil)):
        ?>

</table>
</body>
</html>
