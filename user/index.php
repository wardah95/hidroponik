<?php
  
  include '../config/koneksi.php';
  session_start();
    $nama = $_SESSION['nama'];

  if(isset($_GET['content'])) $content = $_GET['content']; 
      else $content = "index";
      $sql      = "SELECT * FROM user where nama = '$nama'";
      $query    = mysqli_query($konek, $sql)or die(mysqli_error());
      $data     = mysqli_fetch_array($query);
    
?>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<!DOCTYPE html>
<html>
<head>
    <title>MONITORING HIDROPONIK</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- favicons -->
    <link rel="apple-touch-icon" sizes="57x57" href="images/favicons/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="images/favicons/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="images/favicons/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="images/favicons/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="images/favicons/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="images/favicons/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="images/favicons/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="images/favicons/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="images/favicons/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="images/favicons/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="images/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="images/favicons/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicons/favicon-16x16.png">
    <link rel="manifest" href="/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <!-- favicons -->
    <link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/custom-responsive-style.css">
    <link href="//fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <script type="text/javascript" src="script/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="script/all-plugins.js"></script>
    <script type="text/javascript" src="script/plugin-active.js"></script>
    <style>
    #HeroBanner {
	display: table;
	width: 100%;
	height: 100vh;
	background: url(images/green.jpg)no-repeat 0 0 / cover;
	background-attachment: fixed;
}
    </style>
</head>
<body data-spy="scroll" data-target=".main-navigation" data-offset="150">
    <section id="MainContainer">
        <!-- Header starts here -->
        <header id="Header">
            <nav class="main-navigation">
                <div class="container clearfix">
                    <div class="site-logo-wrap">
                        <a class="logo" href="http://jakarta.litbang.pertanian.go.id/ind/"><img src="images/kementrianpertanian.png" alt="LOGO"></a>
                    </div>
                    <a href="javascript:void(0)" class="menu-trigger hidden-lg-up"><span>&nbsp;</span></a>
                    <div class="main-menu hidden-md-down">
                        <ul class="menu-list">
                            <li><a class="nav-link" href="javascript:void(0)" data-target="#HeroBanner">Home</a></li>
                            <li><a class="nav-link" href="javascript:void(0)" data-target="#Services">Monitoring</a></li>
                            <li><a class="nav-link" href="javascript:void(0)" data-target="#Portfolio">Histori</a></li>
                            <li><a class="nav-link" href=../config/logout.php>LogOut</a></li>
                        </ul>
                    </div>
                </div>
                <div class="mobile-menu hidden-lg-up">
                    <ul class="mobile-menu-list">
                        <li><a class="nav-link" href="javascript:void(0)" data-target="#HeroBanner">Home</a></li>
                        <li><a class="nav-link" href="javascript:void(0)" data-target="#Services">Monitoring</a></li>
                        <li><a class="nav-link" href="javascript:void(0)" data-target="#Portfolio">Histori</a></li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- Header ends here -->
        <!-- Banner starts here -->
        <section id="HeroBanner">
            <div class="hero-content">
                <p>Selamat datang <?php echo $data['nama'] ?> di Monitoring Hidroponik</p>
                <p>Badan Penelitian dan Teknologi Pertanian</p>
                <!-- <p>Apakah saudara <?php echo $data['nama'] ?> akan melakukan penanaman </p>
                <a class="btn btn-success btn-fill" data-toggle="modal" data-target="#tanaman">Get Started</a> -->
            </div>
        </section>
        <!-- modal mulai menanam -->
  <div class="modal fade" id="tanaman" role="dialog">
    <div class="modal-dialog">
    <form method="POST" action="../config/mulai_tanam.php">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Memulai Menanam</h4>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <label>Nama Penanaman</label>
                <input type="text" class="form-control" placeholder="Nama" name="nama" required>
                <input type="hidden" value=<?php echo $data['id_user'] ?> name="user">
            </div>
          <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" method="POST">Mulai</button>
          </div>
        </div>
      </form>
      </div>
    </div>  
  </div>
        <!-- Banner ends here -->
        <!-- Services section starts here -->
<?php
include '../config/koneksi.php';

$view    = "SELECT * FROM tabel order by id_tabel desc limit 1";
$hasil   = mysqli_query($konek, $view)or die(mysql_error());
$tampil    = mysqli_fetch_array($hasil);
?>
        <section id="Services">
            <div class="container">
                <div class="block-heading">
                    <h2>Monitoring Tanaman</h2>
                    <!-- <p>munculin namanya dan minggu</p> -->
                </div>
                <div class="services-wrapper">
                    <div class="each-service">
                        <h5 class="service-title">Minggu Ke - </h5>
                        <p class="service-description"><?php echo $tampil['waktu'] ?></p>
                    </div>
                    <div class="each-service">
                        <h5 class="service-title">Suhu</h5>
                        <p class="service-description"><?php echo $tampil['suhu'] ?> °C </p>
                    </div>
                    <div class="each-service">
                        <h5 class="service-title">Kelembaban</h5>
                        <p class="service-description"><?php echo $tampil['kelembaban'] ?> %</p>
                    </div>
                    <div class="each-service">
                        <h5 class="service-title">Nurtrisi</h5>
                        <p class="service-description"><?php echo $tampil['nutrisi'] ?> PPM</p>
                    </div>
                    
                </div>

                <div class="services-wrapper">
                    <div class="each-service">
                        <h5 class="service-title">Derajat Keanggotaan</h5>
                    </div>
                    <div class="each-service">
                        <h5 class="service-title">Suhu</h5>
                        <p class="service-description"><?php echo $tampil['das'] ?></p>
                    </div>
                    <div class="each-service">
                        <h5 class="service-title">Kelembaban</h5>
                        <p class="service-description"><?php echo $tampil['dak'] ?> </p>
                    </div>
                    <div class="each-service">
                        <h5 class="service-title">Nurtrisi</h5>
                        <p class="service-description"><?php echo $tampil['dan'] ?> </p>
                    </div>
                </div>
                
                <div class="services-wrapper">
                    <div class="each-service">
                        <h5 class="service-title">Kondisi Pertumbuhan</h5>
                        <p class="service-description"><?php echo $tampil['hasil'] ?></p>
                    </div>
                    <div class="each-service">
                        <h5 class="service-title">Suhu</h5>
                        <p class="service-description"><?php echo $tampil['ktgs'] ?></p>
                    </div>
                    <div class="each-service">
                        <h5 class="service-title">Kelembaban</h5>
                        <p class="service-description"><?php echo $tampil['ktgk'] ?></p>
                    </div>
                    <div class="each-service">
                        <h5 class="service-title">Nurtrisi</h5>
                        <p class="service-description"><?php echo $tampil['ktgn'] ?></p>
                    </div>
                    
                </div>
                <!-- <!-- <div class="services-wrapper">
                    <div class="each-service">
                        <h5 class="service-title">Suhu</h5>
                        <p class="service-description">Grafik harian</p>
