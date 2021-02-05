<?php
include "../conn.php";
if(isset($_POST['update'])){
				$id_kon	        = $_POST['id_kon'];
				$nopo	        = $_POST['nopo'];
				$kd_cus	        = $_POST['kd_cus'];
				$bayar_via      = $_POST['bayar_via'];
				$tanggal        = $_POST['tanggal'];
		        $jumlah         = $_POST['jumlah'];
		        $status         = $_POST['status'];
				
				$update = mysqli_query($koneksi, "UPDATE konfirmasi SET status='$status' WHERE id_kon='$id_kon'") or die(mysqli_error());
				if($update){
				echo "<script>alert('Data Konfirmasi berhasil diupdate!'); window.location = 'konfirmasi.php'</script>";	   
				}else{
					echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data gagal disimpan, silahkan coba lagi.</div>';
				}
			}