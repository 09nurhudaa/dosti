<?php
$namafolder="gambar_admin/"; //tempat menyimpan file
/*
$con=mysql_connect("localhost","root","") or die("Gagal");
mysql_select_db("ecommerce")  or die("Gagal");*/
include "../conn.php";

if (!empty($_FILES["nama_file"]["tmp_name"]))
{
	$jenis_gambar=$_FILES['nama_file']['type'];
	$kode_supplier = $_POST['kode_supplier'];
	$nama_supplier= $_POST['nama_supplier'];
	$alamat= $_POST['alamat'];
	$no_telp= $_POST['no_telp'];

	if($jenis_gambar=="image/jpeg" || $jenis_gambar=="image/jpg" || $jenis_gambar=="image/gif" || $jenis_gambar=="image/x-png")
	{			
		$gambar = $namafolder . basename($_FILES['nama_file']['name']);		
		if (move_uploaded_file($_FILES['nama_file']['tmp_name'], $gambar)) {
			$sql="INSERT INTO supplier(kode_supplier,nama_supplier,alamat,no_telp,gambar) VALUES
			('$kode_supplier','$nama_supplier','$alamat','$no_telp','$gambar')";
			$res=mysqli_query($koneksi, $sql) ;
			echo "Data berhasil di input" . $gambar;
			echo "<h3><a href='supplier.php'>Kembali ke menu supplier</a></h3>";	   
		} else {
			echo "<p>Gambar gagal dikirim</p>";
		}
	} else {
		echo "Jenis gambar yang anda kirim salah. Harus .jpg .gif .png";
	}
} else {
	echo "Anda belum memilih gambar";
}


?>