<!-- <script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script> -->

<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>

<!-- <script type="text/javascript">

Highcharts.chart('container', {

title: {
  text: 'Monitoring Suhu'
},

xAxis: {
  tickInterval: 1,
  type: 'logarithmic'
},

yAxis: {
  type: 'logarithmic',
  minorTickInterval: 0.1
},

tooltip: {
  headerFormat: '<b>{series.name}</b><br />',
  pointFormat: 'x = {point.x}, y = {point.y}'
},

series: [{
  data: [1, 2, 4, 8, 16, 32, 64, 128, 256, 512],
  pointStart: 1
}]
});
</script> -->

                    </div>
                </div> -->
                <!-- <div class="services-wrapper">
                    <div class="each-service">
                        <h5 class="service-title">Kelembaban</h5>
                        <p class="service-description">Grafik harian</p>
                    </div>
                </div>
                <div class="services-wrapper">
                    <div class="each-service">
                        <h5 class="service-title">Nurtrisi</h5>
                        <p class="service-description">Grafik harian</p>
                    </div>
                </div>
            </div> --> -->
        </section>
        <!-- Services section ends here -->
        <!-- Portfolio section starts here -->
        <section id="Portfolio">
            <div class="container">
                <div class="block-heading">
                    <h2>Histori</h2>
                    <div class="content">
    <div class="card-header">
        <h2 class="text-center"> Hasil Kondisi Tanaman </h2>
    </div>
    <div class="card-body">
        <div class="table-responsive">
        <table class="table">
            <thead class=" text-primary" align="center">
                <tr>
                <td rowspan="2"><b>Waktu</b></td>
                <td colspan="3"><b>Monitorinng</b></td>
                <td colspan="3"><b>Derajat Keanggotaan</b></td>
                <td colspan="3"><b>Katagori</b></td>
                <td rowspan="2"><b>Hasil</b></td>
                </tr>
                <tr>
                <td><b>Suhu</b></td>
                <td><b>Kelembaban</b></td>
                <td><b>Nutrisi</b></td>
                <td><b>Suhu</b></td>
                <td><b>Kelembaban</b></td>
                <td><b>Nutrisi</b></td>
                <td><b>Suhu</b></td>
                <td><b>Kelembaban</b></td>
                <td><b>Nutrisi</b></td>
                <td><b></b></td>
                </tr>
            </thead>
            <tbody>
            <?php
          //error_reporting(0);

            include '../config/koneksi.php';

            $query = mysqli_query($konek, "SELECT * FROM tabel")or die(mysqli_error());
                    if(mysqli_num_rows($query) == 0){ 
                      echo '<tr><td colspan="4" align="center">Tidak ada data!</td></tr>';    
                    }
                      else
                    { 
                      $no = 1;        
                      while($data = mysqli_fetch_array($query)){  
                echo '<tr align="center">';
                echo '<td>'.$data['waktu'].'</td>';
                echo '<td>'.$data['kelembaban'].'</td>';
                echo '<td>'.$data['suhu'].'</td>';
                echo '<td>'.$data['nutrisi'].'</td>';
                echo '<td>'.$data['das'].'</td>';
                echo '<td>'.$data['dan'].'</td>';
                echo '<td>'.$data['dak'].'</td>';
                echo '<td>'.$data['ktgs'].'</td>';
                echo '<td>'.$data['ktgk'].'</td>';
                echo '<td>'.$data['ktgn'].'</td>';
                echo '<td>'.$data['hasil'].'</td>';
                echo '</tr>';  
                      }
                    }
                // die(var_dump($data));
                ?>
            </tbody>
        </table>
        </div>
    </div>
</div>
                </div>
                <div class="portfolio-wrapper clearfix">
                </div>
            </div>
        </section>
        <!-- Portfolio section ends here -->
        <!-- Footer section starts here -->
        <footer id="Footer">
            <!-- <div class="container">
                <div class="social-share">
                    <ul>
                        <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                    </ul>
                </div> -->
                <div class="footer-logo-wrap">
                    Design Studio &copy; 2018. Designed by <a href="https://www.position2.com/">Position2</a>
                </div>
            </div>
        </footer>
        <!-- Footer section ends here -->
    </section>
</body>

</html>