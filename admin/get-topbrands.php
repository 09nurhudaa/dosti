<?php
include('../conn.php');

$sql = "SELECT SUM(po_terima.qty) as 'total', produk.jenis FROM `po_terima` LEFT JOIN produk ON po_terima.kode = produk.kode GROUP BY po_terima.kode";
$exec = mysqli_query($koneksi, $sql);

$output = array();
while($row = mysqli_fetch_assoc($exec)) {
	$output[] = $row;
}

echo json_encode($output);

?>