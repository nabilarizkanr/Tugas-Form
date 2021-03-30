<html>
<head>
    <title>Form Input Data Buku</title>

</head>
<body>
    <a href="index.php">Go To Home</a>
    <br><br>
    
<form action="action-input-data.php" method="POST" name="form-input-data">
    <table>
        <tr>
                <td> </td>
                <td> </td>
                <td><font>Form Input Data Buku</font></td>
        </tr>
        <tr>
            <td> </td>
            <td>Kode Buku</td>
            <td><input type="text" name="kode_buku" maxlength="6" /></td>
        </tr>
        <tr>
            <td> </td>
            <td>Judul Buku</td>
            <td><input type="text" name="judul_buku" maxlength="30" /></td>
        </tr>
        <tr>
            <td> </td>
            <td>Penulis Buku</td>
            <td><input type="text" name="penulis_buku" maxlength="30" /></td>
        </tr>
        <tr>
            <td> </td>
            <td>Penerbit Buku</td>
            <td><input type="text" name="penerbit_buku" maxlength="30" /></td>
        </tr>
        <tr>
            <td> </td>
            <td>Tahun Terbit</td>
            <td><input type="text" name="tahun_penerbit" maxlength="12" /></td>
        </tr>
        <tr>
            <td> </td>
            <td>Stok</td>
            <td><input type="text" name="stok" maxlength="12" /></td>
        </tr>
        <tr>
            <td> </td>
            <td> </td>
            <td><input type="submit" name="Submit" value="Add">   
                <input type="reset" name="reset" value="Cancel"></td>
        </tr>
    </table>
</form>
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
