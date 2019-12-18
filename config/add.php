<?php

	error_reporting(0);
	
	include 'koneksi.php';

	$suhu		   	= $_GET["suhu"];
    $kelembaban	   	= $_GET["kelembaban"];

    if(isset($suhu)){
        $query  = "INSERT INTO tabel SET suhu='$suhu', kelembaban ='$kelemaban' ";
        $result = mysqli_query($query);
    } 
    else {
        echo "data tidak ada";
    }
    if ($result){
        echo "data berhasil dimasukkan";
    }
    // header("location: index.php");
?>
