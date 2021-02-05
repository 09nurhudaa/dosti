<?php
session_start();
if (empty($_SESSION['username'])){
	header('location:../index.php');	
} else {
	include "../conn.php";
require('../fpdf17/fpdf.php');
require('../conn.php');


//Select the Products you want to show in your PDF file
//$result=mysql_query("SELECT * FROM daily_bbri where date like '%$periode%' ");

$result=mysqli_query($koneksi, "SELECT * FROM produk INNER JOIN harga ON harga.kode = produk.kode INNER JOIN stock ON stock.kode = produk.kode") or die(mysql_error());

//Initialize the 3 columns and the total
$column_kode = "";
$column_nama = "";
$column_jenis = "";
$column_supplier = "";
$column_stok = "";
$column_harga_jual = "";
$column_harga_beli = "";


//For each row, add the field to the corresponding column
while($row = mysqli_fetch_array($result))
{
	$kode = $row["kode"];
    $nama = $row["nama"];
    $jenis = $row["jenis"];
    $nama_supplier = $row["nama_supplier"];
    $stok = $row["stok"];
    $harga_jual = number_format($row['harga_jual'],0,",",".");
    $harga_beli = number_format($row['harga_beli'],0,",",".");
    

	$column_kode = $column_kode.$kode."\n";
    $column_nama = $column_nama.$nama."\n";
    $column_jenis= $column_jenis.$jenis."\n";
    $column_supplier = $column_supplier.$nama_supplier."\n";
    $column_stok = $column_stok.$stok."\n";
    $column_harga_jual = $column_harga_jual.$harga_jual."\n";
    $column_harga_beli = $column_harga_beli.$harga_beli."\n";

			
//mysql_close();

//Create a new PDF file
$pdf = new FPDF('P','mm',array(210,297)); //L For Landscape / P For Portrait
$pdf->AddPage();

$pdf->Image('../img/logo1.png',10,10,-1500);
//$pdf->Image('../images/BBRI.png',190,10,-200);
$pdf->SetFont('Arial','B',13);
$pdf->Cell(80);
$pdf->Cell(30,10,'DATA PRODUK',0,0,'C');
$pdf->Ln();
$pdf->Cell(80);
$pdf->Cell(30,10,'Toko Online DOSTI',0,0,'C');
$pdf->Ln();

}
//Fields Name position
$Y_Fields_Name_position = 30;

//First create each Field Name
//Gray color filling each Field Name box
$pdf->SetFillColor(110,180,230);
//Bold Font for Field Name
$pdf->SetFont('Arial','B',10);
$pdf->SetY($Y_Fields_Name_position);
$pdf->SetX(5);
$pdf->Cell(25,8,'Kode',1,0,'C',1);
$pdf->SetX(30);
$pdf->Cell(40,8,'Nama',1,0,'C',1);
$pdf->SetX(70);
$pdf->Cell(20,8,'Jenis',1,0,'C',1);
$pdf->SetX(90);
$pdf->Cell(30,8,'Supplier',1,0,'C',1);
$pdf->SetX(120);
$pdf->Cell(30,8,'Stock',1,0,'C',1);
$pdf->SetX(150);
$pdf->Cell(29,8,'Harga Beli',1,0,'C',1);
$pdf->SetX(179);
$pdf->Cell(29,8,'Harga Jual',1,0,'C',1);
$pdf->Ln();

//Table position, under Fields Name
$Y_Table_Position = 38;

//Now show the columns
$pdf->SetFont('Arial','',9);

$pdf->SetY($Y_Table_Position);
$pdf->SetX(5);
$pdf->MultiCell(25,6,$column_kode,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(30);
$pdf->MultiCell(40,6,$column_nama,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(70);
$pdf->MultiCell(20,6,$column_jenis,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(90);
$pdf->MultiCell(30,6,$column_supplier,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(120);
$pdf->MultiCell(30,6,$column_stok,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(150);
$pdf->MultiCell(29,6,$column_harga_beli,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(179);
$pdf->MultiCell(29,6,$column_harga_jual,1,'C');


$pdf->Output();
}
?>
