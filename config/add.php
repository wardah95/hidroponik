<?php

	error_reporting(0);
	
	include 'koneksi.php';
    $edit    = "SELECT a.*, b.id_jenis, b.status FROM jenis a, tanaman b WHERE a.id_jenis=b.id_jenis and b.status='1'";
    $hasil   = mysqli_query($konek, $edit)or die(mysql_error());
    $data    = mysqli_fetch_array($hasil);

date_default_timezone_set('Asia/Jakarta');
$waktu      = date('l, d-m-Y  H:i:s a');
$nSuhu		= $_GET["suhu"];
$nilai      = $_GET['kelembaban'];
$nNutris1   = $_GET['nutrisi'];
$tes        =(($nSuhu+$nilai)/2);
$dinginB    = $data['dingB'];
$dinginT    = $data['dingT'];
$dinginA    = $data['dingA'];
$sejukB	    = $data['sejB'];
$sejukT	    = $data['sejT'];
$sejukA	    = $data['sejA'];
$panasB	    = $data['panB'];
$panasT	    = $data['panT'];
$panasA	    = $data['panA'];

//<!-- untuk suhu -->
if($nSuhu<=$dinginT)
{
    $DAS        =1;
    $katagoriS  ="DINGIN";
    $rmsuhu     ="1; x=>a";
    $hitungs    ="$nSuhu<=$dinginT";     
}
elseif($nSuhu>$dinginT&&$nSuhu<=$dinginA)
{
    $DAS        =($dinginA-$nSuhu)/($dinginA-$dinginT);
    $katagoriS  ="DINGIN";
    $rmsuhu     ="(b-x)/(b-a); a<=x<=b";
    $hitungs    ="($dinginA-$nSuhu)/($dinginA-$dinginT)";
}
elseif($nSuhu==$sejukB)
{
    $DAS        =0;
    $katagoriS  ="SEJUK";
    $rmsuhu     ="0; x<=a atau x=>c";
    $hitungs    ="$nSuhu==$sejukB";
}
elseif($nSuhu==$sejukA)
{
    $DAS        =0;
    $katagoriS  ="SEJUK";
    $rmsuhu     ="0; x<=a atau x=>c";
    $hitungs    ="$nSuhu==$sejukA";
}
elseif($nSuhu==$sejukT)
{
    $DAS        =1;
    $katagoriS  ="SEJUK";
    $rmsuhu     ="1; x=b";
    $hitungs    ="$nSuhu==$sejukT";
}
elseif($nSuhu>$sejukB&&$nSuhu<$sejukA&&$nSuhu>$sejukT)
{
    $DAS        =($nSuhu-$sejukB)/($sejukA-$sejukB);
    $katagoriS  ="SEJUK";
    $rmsuhu     ="(x-a)/(b-a); a<=x<=b";
    $hitungs    ="($nSuhu-$sejukB)/($sejukA-$sejukB)";
}
elseif($nSuhu>$sejukB&&$nSuhu<$sejukA&&$nSuhu<$sejukT)
{
    $DAS        =($sejukA-$nSuhu)/($sejukA-$sejukB);
    $katagoriS  ="SEJUK";
    $rmsuhu     ="(c-x)/(c-b); b<=x<=c";
    $hitungs    ="($sejukA-$nSuhu)/($sejukA-$sejukB)";
}
elseif($nSuhu==$panasB)
{
    $DAS        =0;
    $katagoriS  ="PANAS";
    $rmsuhu     ="0; x=a";
    $hitungs    ="$nSuhu==$panasB";
}
elseif($nSuhu>$panasB&&$nSuhu<$panasT)
{
    $DAS        =($nSuhu-$panasB)/($panasT-$panasB);
    $katagoriS  ="PANAS";
    $rmsuhu     ="(x-a)/(b-a); a<=x<=b";
    $hitungs    ="($nSuhu-$panasB)/($panasT-$panasB)";
}
else
{
    $DAS        =1;  
    $katagoriS  ="PANAS";
    $rmsuhu     ="1; x=>b";
    $hitungs    ="$nSuhu=>$panasT";
}


$keringB    	= $data['kerB'];
$keringT    	= $data['kerT'];
$keringA    	= $data['kerA'];
$normalB    	= $data['norB'];
$normalT    	= $data['norT'];
$normalA    	= $data['norA'];
$lembabB    	= $data['lemB'];
$lembabT    	= $data['lemT'];
$lembabA    	= $data['lemA'];

