<?php 
include "../conn.php";
if(isset($_POST['update']))
$namafolder="../admin/bukti_kirim/"; 


if (!empty($_FILES["nama_file"]["tmp_name"]))
{
				$jenis_gambar	 =$_FILES['nama_file']['type'];
				$nopo	         = $_POST['nopo'];
				$no_resi         = $_POST['no_resi'];
                $tanggalkirim    = $_POST['tanggalkirim'];
                $tanggal_sampai  = $_POST['tanggal_sampai'];
                $status          = $_POST['status'];
			
				if($jenis_gambar=="image/jpeg" || $jenis_gambar=="image/jpg" || $jenis_gambar=="image/gif" || $jenis_gambar=="image/x-png")
				{			
					$gambar = $namafolder . basename($_FILES['nama_file']['name']);		
					if (move_uploaded_file($_FILES['nama_file']['tmp_name'], $gambar)) {
						$sql="UPDATE po SET no_resi='$no_resi', tanggalkirim='$tanggalkirim', tanggal_sampai='$tanggal_sampai', bukti_kirim='$gambar', status='$status' WHERE nopo='$nopo'" or die(mysqli_error());
						$res=mysqli_query($koneksi, $sql) or die (mysqli_error());
						//echo "Gambar berhasil dikirim ke direktori".$gambar;
			            echo "<script>alert('Data Sales berhasil diupdate!'); window.location = 'po.php'</script>";	   
					} else {
					   echo "<p>Gambar gagal dikirim</p>";
					}
			   } else {
					echo "Jenis gambar yang anda kirim salah. Harus .jpg .gif .png";
			   }
			} else {
				echo "Anda belum memilih gambar";
			}
			// 	$update = mysqli_query($koneksi, "UPDATE po SET no_resi='$no_resi', tanggalkirim='$tanggalkirim', tanggal_sampai='$tanggal_sampai', bukti_kirim='$bukti_kirim', status='$status' WHERE nopo='$nopo'") or die(mysqli_error());
			// 	if($update){
			// 		echo "<script>alert('Data PO Berhasil diupdate!'); window.location = 'po.php'</script>";
			// 	}else{
			// 		echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data gagal disimpan, silahkan coba lagi.</div>';
			// 	}
			// }
            ?>