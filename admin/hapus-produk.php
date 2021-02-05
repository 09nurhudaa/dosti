<?php
include "../conn.php";
$kode = $_GET['kd'];

$query = mysqli_query($koneksi, "DELETE FROM produk WHERE kode='$kode'");
$query1 = mysqli_query($koneksi, "DELETE FROM harga WHERE kode='$kode'");
$query2 = mysqli_query($koneksi, "DELETE FROM stock WHERE kode='$kode'");

if ($query){
	echo "<script>alert('Data Berhasil dihapus!'); window.location = 'produk.php'</script>";	
} else {
	echo "<script>alert('Data Gagal dihapus!'); window.location = 'produk.php'</script>";	
}
?>