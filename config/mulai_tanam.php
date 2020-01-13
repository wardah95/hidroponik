<?php

	error_reporting(0);
	
	include 'koneksi.php';

	$user			= $_POST["user"];
	$nama		   	= $_POST["nama"];
	$mulai	   		= date("Y-m-d");
	$selesai  		= date('Y-m-d', strtotime('+21 days', strtotime($mulai)));
	$status			= 1;
	
	$insert			= "INSERT INTO tanaman VALUES ('','$user','$nama','$mulai','$selesai', '$status')";
	//die(var_dump($insert));
	$simpan			= mysqli_query($konek, $insert)or die(mysqli_error($konek));

	echo "<br><br><br><strong><center><i>Data berhasil ditambah!";
	echo '<META HTTP-EQUIV="REFRESH" CONTENT = "1; URL=../user/index.php">';  

?>
