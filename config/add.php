<?php

	error_reporting(0);
	
	include 'koneksi.php';

$nSuhu		= $_GET["suhu"];
$dinginB	= "0";
$dinginT	= "20";
$dinginA	= "24";
$sejukB		= "25";
$sejukT		= "27";
$sejukA		= "29";
$panasB		= "30";
$panasT		= "35";
$panasA		= "100";

$nKelembaban		= $_GET["kelembaban"];
$keringB	= "10";
$keringT	= "50";
$keringA	= "64";
$normalB	= "65";
$normalT	= "70";
$normalA	= "75";
$lembabB	= "76";
$lembabT	= "85";
$lembabA	= "100";

$nNutris1	= $_GET["nutrisi"];
$kurangB1	= "0";
$kurangT1	= "150";
$kurangA1	= "299";
$cukupB1    = "300";
$cukupT1	= "375";
$cukupA1	= "450";
$berlebihB1	= "451";
$berlebihT1	= "520";
$berlebihA1	= "2000";
date_default_timezone_set('Asia/Jakarta');
$waktu      = date('l, d-m-Y  H:i:s a');

if( $nSuhu <= $dinginT)
{
    $DAS = "1";
    $katagoriS = "DINGIN";    
}
elseif($nSuhu>$dinginT && $nSuhu<=$dinginA)
{
    $DAS = ($dinginA-$nSuhu)/($dinginA-$dinginT);
    $katagoriS="DINGIN";
}

elseif($nSuhu>=$sejukB && $nSuhu<=$sejukA && $nSuhu>$sejukT)
{
    $DAS=($nSuhu-$sejukB)/($sejukA-$sejukB);
    $katagoriS="SEJUK";
}
elseif($nSuhu>=$sejukB && $nSuhu<=$sejukA && $nSuhu<$sejukT)
{
    $DAS=($sejukA-$nSuhu)/($sejukA-$sejukB);
    $katagoriS="SEJUK";
}

elseif($nSuhu>=$panasB && $nSuhu<=$panasT)
{
    $DAS=($panasA-$nSuhu)/($panasA-$panasB);
    $katagoriS="PANAS";
}
else
{
    $DAS=1;  
    $katagoriS="PANAS";
}

// UNTUK KELEMBABAN

if( $nKelembaban <= $keringT)
{
    $DAK = "1";
    $katagoriK = 'KERING';    
}
elseif($nKelembaban>$keringT && $nKelembaban<=$keringA)
{
    $DAK = ($keringA-$nKelembaban)/($keringA-$keringT);
    $katagoriK="KERING";
}

elseif($nKelembaban>=$normalB && $nKelembaban<=$normalA && $nKelembaban>$normalT)
{
    $DAK=($nKelembaban-$normalB)/($normalA-$normalB);
    $katagoriK="NORMAL";
}
elseif($nKelembaban>=$normalB && $nKelembaban<=$normalA && $nKelembaban<$normalT)
{
    $DAK=($normalA-$nKelembaban)/($normalA-$normalB);
    $katagoriK="NORMAL";
}

elseif($nKelembaban>=$lembabB && $nKelembaban<=$lembabT)
{
    $DAK=($lembabA-$nKelembaban)/($lembabA-$lembabB);
    $katagoriK="LEMBAB";
}
else
{
    $DAK=1;  
    $katagoriK="LEMBAB";
}


//Untuk nutrisi minggu pertama

if( $nNutris1 <= $kurangT1)
{
    $DAN = "0";
    $katagoriN = "KURANG";    
}
elseif($nNutris1>$kurangT1 && $nNutris1<=$kurangA1)
{
    $DAN = ($kurangA1-$nNutris1)/($kurangA1-$kurangT1);
    $katagoriN="KURANG";
}

elseif($nNutris1>=$cukupB1 && $nNutris1<=$cukupA1 && $nNutris1>$cukupT1)
{
    $DAN=($nNutris1-$cukupB)/($cukupA-$cukupB);
    $katagoriN="CUKUP";
}
elseif($nNutris1>=$cukupB && $nNutris1<=$cukupA && $nNutris1<$cukupT)
{
    $DAN=($cukupA1-$nNutris1)/($cukupA1-$cukupB1);
    $katagoriN="CUKUP";
}

elseif($nNutris1>=$berlebihB1 && $nNutris1<=$berlebihT1)
{
    $DAN=($berlebihA1-$nNutris1)/($berlebihA1-$berlebihB1);
    $katagoriN="BERLEBIH";
}
else
{
    $DAN="1";  
    $katagoriN="BERLEBIH";
}

