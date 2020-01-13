<?php
	//error_reporting(0);
	
	include 'koneksi.php';

	$id_tabel		= $_POST["id_tabel"];
	$waktu	   	    = $_POST["waktu"];
	$suhu  		    = $_POST["suhu"];
	$kelembaban	   	= $_POST["kelembaban"];
    $nutrisi    	= $_POST["nutrisi"];

    
    
	// $insert			= "INSERT INTO user VALUES ('','$nama','$username','$password','$level','$jabatan','$id_guru')";

	// $simpan			= mysqli_query($konek, $insert)or die(mysqli_error($konek));

	echo "<br><br><br><strong><center><i>Data berhasil ditambah!";
	echo '<META HTTP-EQUIV="REFRESH" CONTENT = "1; URL=../user/index.php">';  

?>