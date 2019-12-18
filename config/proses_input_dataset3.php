<?php

	error_reporting(0);
	
	include 'koneksi.php';

	$suhu		   	= $_POST["suhu"];
	$kelembaban	   	= $_POST["kelembaban"];
	$tds  		    = $_POST["tds"];

	$insert			= "INSERT INTO dataset3 VALUES ('$suhu','$kelembaban','$tds')";
	// die(var_dump($insert));
	$simpan			= mysqli_query($konek, $insert)or die(mysqli_error($konek));

	echo "<br><br><br><strong><center><i>Data berhasil ditambah!";
	echo '<META HTTP-EQUIV="REFRESH" CONTENT = "1; URL=../admin/index.php?content=dataset">';  

?>
