<?php
include "../conn.php";
$kode_supplier = $_GET['kd'];

$query = mysqli_query($koneksi, "DELETE FROM supplier WHERE kode_supplier='$kode_supplier'");
if ($query){
	echo "<script>alert('Data Berhasil dihapus!'); window.location = 'supplier.php'</script>";	
} else {
	echo "<script>alert('Data Gagal dihapus!'); window.location = 'supplier.php'</script>";	
}
?>