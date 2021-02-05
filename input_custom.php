<?php require_once("conn.php");
    if (!isset($_SESSION)) {
        session_start();
    } 
  $cekno= mysqli_query($koneksi, "SELECT * FROM customer ORDER BY kd_cus DESC");
        
        
        $data1=mysqli_num_rows($cekno);
        $cekQ1=$data1;
        //$data=mysqli_fetch_array($ceknomor);
        //$cekQ=$data['f_kodepart'];
        #menghilangkan huruf
        //$awalQ=substr($cekQ,0-6);
        #ketemu angka awal(angka sebelumnya) + dengan 1
        $next1=$cekQ1+1;

        #menhitung jumlah karakter
        $kode1=strlen($next1);
        
        if(!$cekQ1)
        { $no1='00000'; }
        elseif($kode1==1)
        { $no1='00000'; }
        elseif($kode1==2)
        { $n1o='0000'; }
        elseif($kode1==3)
        { $no1='000'; }
        elseif($kode1==4)
        { $no1='00'; }
        elseif($kode1==5)
        { $no1='0'; }
        elseif($kode1=6)
        { $no1=''; }

        // masukkan dalam tabel penjualan
        $kodeku=$no1.$next1;
		
		$tmp_file = $_FILES["myFile"]["tmp_name"];
        $filename = $_FILES["myFile"]["name"];
		$success= move_uploaded_file($tmp_file , "custom/". $filename);
		
		 $nama       = $_POST['nama'];
		$alamat      = $_POST['alamat'];
        $nohp      = $_POST['nohp'];
        $username = $_POST['username'];
        $pass       = $_POST['pass'];
		  $size = $_POST['size'];
		    $color = $_POST['color'];
			  $model = $_POST['model'];
		if (!$success ) { 
            echo '<div class="alert alert-warning">Gagal upload file.</div>';
            exit;
          }else{

        
          }
	
	$query = mysqli_query ($koneksi, "insert into custom (  kd_cus,nama, size, color, model, gambar) VALUES ('$kodeku','$nama','$size','$color', '$model',  '$filename')")
			or die (mysql_error());
	 $query2 = mysqli_query($koneksi, "INSERT INTO customer (kd_cus, nama, alamat, no_telp, username, password) VALUES ('$kodeku', '$nama', '$alamat', '$nohp', '$username', '$pass')") or die(mysql_error());
   
	if ($query and $query2 ) {
	header('location:index.php');
}



?>