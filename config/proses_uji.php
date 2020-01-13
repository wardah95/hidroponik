<?php

error_reporting(0);
	
include 'koneksi.php';

$minggu		= $_POST["minggu"];
$nSuhu		= $_POST["suhu"];
$dinginB	= "0";
$dinginT	= "20";
$dinginA	= "24";
$sejukB		= "25";
$sejukT		= "27";
$sejukA		= "29";
$panasB		= "30";
$panasT		= "35";
$panasA		= "100";

$nilai		= $_POST["kelembaban"];
$keringB	= "10";
$keringT	= "50";
$keringA	= "64";
$normalB	= "65";
$normalT	= "70";
$normalA	= "75";
$lembabB	= "76";
$lembabT	= "85";
$lembabA	= "100";

$nNutris1	= $_POST["nutrisi"];
$kurangB1	= "0";
$kurangT1	= "150";
$kurangA1	= "299";
$cukupB1    = "300";
$cukupT1	= "375";
$cukupA1	= "450";
$berlebihB1	= "451";
$berlebihT1	= "520";
$berlebihA1	= "2000";

// $nNutris2	= "66";
// $kurangB2	= "0";
// $kurangT2	= "650";
// $kurangA2	= "699";
// $cukupB2	= "300";
// $cukupT2	= "375";
// $cukupA2	= "450";
// $berlebihB2	= "451";
// $berlebihT2	= "520";
// $berlebihA2	= "2000";

// $nNutris3	= "1132";
// $kurangB3	= "0";
// $kurangT3	= "900";
// $kurangA3	= "999";
// $cukupB3	= "1000";
// $cukupT3	= "1100";
// $cukupA3	= "1200";
// $berlebihB3	= "1201";
// $berlebihT3	= "1300";
// $berlebihA3	= "2000";


//<!-- untuk suhu -->
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

if( $nilai <= $keringT)
{
    $DAK = "1";
    $katagoriK = 'KERING';    
}
elseif($nilai>$keringT && $nilai<=$keringA)
{
    $DAK = ($keringA-$nilai)/($keringA-$keringT);
    $katagoriK="KERING";
}

elseif($nilai>=$normalB && $nilai<=$normalA && $nilai>$normalT)
{
    $DAK=($nilai-$normalB)/($normalA-$normalB);
    $katagoriK="NORMAL";
}
elseif($nilai>=$normalB && $nilai<=$normalA && $nilai<$normalT)
{
    $DAK=($normalA-$nilai)/($normalA-$normalB);
    $katagoriK="NORMAL";
}

