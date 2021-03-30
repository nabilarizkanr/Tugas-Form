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