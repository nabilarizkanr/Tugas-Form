<?php
include_once("config.php");

    //Jika Tombol simpan diklik
    if(isset($_POST['Submit']))
    {
        //Pengujian apakah data diedit atau simpan baru
        if($_GET['hal'] == "edit")
        {
            //Data akan di edit
            $edit = mysqli_query($koneksi, "UPDATE bukiu SET 
            	  id_buku		='$_POST[id_buku]', 
                  kode_buku     ='$_POST[kode_buku]',
                  judul_buku    ='$_POST[judul_buku]',
                  penulis_buku  ='$_POST[penulis_buku]',
                  penerbit_buku ='$_POST[penerbit_buku]',
                  tahun_penerbit='$_POST[tahun_penerbit]',
                  stok          ='$_POST[stok]' WHERE id_buku = '$_GET[id_buku]'
                    ");
        if($edit)
        {
            echo "<script>
                    alert('Sukses Update Data!');
                    document.location = 'index.php';
                    </script>";
        }
        else
        {
            echo "<script>
                    alert('Gagal Update Data!');
                    document.location = 'index.php';
                    </script>";
        }
        }else
        {
            //Data akan disimpan baru
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
            
    }

	//Kalau tekan tombol edit, maka :
    if(isset($_GET['hal']))
    {
    	if($_GET['hal'] == "edit")
    	{
    		//Menampilkan data yang diedit
    		$tampil = mysqli_query($koneksi, "SELECT * FROM bukiu WHERE id_buku = '$_GET[id_buku]'
    			");
    		$data = mysqli_fetch_array($tampil);
    		if($data)
    		{
    			$ekode_buku		= $data['kode_buku'];
    			$ejudul_buku	= $data['judul_buku'];
    			$epenulis_buku	= $data['penulis_buku'];
    			$epenerbit_buku	= $data['penerbit_buku'];
    			$etahun_penerbit= $data['tahun_penerbit'];
    			$estok			= $data['stok'];
    		}
    	}else if($_GET['hal'] == "hapus")
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
	<title>Homepage</title>
</head>
<body>
<form action="add.php" method="POST" name="form-input-data">
    <table>
        <tr>
                <td> </td>
                <td> </td>
                <td><font>Form Input Data Buku</font></td>
        </tr>
        <tr>
            <td> </td>
            <td>Kode Buku</td>
            <td><input type="text" name="kode_buku" value="<?=@$ekode_buku?>" maxlength="6" /></td>
        </tr>
        <tr>
            <td> </td>
            <td>Judul Buku</td>
            <td><input type="text" name="judul_buku" value="<?=@$ejudul_buku?>" maxlength="30" /></td>
        </tr>
        <tr>
            <td> </td>
            <td>Penulis Buku</td>
            <td><input type="text" name="penulis_buku" value="<?=@$epenulis_buku?>" maxlength="30" /></td>
        </tr>
        <tr>
            <td> </td>
            <td>Penerbit Buku</td>
            <td><input type="text" name="penerbit_buku" value="<?=@$epenerbit_buku?>" maxlength="30" /></td>
        </tr>
        <tr>
            <td> </td>
            <td>Tahun Terbit</td>
            <td><input type="text" name="tahun_penerbit" value="<?=@$etahun_penerbit?>" maxlength="12" /></td>
        </tr>
        <tr>
            <td> </td>
            <td>Stok</td>
            <td><input type="text" name="stok" value="<?=@$estok?>" maxlength="12" /></td>
        </tr>
        <tr>
            <td> </td>
            <td> </td>
            <td><input type="submit" name="Submit" value="submit">   
                <input type="reset" name="reset" value="Cancel"></td>
        </tr>
    </table>
</form>
        <tr>
                <td><font>Data Buku</font></td>
        </tr>
<table width="80%" border="1">

		<tr>
			<th>ID Buku</th>
			<th>Kode Buku</th>
			<th>Judul Buku</th>
			<th>Penulis Buku</th>
			<th>Penerbit Buku</th>
			<th>Tahun Penerbit</th>
			<th>Stok</th>
			<th>Opsi</th>
		</tr>
		<?php
			
			$tampil = mysqli_query($koneksi, "SELECT * FROM bukiu ORDER BY id_buku");
			while($data = mysqli_fetch_array($tampil)) :
		?>

		<tr>
			<td><?=$data['id_buku'];?></td>
			<td><?=$data['kode_buku']?></td>
			<td><?=$data['judul_buku']?></td>
			<td><?=$data['penulis_buku']?></td>
			<td><?=$data['penerbit_buku']?></td>
			<td><?=$data['tahun_penerbit']?></td>
			<td><?=$data['stok']?></td>
			<td><a href='index.php?hal=edit&id_buku=<?=$data['id_buku']?>'>Edit</a> | <a href='index.php?hal=hapus&id<?=$data['id_buku']?>' onclick="return confirm('Apakah yakin ingin menghapus data ini?')">Delete</a></td>
		</tr>

		<?php endwhile; // penutup perulangan 
		?> 

</table>
</body>
</html>