// // UNTUK KELEMBABAN
if($nilai<=$keringT)
{
    $DAK        =1;
    $katagoriK  ="KERING";
    $rmslem     ="1; x=>a";
    $hitungk    ="$nilai<=$keringT";   
}
elseif($nilai>$keringT&&$nilai<=$keringA)
{
    $DAK        =($keringA-$nilai)/($keringA-$keringT);
    $katagoriK  ="KERING";
    $rmslem     ="(b-x)/(b-a); a<=x<=b";
    $hitungk    ="($keringA-$nilai)/($keringA-$keringT)";
}

elseif($nilai==$normalB)
{
    $DAK        =0;
    $katagoriK  ="NORMAL";
    $rmslem     ="0; x<=a atau x=>c";
    $hitungk    ="$nilai==$normalB";
}
elseif($nilai==$normalA)
{
    $DAK        =0;
    $katagoriK  ="NORMAL";
    $rmslem     ="0; x<=a atau x=>c";
    $hitungk    ="$nilai==$normalA";
}
elseif($nilai==$normalT)
{
    $DAK        =1;
    $katagoriK  ="NORMAL";
    $rmslem     ="1; x=b";
    $hitungk    ="$nilai==$normalT";
}
elseif($nilai>$normalB&&$nilai<$normalA&&$nilai>$normalT)
{
    $DAK        =($nilai-$normalB)/($normalA-$normalB);
    $katagoriK  ="NORMAL";
    $rmslem     ="(x-a)/(b-a); a<=x<=b";
    $hitungk    ="($nilai-$normalB)/($normalA-$normalB)";
}
elseif($nilai>$normalB&&$nilai<$normalA&&$nilai<$normalT)
{
    $DAK        =($normalA-$nilai)/($normalA-$normalB);
    $katagoriK  ="NORMAL";
    $rmslem     ="(c-x)/(c-b); b<=x<=c";
    $hitungk    ="($normalA-$nilai)/($normalA-$normalB)";
}

elseif($nilai==$lembabB)
{
    $DAK        =0;
    $katagoriK  ="LEMBAB";
    $rmslem     ="0; x=a";
    $hitungk    ="$nilai==$lembabB";
}
elseif($nilai>=$lembabB&&$nilai<=$lembabT)
{
    $DAK        =($lembabA-$nilai)/($lembabA-$lembabB);
    $katagoriK  ="LEMBAB";
    $rmslem     ="(x-a)/(b-a); a<=x<=b";
    $hitungk    ="($lembabA-$nilai)/($lembabA-$lembabB)";
}
else
{
    $DAK        =1;  
    $katagoriK  ="LEMBAB";
    $rmslem     ="1; x=>b";
    $hitungk    ="$nilai>$lembabT";
}


// $nNutris1	    = $_POST['nutrisi'];
// var_dump($nNutris1);
$kurangB1   = $data['kurB'];
$kurangT1   = $data['kurT'];
$kurangA1   = $data['kurA'];
$cukupB1    = $data['cupB'];
$cukupT1    = $data['cupT'];
$cukupA1    = $data['cupA'];
$berlebihB1 = $data['lebB'];
$berlebihT1 = $data['lebT'];
$berlebihA1 = $data['lebA'];

//Untuk nutrisi 
if($nNutris1<=$kurangT1)
{
    $DAN        =1;
    $katagoriN  ="KURANG";
    $rekomendasi="Nutrisi Perlu Ditambah";
    $rmsnut     ="1; x=>a ";
    $hitungn    ="$nNutris1<=$kurangT1";    
}
elseif($nNutris1>$kurangT1&&$nNutris1<=$kurangA1)
{
    $DAN        =($kurangA1-$nNutris1)/($kurangA1-$kurangT1);
    $katagoriN  ="KURANG";
    $rekomendasi="Nutrisi Perlu Ditambah";
    $rmsnut     ="(b-x)/(b-a); a<=x<=b";
    $hitungn    ="($kurangA1-$nNutris1)/($kurangA1-$kurangT1)";
}