elseif($nilai>=$lembabB && $nilai<=$lembabT)
{
    $DAK=($lembabA-$nilai)/($lembabA-$lembabB);
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
elseif($nNutris1 >= $kurangT1 && $nNutris1 <= $kurangA1)
{
    $DAN = ($kurangA1-$nNutris1)/($kurangA1-$kurangT1);
    $katagoriN="KURANG";
}

elseif($nNutris1 >= $cukupB1 && $nNutris1 <= $cukupA1 && $nNutris1 > $cukupT1)
{
    $DAN=($nNutris1-$cukupB)/($cukupA-$cukupB);
    $katagoriN="CUKUP";
}
elseif($nNutris1 >= $cukupB && $nNutris1 <= $cukupA && $nNutris1<$cukupT)
{
    $DAN=($cukupA1-$nNutris1)/($cukupA1-$cukupB1);
    $katagoriN="CUKUP";
}

elseif($nNutris1 >= $berlebihB1 && $nNutris1 <= $berlebihT1)
{
    $DAN=($berlebihA1-$nNutris1)/($berlebihA1-$berlebihB1);
    $katagoriN="BERLEBIH";
}
else
{
    $DAN="1";  
    $katagoriN="BERLEBIH";
}

///UNTUK NUTRISI MINGGU KE 2

// if( $nNutris2 <= $kurangT2)
// {
//     $DAN2 = "1";
//     $katagoriN2 = "KURANG";    
// }
// elseif($nNutris2>$kurangT2 && $nNutris2<=$kurangA2)
// {
//     $DAN2 = ($kurangA-$nilai)/($kurangA-$kurangT);
//     $katagoriN2="KURANG";
// }

// elseif($nNutris2>=$cukupB2 && $nNutris2<=$cukupA2 && $nNutris2>$cukupT2)
// {
//     $DAN2=($nNutris2-$cukupB2)/($cukupA2-$cukupB2);
//     $katagoriN2="CUKUP";
// }
// elseif($nNutris2>=$cukupB2 && $nNutris2<=$cukupA2 && $nNutris2<$cukupT2)
// {
//     $DAN2=($cukupA2-$nNutris2)/($cukupA2-$cukupB2);
//     $katagoriN2="CUKUP";
// }

// elseif($nNutris2>=$berlebihB2 && $nNutris2<=$berlebihT2)
// {
//     $DAN2=($berlebihA-$nNutris2)/($berlebihA-$berlebihB);
//     $katagoriN2="BERLEBIH";
// }
// else
// {
//     $DAN2=1;  
//     $katagoriN2="BERLEBIH";
// }

// /// NUTRISI MINGGU KE 3
// if( $nNutris3 <= $kurangT3)
// {
//     $DAN3 = "1";
//     $katagoriN3 = "KURANG";    
// }
// elseif($nNutris3>$kurangT3 && $nNutris3<=$kurangA3)
// {
//     $DAN3 = ($kurangAN3-$nNutris3)/($kurangA3-$kurangT3);
//     $katagoriN3="KURANG";
// }

// elseif($nNutris3>=$cukupB3 && $nNutris3<=$cukupA3 && $nNutris3>$cukupT3)
// {
//     $DAN3=($nNutris3-$cukupB3)/($cukupA3-$cukupB3);
//     $katagoriN3="CUKUP";
// }
// elseif($nNutris3>=$cukupB3 && $nNutris3<=$cukupA3 && $nNutris3<$cukupT3)
// {
//     $DAN3=($cukupA3-$nNutris3)/($cukupA3-$cukupB3);
//     $katagoriN3="CUKUP";
// }

// elseif($nNutris3>=$berlebihB3 && $nNutris3<=$berlebihT3)
// {
//     $DAN3=($berlebihA3-$nNutris3)/($berlebihA3-$berlebihB3);
//     $katagoriN3="BERLEBIH";
// }
// else
// {
//     $DAN3=1;  
//     $katagoriN3="BERLEBIH";
// }

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


	$insert			= "INSERT INTO hasil_fuzzy VALUES ('','$nSuhu','$nilai','$nNutris1','$minggu','$DAS','$katagoriS','$DAK','$katagoriK','$DAN','$katagoriN','$kondisi')";
	// die(var_dump($insert));
	$simpan			= mysqli_query($konek, $insert)or die(mysqli_error($konek));

	
	echo "Derajat ke anggotaan Kelembaban adalah $DAS dan katagori $katagoriS <br>";
	echo "Derajat ke anggotaan suhu adalah $DAK dan katagori $katagoriK <br>";
	echo "Derajat ke anggotaan Nutrisi minggu 1 adalah $DAN dan katagori $katagoriN <br>";
	echo "hasil kondisi adalah $kondisi <br>";   
	echo "<br><br><br><strong><center><i>Data berhasil ditambah!";
	echo '<META HTTP-EQUIV="REFRESH" CONTENT = "1; URL=../admin/index.php?content=penguji">';  


//  echo "Derajat ke anggotaan Nutrisi minggu 2 adalah $DAN2 dan katagori $katagoriN2 <br>";

//  echo "Derajat ke anggotaan Nutrisi minggu 3 adalah $DAN3 dan katagori $katagoriN3 <br>";

?>

