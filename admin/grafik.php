<!DOCTYPE html>
<html>
<head>
<title>MEMBUAT GRAFIK LINE DENGAN PLUGIN HIGHCHART</title>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
<script type="text/javascript" src="http://code.highcharts.com/highcharts.js"></script>
<script type="text/javascript" src="http://code.highcharts.com/modules/exporting.js"></script>
<style type="text/css">
.container { margin: auto; padding: 5px; width: 1800px; border: 2px solid #DBDBDB; }
</style>
</head>
<body>
<div class="container">
<div class="grafik" style="width:100%; height:500px;"></div>
</div>
<?php
 // koneksi ke database
 $host = 'localhost';
 $user = 'root';
 $pass = '';
 $db = 'hidroponik';
//  mysqli_select_db($db, mysqli_connect($host, $user, $pass));
//  $result = mysqli_query($dbConn,$sql) or die(mysqli_error());
 $conn = mysqli_connect($host, $user, $pass, $db);

 // array data
 $array_jumlah = array();
 $array_kategori = array();
 $array_series = array();
 $array_datas = array();

 // set attribute
 $array_attribute = array('suhu');

 // cari waktu
 $sql = 'SELECT * FROM tabel limit 10';
 $rs = mysqli_query($conn,$sql) or die(mysqli_error());

 while($row = mysqli_fetch_array($rs)){
  $waktu = $row['waktu'];
  
  array_push($array_jumlah, array('waktu'=>$waktu));
  $merge = array($waktu,$row['suhu']);
  array_push($array_series,intval($row['suhu']));

  array_push($array_kategori, $waktu);
 }

 foreach($array_jumlah as $key=>$val){
  // set datas
  $array_datas[$val['waktu']] = array();

  $sql = 'SELECT * FROM tabel limit 10';
  $rs =  mysqli_query($conn,$sql) or die(mysqli_error($conn));

  while($row = mysqli_fetch_array($rs)){
   $jumlah = $row['suhu'];
   
   // value datas
   $array_datas[$val['waktu']]['suhu'] = intval($jumlah);


  
   
   
   }
 }


 

 set nama series grafik
 foreach($array_attribute as $attribute){
  array_push($array_series, array('name'=>$attribute, 'data'=>array()));
 }

 
 
 // set value per series grafik
 foreach($array_kategori as $kategori){
  $i = 0;
  foreach($array_attribute as $attribute){
   array_push($array_series[$i]['data'], $array_datas[$kategori][$attribute]);

  
   $i++;
  }
 }
?>
<script type="text/javascript">
$('.grafik').highcharts({
 chart: {
  type: 'line',
  marginTop: 80
 },
 credits: {
  enabled: false
 }, 
 tooltip: {
  shared: true,
  crosshairs: true,
  headerFormat: '{point.key}'
 },
 title: {
  text: 'Data Tumbuhan'
 },
//  subtitle: {
//   text: 'TAHUN 2013 - 2015'
//  },
 xAxis: {
  categories: <?php echo json_encode($array_kategori); ?>,
  labels: {
   rotation: 0,
   align: 'right',
   style: {
    fontSize: '10px',
    fontFamily: 'Verdana, sans-serif'
   }
  }
 },
 legend: {
  enabled: true
 },
 series: [{
  name: 'Suhu',
  data: <?php echo json_encode($array_series); ?>
}]
});
</script>
</body>
</html>