elseif($nNutris1==$cukupB1)
{
    $DAN        ="0";
    $katagoriN  ="CUKUP";
    $rekomendasi="Sudah Cukup Baik";
    $rmsnut     ="0; x<=a atau x=>c ";
    $hitungn    ="$nNutris1==$cukupB1";
}
elseif($nNutris1==$cukupA1)
{
    $DAN        ="0";
    $katagoriN  ="CUKUP";
    $rekomendasi="Sudah Cukup Baik";
    $rmsnut     ="0; x<=a atau x=>c ";
    $hitungn    ="$nNutris1==$cukupA1";
}
elseif($nNutris1==$cukupT1)
{
    $DAN        ="1";
    $katagoriN  ="CUKUP";
    $rekomendasi="Sudah Cukup Baik";
    $rmsnut     ="1; x=b";
    $hitungn    ="$nNutris1==$cukupT1";
}
elseif($nNutris1>$cukupB1&&$nNutris1<$cukupA1&&$nNutris1>$cukupT1)
{
    $DAN        =($nNutris1-$cukupA1)/($cukupT1-$cukupA1);
    $katagoriN  ="CUKUP";
    $rekomendasi="Sudah Cukup Baik";
    $rmsnut     ="(x-a)/(b-a); a<=x<=b";
    $hitungn    ="($nNutris1-$cukupA1)/($cukupT1-$cukupA1)";
}
elseif($nNutris1>$cukupB1&&$nNutris1<$cukupA1&&$nNutris1<$cukupT1)
{
    $DAN        =($cukupB1-$nNutris1)/($cukupB1-$cukupT1);
    $katagoriN  ="CUKUP";
    $rekomendasi="Sudah Cukup Baik";
    $rmsnut     ="(c-x)/(c-b); b<=x<=c";
    $hitungn    ="($cukupB1-$nNutris1)/($cukupB1-$cukupT1)";
}
elseif($nNutris1==$berlebihB1)
{
    $DAN        ="0";
    $katagoriN  ="BERLEBIH";
    $rekomendasi="Nutrisi Perlu Dikurangi atau Volume air ditambah";
    $rmsnut     ="0; x=a";
    $hitungn    ="$nNutris1==$berlebihB1";
}
elseif($nNutris1>=$berlebihB1&&$nNutris1<=$berlebihT1)
{
    $DAN        =($berlebihA1-$nNutris1)/($berlebihA1-$berlebihB1);
    $katagoriN  ="BERLEBIH";
    $rekomendasi="Nutrisi Perlu Dikurangi atau Volume air ditambah";
    $rmsnut     ="(x-a)/(b-a); a<=x<=b";
    $hitungn    ="($berlebihA1-$nNutris1)/($berlebihA1-$berlebihB1)";
}
else
{
    $DAN        ="1";  
    $katagoriN  ="BERLEBIH";
    $rekomendasi="Nutrisi Perlu Dikurangi atau Volume air ditambah";
    $rmsnut     ="1; x=>b";
    $hitungn    ="$nNutris1=>$berlebihT1";
} 


