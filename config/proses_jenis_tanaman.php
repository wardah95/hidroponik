<?php

	error_reporting(0);
	
	include 'koneksi.php';

    $nama		   	= $_POST["nama"];
    
///suhu    
	$sejukB	    = $_POST["sumin"];
    $sejukA  	= $_POST["sumax"];
    $sejukT     = (($sejukA-$sejukB)/2)+$sejukB;
    $dinginB    = 0;
    $dinginA    = $sejukB-1;
    $dinginT    = $dinginA-4;
    $panasB     = $sejukA+1;
    $panasT     = $panasB-4;
    $panasA     = 100;


///Kelembaban    
    $normalB	= $_POST["kelmin"];
    $normalA	= $_POST["kelmax"];
    $normalT    =(($normalA-$normalB)/2)+$normalB;
    $keringB    = 20;
    $keringA    = $normalB-1;
    $keringT    = $keringA-10;
    $lembabB    = $normalA+1;
    $lembabT    = $lembabB+10;
    $lembabA    = 100;


///nutrisi
	$cukupB  	= $_POST["nutmin"];
    $cukupA		= $_POST["nutmax"];
    $cukupT     =(($cukupA-$cukupB)/2)+$cukupB;
    $kurangB    = 0;
    $kurangA    =$cukupB-1;
    $kurangT    =$kurangA-100;
    $lebihB     =$cukupA+1;
    $lebihT     =$lebihB+100;
    $lebihA     =2000;



	$insert			= "INSERT INTO jenis VALUES ('','$nama','$dinginB','$dinginT','$dinginA','$sejukB','$sejukT','$sejukA','$panasB','$panasT','$panasA','$keringB','$keringT','$keringA','$normalB','$normalT','$normalA','$lembabB','$lembabT','$lembabA','$kurangB','$kurangT','$kurangA','$cukupB','$cukupT','$cukupA','$lebihB','$lebihT','$lebihA')";
	///die(var_dump($kurangB,$kurangT,$kurangA,$cukupB,$cukupT,$cukupA,$lebihB,$lebihT,$lebihA));
	$simpan			= mysqli_query($konek, $insert)or die(mysqli_error($konek));

	echo "<br><br><br><strong><center><i>Data berhasil ditambah!";
	echo '<META HTTP-EQUIV="REFRESH" CONTENT = "1; URL=../admin/index.php?content=tanaman">';  

?>
