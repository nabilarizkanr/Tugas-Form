<html>
<head>
    <title>Form Input Data Buku</title>

</head>
<body>

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
            <td><input type="submit" name="Submit" value="Submit">   
                <input type="reset" name="reset" value="Cancel"></td>
        </tr>
    </table>
</form>
</div>
</body>
</html>