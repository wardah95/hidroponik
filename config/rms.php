<?php
include 'koneksi.php';

$kata1  = 5+3;
$kata2  = 9-5;
$k2     = 16;
$rms    = "($kata1+$kata2)x$k2";

    $insert			= "INSERT INTO rumus VALUES ('','$rms')";
    // die(var_dump($rekomendasi));
	$simpan			= mysqli_query($konek, $insert)or die(mysqli_error($konek));

	
    echo "<br><br><br><strong><center><i>Data berhasil ditambah!";
    
?>