<?php

	error_reporting(0);
	
	include 'koneksi.php';

	$suhu		   	= $_POST["suhu"];
	$kelembaban	   	= $_POST["kelembaban"];
	$nutrisi  		= $_POST["nutrisi"];
    $kondisi  		= $_POST["kondisi"];
    
    
	$insert			= "INSERT INTO dataset VALUES ('$suhu','$kelembaban','$nutrisi','$kondisi')";
	// die(var_dump($insert));
	$simpan			= mysqli_query($konek, $insert)or die(mysqli_error($konek));

	echo "<br><br><br><strong><center><i>Data berhasil ditambah!";
	echo '<META HTTP-EQUIV="REFRESH" CONTENT = "1; URL=../admin/index.php?content=dataset">';  

?>
