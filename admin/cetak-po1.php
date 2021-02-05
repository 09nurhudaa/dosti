<?php
session_start();
if (empty($_SESSION['username'])){
	header('location:../index.php');	
} else {
	include "../conn.php";
require('../fpdf17/fpdf.php');
require('../conn.php');

if(isset($_GET['kd'])) {
    $kodesaya = $_GET['kd'];
}
//Select the Products you want to show in your PDF file
//$result=mysqli_query($koneksi, "SELECT * FROM po_terima where id like '%$kodesaya%' ");
if(isset($_GET['kd'])) {
$result=mysqli_query($koneksi, "SELECT po_terima.*, produk.nama, produk.harga, customer.no_telp, 
    po.status FROM po_terima
                LEFT JOIN produk ON po_terima.kode = produk.kode
                LEFT JOIN customer ON po_terima.kd_cus = customer.kd_cus
                LEFT JOIN po ON po_terima.nopo = po.nopo
                WHERE po_terima.id='$_GET[kd]'") or die(mysqli_error());
} else{
    if($_GET['awal'] == null && $_GET['akhir'] == null) {
        $result=mysqli_query($koneksi, "SELECT po_terima.*, produk.nama, produk.harga, customer.no_telp, 
            po.status FROM po_terima
                        LEFT JOIN produk ON po_terima.kode = produk.kode
                        LEFT JOIN customer ON po_terima.kd_cus = customer.kd_cus
                        LEFT JOIN po ON po_terima.nopo = po.nopo") or die(mysqli_error());
    } else {
        $awal = $_GET['awal'];
        $akhir = $_GET['akhir'];
        $result=mysqli_query($koneksi, "SELECT po_terima.*, produk.nama, produk.harga, customer.no_telp, 
            po.status FROM po_terima
        				LEFT JOIN produk ON po_terima.kode = produk.kode
        				LEFT JOIN customer ON po_terima.kd_cus = customer.kd_cus
                        LEFT JOIN po ON po_terima.nopo = po.nopo
        				WHERE DATE(tanggal) BETWEEN DATE('$awal') AND DATE('$akhir')") or die(mysqli_error());
    }
}

//Initialize the 3 columns and the total
$column_date = "";
$column_time = "";
$column_standmeter = "";
$column_factor = "";
$column_total = "";
$column_nilai = "";
$column_rata = "";

//For each row, add the field to the corresponding column
while($row = mysqli_fetch_array($result)) 
{
    $nopo    = $row["nopo"];
    $kd_cus  = $row["kd_cus"];
    $kode    = $row["kode"];
    $tanggal = $row["tanggal"];
    $qty     = $row["qty"];
    // $total   = "Rp." . number_format($row['harga'],2,",",".");
    $nama    = $row["nama"];
    $harga   = "Rp." .number_format($row['harga'],2,",",".");
    $no_telp = $row["no_telp"];
    $status  = $row["status"];
   
    
    $column_date = $column_date.$nama."\n";
    $column_total = $column_total.$qty."\n";
    $column_nilai = $column_nilai.$harga."\n";
    $column_rata = $column_rata.$status."\n";       


//mysql_close();

//Create a new PDF file
$pdf = new FPDF('L','mm',array(210,297)); //L For Landscape / P For Portrait
$pdf->AddPage();

$pdf->Image('../img/logo1.png',10,10, -1500);
$pdf->SetFont('Arial','B',13);
$pdf->Cell(120);
$pdf->Cell(30,10,'INVOICE PURCHASE ORDER',0,0,'C');
$pdf->Ln();
$pdf->Cell(120);
$pdf->Cell(30,10,'Toko Online DOSTI',0,0,'C');
$pdf->Ln();

//Fields Name position
$Y_Fields_Name_position = 60;
$pdf->SetFillColor(255,255,255);
//First create each Field Name
//Bold Font for Field Name
$pdf->SetFont('Arial','B',10);
$pdf->SetY($Y_Fields_Name_position);
$pdf->SetX(5);
$pdf->Cell(40,8,'No PO: '.$nopo,0,0,'L',1);
$pdf->SetX(45);
$pdf->Cell(40,8,'',0,0,'L',1);
$pdf->SetX(85);
$pdf->Cell(50,8,'',0,0,'C',1);
$pdf->SetX(135);
$pdf->Cell(25,8,'',0,0,'C',1);
$pdf->SetX(160);
//$pdf->Cell(45,8,'Periode : '.$periode,0,0,'R',1);
$pdf->Ln();

//Field Name Position
$Y_Fields_Name_position = 48;
$pdf->SetFillColor(255,255,255);
//First create each Field Name
//Bold Font for Field Name
$pdf->SetFont('Arial','B',10);
$pdf->SetY($Y_Fields_Name_position);
$pdf->SetX(5);
$pdf->Cell(40,8,'Customer : '.$kd_cus,0,0,'L',1);
$pdf->SetX(45);
$pdf->Cell(40,8,'',0,0,'L',1);
$pdf->SetX(85);
$pdf->Cell(50,8,'',0,0,'C',1);
$pdf->SetX(135);
$pdf->Cell(25,8,'',0,0,'C',1);
$pdf->SetX(160);
//$pdf->Cell(45,8,'Periode : '.$periode,0,0,'R',1);
$pdf->Ln();

//Field Name Position
$Y_Fields_Name_position = 56;
$pdf->SetFillColor(255,255,255);
//Bold Font for Field Name
$pdf->SetFont('Arial','B',10);
$pdf->SetY($Y_Fields_Name_position);
$pdf->SetX(5);
$pdf->Cell(40,8,'No Telepon : '.$no_telp,0,0,'L',1);
$pdf->SetX(100);
$pdf->Cell(40,8,'',0,0,'L',1);
$pdf->SetX(85);
$pdf->Cell(50,8,'',0,0,'C',1);
$pdf->SetX(135);
$pdf->Cell(25,8,'',0,0,'C',1);
$pdf->SetX(160);
//$pdf->Cell(45,8,'Periode : '.$periode,0,0,'R',1);
$pdf->Ln();

$Y_Fields_Name_position = 64;
$pdf->SetFillColor(255,255,255);
//First create each Field Name
//Bold Font for Field Name
$pdf->SetFont('Arial','B',10);
$pdf->SetY($Y_Fields_Name_position);
$pdf->SetX(5);
$pdf->Cell(40,8,'Kode Produk : '.$kode,0,0,'L',1);
$pdf->SetX(160);
$pdf->Cell(40,8,'',0,0,'L',1);
$pdf->SetX(85);
$pdf->Cell(50,8,'',0,0,'C',1);
$pdf->SetX(135);
$pdf->Cell(25,8,'',0,0,'C',1);
$pdf->SetX(245);
$pdf->Cell(45,8,'Tanggal Beli : '.$tanggal,0,0,'R',1);
$pdf->Ln();
}
//Fields Name position
$Y_Fields_Name_position = 80;

//First create each Field Name
//Gray color filling each Field Name box
$pdf->SetFillColor(110,180,230);
//Bold Font for Field Name
$pdf->SetFont('Arial','B',10);
$pdf->SetY($Y_Fields_Name_position);
$pdf->SetX(70);
$pdf->Cell(40,8,'Produk',1,0,'C',1);
$pdf->SetX(110);
$pdf->Cell(20,8,'Qty',1,0,'C',1);
$pdf->SetX(130);
$pdf->Cell(40,8,'Price',1,0,'C',1);
$pdf->SetX(170);
$pdf->Cell(40,8,'Status',1,0,'C',1);
$pdf->Ln();

//Table position, under Fields Name
$Y_Table_Position = 88;

//Now show the columns
$pdf->SetFont('Arial','',10);

$pdf->SetY($Y_Table_Position);
$pdf->SetX(70);
$pdf->MultiCell(40,6,$column_date,1,'C');


$pdf->SetY($Y_Table_Position);
$pdf->SetX(110);
$pdf->MultiCell(20,6,$column_total,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(130);
$pdf->MultiCell(40,6,$column_nilai,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(170);
$pdf->MultiCell(40,6,$column_rata,1,'C');


//Footer Table
// $pdf->SetFillColor(110,180,230);
// $pdf->SetFont('Arial','B',12);
// $pdf->SetX(70);
// $pdf->Cell(40,8,'Total Tagihan',1,0,'C',1);
// $pdf->SetX(110);
// $pdf->Cell(100,8,$total.'',1,0,'R',1);
// $pdf->Ln();
// $pdf->SetFillColor(110,180,230);
// $pdf->Ln(10);

//After Footer

//$Y_Fields_Name_position = 150;
//$pdf->SetFillColor(255,255,255);
//First create each Field Name
//Bold Font for Field Name
/**$pdf->SetFont('Arial','B',10);
$pdf->SetY($Y_Fields_Name_position);
$pdf->SetX(5);
$pdf->Cell(40,8,'Kepala Sekolah,',0,0,'L',1);
$pdf->SetX(160);
$pdf->Cell(40,8,'',0,0,'L',1);
$pdf->SetX(85);
$pdf->Cell(50,8,'',0,0,'C',1);
$pdf->SetX(135);
$pdf->Cell(25,8,'',0,0,'C',1);
$pdf->SetX(160);
//$pdf->Cell(45,8,'Order : '.$tgl,0,0,'R',1);
$pdf->Ln();

$Y_Fields_Name_position = 170;
$pdf->SetFillColor(255,255,255);
//First create each Field Name
//Bold Font for Field Name
$pdf->SetFont('Arial','B',10);
$pdf->SetY($Y_Fields_Name_position);
$pdf->SetX(5);
$pdf->Cell(40,8,'Hakko Bio Richard, A.Md Kom',0,0,'L',1);
$pdf->SetX(160);
$pdf->Cell(40,8,'',0,0,'L',1);
$pdf->SetX(85);
$pdf->Cell(50,8,'',0,0,'C',1);
$pdf->SetX(135);
$pdf->Cell(25,8,'',0,0,'C',1);
$pdf->SetX(160);
//$pdf->Cell(45,8,'Order : '.$tgl,0,0,'R',1);
$pdf->Ln();

/**$pdf->SetY(-55);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(10);
$pdf->Cell(30,10,'PT. BBG',0,0,'C');
$pdf->Cell(105);
$pdf->Cell(30,10,'PT. BBRI',0,0,'C');
$pdf->Ln(20);
$pdf->Cell(10);
$pdf->Cell(30,10,'( ............................................................)',0,0,'C');
$pdf->Cell(107);
$pdf->Cell(30,10,'( ............................................................)',0,0,'C');
**/
$pdf->Output();
}
?>
