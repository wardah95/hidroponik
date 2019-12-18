<?php

	// error_reporting(0);
    include 'koneksi.php';
    
	$id_setting 	= $_POST["id_setting"];
	$jenis		   	= $_POST["jenis"];
	$waktu  	   	= $_POST["waktu"];
	$tds_m1  		= $_POST["tds_m1"];
    $suhu_m1	   	= $_POST["suhu_m1"];
    $kelembapan_m1  = $_POST["kelembapan_m1"];
    $tds_m2  		= $_POST["tds_m2"];
    $suhu_m2	   	= $_POST["suhu_m2"];
    $kelembapan_m2  = $_POST["kelembapan_m2"];
    $tds_m3  		= $_POST["tds_m3"];
    $suhu_m3	   	= $_POST["suhu_m3"];
    $kelembapan_m3  = $_POST["kelembapan_m3"];

	$update     	= "UPDATE setting SET id_setting='$id_setting', jenis='$jenis', waktu='$waktu', tds_m1='$tds_m1',  suhu_m1='$suhu_m1', kelembapan_m1='$kelembapan_m1',  tds_m2='$tds_m2',  suhu_m2='$suhu_m2', kelembapan_m2='$kelembapan_m2', tds_m3='$tds_m3',  suhu_m3='$suhu_m3', kelembapan_m3='$kelembapan_m3' WHERE id_setting='1'";

	$updateuser	    = mysqli_query($konek, $update)or die(mysqli_error());

	die(var_dump($update));

	if ($update)
    	{
    		echo "<br><br><br><strong><center><i>Data Berhasil di Ubah";
    		echo '<META HTTP-EQUIV="REFRESH" CONTENT = "1; URL=../admin/index.php?content=setting">';
    	}
	else {
    		print"
    			<script>
    				alert(\"Data Tidak Berhasil Di Ubah!\");
    				history.back(-1);
    			</script>";
    	}

?>