<?php
    //Include db file koneksi
    include_once("config.php");

    //Jika Tombol simpan diklik
    if(isset($_POST['Submit']))
    {
        $simpan = mysqli_query($koneksi, "INSERT INTO bukiu (kode_buku, judul_buku, penulis_buku, penerbit_buku, tahun_penerbit, stok)
            VALUES  ('$_POST[kode_buku]',
                    '$_POST[judul_buku]',
                    '$_POST[penulis_buku]',
                    '$_POST[penerbit_buku]',
                    '$_POST[tahun_penerbit]',
                    '$_POST[stok]')
                    ");
        if($simpan)
        {
            echo "<script>
                    alert('Sukses Menyimpan Data!');
                    document.location = 'index.php';
                    </script>";
        }
        else
        {
            echo "<script>
                    alert('Gagal Menyimpan Data!');
                    document.location = 'index.php';
                    </script>";
        }
    }
?>