// /// rekomendasi tindakan
// if ($katagoriN=="BERLEBIH")
// {
//     $rekomendasi="Nutrisi Perlu Dikurangi atau Volume air ditambah";
// }
// elseif ($katagoriN=="KURANG")
// {
//     $rekomendasi="Nutrisi Perlu Ditambah";
// }
// else
// {
//     $rekomendasi="Sudah Cukup Baik";
// }
// die(var_dump($rekomendasi));
///katagori
///1
if ($katagoriS=="DINGIN"&&$katagoriK=="KERING"&&$katagoriN=="KURANG")
{
    $kondisi="KURANG OPTIMAL";
}
///2
elseif ($katagoriS=="DINGIN"&&$katagoriK=="KERING"&&$katagoriN=="CUKUP")
{
    $kondisi="KURANG OPTIMAL";
}
// ///3
elseif ($katagoriS=="DINGIN"&&$katagoriK=="KERING"&&$katagoriN=="BERLEBIH")
{
    $kondisi="KURANG OPTIMAL";
}
//4
elseif ($katagoriS=="DINGIN"&&$katagoriK=="NORMAL"&&$katagoriN=="kURANG")
{
    $kondisi="KURANG OPTIMAL";
}
///5
elseif ($katagoriS=="DINGIN"&&$katagoriK=="NORMAL"&&$katagoriN=="CUKUP")
{
    $kondisi="OPTIMAL";
}
///6
elseif ($katagoriS=="DINGIN"&&$katagoriK=="NORMAL"&&$katagoriN=="BERLEBIH")
{
    $kondisi="KURANG OPTIMAL";
}
///7
elseif ($katagoriS=="DINGIN"&&$katagoriK=="LEMBAB"&&$katagoriN=="kURANG")
{
    $kondisi="KURANG OPTIMAL";
}
///8
elseif ($katagoriS=="DINGIN"&&$katagoriK=="LEMBAB"&&$katagoriN=="CUKUP")
{
	$kondisi="KURANG OPTIMAL";
}
///9
elseif ($katagoriS=="DINGIN"&&$katagoriK=="LEMBAB"&&$katagoriN=="BERLEBIH")
{
    $kondisi="KURANG OPTIMAL";
}
///10
elseif ($katagoriS=="SEJUK"&&$katagoriK=="KERING"&&$katagoriN=="KURANG")
{
    $kondisi="KURANG OPTIMAL";
}
///11
elseif ($katagoriS=="SEJUK"&&$katagoriK=="KERING"&&$katagoriN=="CUKUP")
{
    $kondisi="OPTIMAL";
}
///12
elseif ($katagoriS=="SEJUK"&&$katagoriK=="KERING"&&$katagoriN=="BERLEBIH")
{
    $kondisi="KURANG OPTIMAL";
}
///13
elseif ($katagoriS=="SEJUK"&&$katagoriK=="NORMAL"&&$katagoriN=="KURANG")
{
    $kondisi="OPTIMAL";
}
///14
elseif ($katagoriS=="SEJUK"&&$katagoriK=="NORMAL"&&$katagoriN=="CUKUP")
{
    $kondisi="OPTIMAL";
}
///15
elseif ($katagoriS=="SEJUK"&&$katagoriK=="NORMAL"&&$katagoriN=="BERLEBIH")
{
    $kondisi="OPTIMAL";
}
//16
elseif ($katagoriS=="SEJUK"&&$katagoriK=="LEMBAB"&&$katagoriN=="KURANG")
{
    $kondisi="KURANG OPTIMAL";
}
///17
elseif ($katagoriS=="SEJUK"&&$katagoriK=="LEMBAB"&&$katagoriN=="CUKUP")
{
    $kondisi="OPTIMAL";
}
///18
elseif ($katagoriS=="SEJUK"&&$katagoriK=="LEMBAB"&&$katagoriN=="BERLEBIH")
{
    $kondisi="KURANG OPTIMAL";
}
///19
elseif ($katagoriS=="PANAS"&&$katagoriK=="KERING"&&$katagoriN=="KURANG")
{
    $kondisi="KURANG OPTIMAL";
}
///20
elseif ($katagoriS=="PANAS"&&$katagoriK=="KERING"&&$katagoriN=="CUKUP")
{
    $kondisi="KURANG OPTIMAL";
}
///21
elseif ($katagoriS=="PANAS"&&$katagoriK=="KERING"&&$katagoriN=="BERLEBIH")
{
    $kondisi="KURANG OPTIMAL";
}
///22
elseif ($katagoriS=="PANAS"&&$katagoriK=="NORMAL"&&$katagoriN=="KURANG")
{
    $kondisi="KURANG OPTIMAL";
}
///23
elseif ($katagoriS=="PANAS"&&$katagoriK=="NORMAL"&&$katagoriN=="CUKUP")
{
    $kondisi="OPTIMAL";
}
///24
elseif ($katagoriS=="PANAS"&&$katagoriK=="NORMAL"&&$katagoriN=="BERLEBIH")
{
    $kondisi="KURANG OPTIMAL";
}
///25
elseif ($katagoriS=="PANAS"&&$katagoriK=="LEMBAB"&&$katagoriN=="KURANG")
{
    $kondisi="KURANG OPTIMAL";
}
///26
elseif ($katagoriS=="PANAS"&&$katagoriK=="LEMBAB"&&$katagoriN=="CUKUP")
{
    $kondisi="KURANG OPTIMAL";
}
///27
elseif ($katagoriS=="PANAS"&&$katagoriK=="LEMBAB"&&$katagoriN=="BERLEBIH")
{
    $kondisi="KURANG OPTIMAL";
}


    $insert			= "INSERT INTO tabel (waktu,suhu,kelembaban,nutrisi,das,ktgs,dak,ktgk,dan,ktgn,rmss,rmsk,rmsn,hitungs,hitungk,hitungn,rekomendasi,hasil,tes) VALUES ('$waktu','$nSuhu','$nilai','$nNutris1','$DAS','$katagoriS','$DAK','$katagoriK','$DAN','$katagoriN','$rmsuhu','$rmslem','$rmsnut','$hitungs','$hitungk','$hitungn','$rekomendasi','$kondisi',$tes)";
// die(var_dump($insert));
	$simpan			= mysqli_query($konek, $insert)or die(mysqli_error($konek));

	echo "<br><br><br><strong><center><i>Data berhasil ditambah!";

?>
