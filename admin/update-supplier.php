<?php
include "../conn.php";
$kode_supplier       = $_POST['kode_supplier'];
$nama_supplier      = $_POST['nama_supplier'];
$alamat      = $_POST['alamat'];
$no_telp      = $_POST['no_telp'];

$query = mysqli_query($koneksi, "UPDATE supplier SET nama_supplier='$nama_supplier', alamat='$alamat', no_telp='$no_telp' WHERE kode_supplier='$kode_supplier'")or die(mysql_error());
if ($query){
header('location:supplier.php');	
} else {
	echo "gagal";
    }
?>