////cek hasil kondisi
//1
if ($katagoriS=="DINGIN" && $katagoriK=="KERING" && $katagoriN=="KURANG")
{
    $kondisi="TIDAK OPTIMAL";
}
///2
elseif ($katagoriS=="DINGIN" && $katagoriK=="KERING" && $katagoriN=="CUKUP")
{
    $kondisi="TIDAK OPTIMAL";
}
// ///3
elseif ($katagoriS=="DINGIN" && $katagoriK=="KERING" && $katagoriN=="BERLEBIH")
{
    $kondisi="TIDAK OPTIMAL";
}
//4
elseif ($katagoriS=="DINGIN" && $katagoriK=="NORMAL" && $katagoriN=="kURANG")
{
    $kondisi="TIDAK OPTIMAL";
}
///5
elseif ($katagoriS=="DINGIN" && $katagoriK=="NORMAL" && $katagoriN=="CUKUP")
{
    $kondisi="OPTIMAL";
}
///6
elseif ($katagoriS=="DINGIN" && $katagoriK=="NORMAL" && $katagoriN=="BERLEBIH")
{
    $kondisi="TIDAK OPTIMAL";
}
///7
elseif ($katagoriS=="DINGIN" && $katagoriK=="LEMBAB" && $katagoriN=="kURANG")
{
    $kondisi="TIDAK OPTIMAL";
}
///8
elseif ($katagoriS=="DINGIN" && $katagoriK=="LEMBAB" && $katagoriN=="CUKUP")
{
	$kondisi="TIDAK OPTIMAL";
}
///9
elseif ($katagoriS=="DINGIN" && $katagoriK=="LEMBAB" && $katagoriN=="BERLEBIH")
{
    $kondisi="TIDAK OPTIMAL";
}
///10
elseif ($katagoriS=="SEJUK" && $katagoriK=="KERING" && $katagoriN=="KURANG")
{
    $kondisi="TIDAK OPTIMAL";
}
///11
elseif ($katagoriS=="SEJUK" && $katagoriK=="KERING" && $katagoriN=="CUKUP")
{
    $kondisi="OPTIMAL";
}
///12
elseif ($katagoriS=="SEJUK" && $katagoriK=="KERING" && $katagoriN=="BERLEBIH")
{
    $kondisi="TIDAK OPTIMAL";
}
///13
elseif ($katagoriS=="SEJUK" && $katagoriK=="NORMAL" && $katagoriN=="KURANG")
{
    $kondisi="OPTIMAL";
}
///14
elseif ($katagoriS=="SEJUK" && $katagoriK=="NORMAL" && $katagoriN=="CUKUP")
{
    $kondisi="OPTIMAL";
}
///15
elseif ($katagoriS=="SEJUK" && $katagoriK=="NORMAL" && $katagoriN=="BERLEBIH")
{
    $kondisi="OPTIMAL";
}
//16
elseif ($katagoriS=="SEJUK" && $katagoriK=="LEMBAB" && $katagoriN=="KURANG")
{
    $kondisi="TIDAK OPTIMAL";
}
///17
elseif ($katagoriS=="SEJUK" && $katagoriK=="LEMBAB" && $katagoriN=="CUKUP")
{
    $kondisi="OPTIMAL";
}
///18
elseif ($katagoriS=="SEJUK" && $katagoriK=="LEMBAB" && $katagoriN=="BERLEBIH")
{
    $kondisi="TIDAK OPTIMAL";
}
///19
elseif ($katagoriS=="PANAS" && $katagoriK=="KERING" && $katagoriN=="KURANG")
{
    $kondisi="TIDAK OPTIMAL";
}
///20
elseif ($katagoriS=="PANAS" && $katagoriK=="KERING" && $katagoriN=="CUKUP")
{
    $kondisi="TIDAK OPTIMAL";
}
///21
elseif ($katagoriS=="PANAS" && $katagoriK=="KERING" && $katagoriN=="BERLEBIH")
{
    $kondisi="TIDAK OPTIMAL";
}
///22
elseif ($katagoriS=="PANAS" && $katagoriK=="NORMAL" && $katagoriN=="KURANG")
{
    $kondisi="TIDAK OPTIMAL";
}
///23
elseif ($katagoriS=="PANAS" && $katagoriK=="NORMAL" && $katagoriN=="CUKUP")
{
    $kondisi="OPTIMAL";
}
///24
elseif ($katagoriS=="PANAS" && $katagoriK=="NORMAL" && $katagoriN=="BERLEBIH")
{
    $kondisi="TIDAK OPTIMAL";
}
///25
elseif ($katagoriS=="PANAS" && $katagoriK=="LEMBAB" && $katagoriN=="KURANG")
{
    $kondisi="TIDAK OPTIMAL";
}
///26
elseif ($katagoriS=="PANAS" && $katagoriK=="LEMBAB" && $katagoriN=="CUKUP")
{
    $kondisi="TIDAK OPTIMAL";
}
///27
elseif ($katagoriS=="PANAS" && $katagoriK=="LEMBAB" && $katagoriN=="BERLEBIH")
{
    $kondisi="TIDAK OPTIMAL";
}


	$insert			= "INSERT INTO tabel VALUES ('','$waktu','$nSuhu','$nKelembaban','$nNutris1','$DAS','$DAK','$DAN','$katagoriS','$katagoriK','$katagoriN','$kondisi')";
	// die(var_dump($insert));
	$simpan			= mysqli_query($konek, $insert)or die(mysqli_error($konek));

	echo "<br><br><br><strong><center><i>Data berhasil ditambah!";

?>
