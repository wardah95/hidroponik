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
                            <li><a class="nav-link" href="javascript:void(0)" data-target="#tanaman">Tanaman</a></li>
                            <li><a class="nav-link" href="javascript:void(0)" data-target="#perhitungan">Perhitungan</a></li>
                            <li><a class="nav-link" href="javascript:void(0)" data-target="#Services">Monitoring</a></li>
                            <li><a class="nav-link" href="javascript:void(0)" data-target="#Portfolio">Histori</a></li>
                            <li><a class="nav-link" href=../config/logout.php>LogOut</a></li>
                        </ul>
                    </div>
                </div>
                <div class="mobile-menu hidden-lg-up">
                    <ul class="mobile-menu-list">
                        <li><a class="nav-link" href="javascript:void(0)" data-target="#HeroBanner">Home</a></li>
                        <li><a class="nav-link" href="javascript:void(0)" data-target="#tanaman">Tanaman</a></li>
                        <li><a class="nav-link" href="javascript:void(0)" data-target="#perhitungan">Perhitungan</a></li>
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
                <p>Apakah saudara <?php echo $data['nama'] ?> akan melakukan penanaman </p>
                <a class="btn btn-success btn-fill" data-toggle="modal" data-target="#tanaman">Get Started</a> 
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
                <input type="text" class="form-control" placeholder="Nama Projek Penanaman" name="nama" required>
                <label>Jenis Tanaman</label>
                <select class="form-control" name="jenis" >
                    <?php
                        $jenis = "SELECT * FROM jenis";
                        $queryjns = mysqli_query($konek,$jenis);
                        while ($datajns = mysqli_fetch_array($queryjns)) { ?>
                        <option value="<?php echo $datajns['id_jenis'] ?>"> <?php echo $datajns['jenis'] ?>
                        </option>
                        <?php
                        }
                        ?>
                                                    
                </select>
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
<?php
include '../config/koneksi.php';

$view       = "SELECT * FROM tabel order by id_tabel desc limit 1";
$hasil      = mysqli_query($konek, $view)or die(mysql_error());
$tampil     = mysqli_fetch_array($hasil);
$view1       = "SELECT a.*, b.id_jenis, b.status FROM jenis a, tanaman b WHERE a.id_jenis=b.id_jenis and b.status='1'";
$hasil1      = mysqli_query($konek, $view1)or die(mysql_error());
$tamp     = mysqli_fetch_array($hasil1);

?>
        
        <!-- tanaman section starts here -->
        <section id="tanaman">
            <div class="container">
                <div class="block-heading">
                    <h2></h2>
                    <div class="content">
    <div class="card-header">
        <h2 class="text-center"> Batasan Tanaman <?php echo $tamp['jenis'] ?> </h2>
    </div>
    <div class="card-body">
        <div class="table-responsive">
        <br>
        <h5 align="left">Tabel Variabel Suhu</h5><br>

        <table class="table">
            <thead class="text-primary" align="center">
                <tr>
                <td colspan="3"><b>Dingin</b></td>
                <td colspan="3"><b>Sejuk</b></td>
                <td colspan="3"><b>Panas</b></td>
                </tr>
                <tr>
                <td><b>Atas</b></td>
                <td><b>Tenggah</b></td>
                <td><b>Bawah</b></td>
                <td><b>Atas</b></td>
                <td><b>Tenggah</b></td>
                <td><b>Bawah</b></td>
                <td><b>Atas</b></td>
                <td><b>Tenggah</b></td>
                <td><b>Bawah</b></td>
                </tr>
            </thead>
            <tbody>
                <tr>
                <td align="center"><?php echo $tamp['dingB'] ?> °C</td>
                <td align="center"><?php echo $tamp['dingT'] ?> °C</td>
                <td align="center"><?php echo $tamp['dingA'] ?> °C</td>
                <td align="center"><?php echo $tamp['sejB'] ?> °C</td>
                <td align="center"><?php echo $tamp['sejT'] ?> °C</td>
                <td align="center"><?php echo $tamp['sejA'] ?> °C</td>
                <td align="center"><?php echo $tamp['panB'] ?> °C</td>
                <td align="center"><?php echo $tamp['panT'] ?> °C</td>
                <td align="center"><?php echo $tamp['panA'] ?> °C</td>
                </tr>
            </tbody>
        </table>
        <br><br>
        <h5 align="left">Tabel Variabel Kelembaban</h5><br>
        <table class="table">
            <thead class="text-primary" align="center">
                <tr>
                <td colspan="3"><b>Kering</b></td>
                <td colspan="3"><b>Normal</b></td>
                <td colspan="3"><b>Lembab</b></td>
                </tr>
                <tr>
                <td><b>Atas</b></td>
                <td><b>Tenggah</b></td>
                <td><b>Bawah</b></td>
                <td><b>Atas</b></td>
                <td><b>Tenggah</b></td>
                <td><b>Bawah</b></td>
                <td><b>Atas</b></td>
                <td><b>Tenggah</b></td>
                <td><b>Bawah</b></td>
                </tr>
            </thead>
            <tbody>
                <tr>
                <td align="center"><?php echo $tamp['kerB'] ?> %</td>
                <td align="center"><?php echo $tamp['kerT'] ?> %</td>
                <td align="center"><?php echo $tamp['kerA'] ?> %</td>
                <td align="center"><?php echo $tamp['norB'] ?> %</td>
                <td align="center"><?php echo $tamp['norT'] ?> %</td>
                <td align="center"><?php echo $tamp['norA'] ?> %</td>
                <td align="center"><?php echo $tamp['lemB'] ?> %</td>
                <td align="center"><?php echo $tamp['lemT'] ?> %</td>
                <td align="center"><?php echo $tamp['lemA'] ?> %</td>
                </tr>
            </tbody>
        </table>
        <br><br>
        <h5 align="left">Tabel Variabel Nutrisi</h5><br>
        <table class="table">
            <thead class="text-primary"align="center">
                <tr>
                <td colspan="3"><b>Kurang</b></td>
                <td colspan="3"><b>Cukup</b></td>
                <td colspan="3"><b>Berlebih</b></td>
                </tr>
                <tr>
                <td><b>Atas</b></td>
                <td><b>Tenggah</b></td>
                <td><b>Bawah</b></td>
                <td><b>Atas</b></td>
                <td><b>Tenggah</b></td>
                <td><b>Bawah</b></td>
                <td><b>Atas</b></td>
                <td><b>Tenggah</b></td>
                <td><b>Bawah</b></td>
                </tr>
            </thead>
            <tbody>
                <tr>
                <td align="center"><?php echo $tamp['kurB'] ?> ppm</td>
                <td align="center"><?php echo $tamp['kurT'] ?> ppm</td>
                <td align="center"><?php echo $tamp['kurA'] ?> ppm</td>
                <td align="center"><?php echo $tamp['cupB'] ?> ppm</td>
                <td align="center"><?php echo $tamp['cupT'] ?> ppm</td>
                <td align="center"><?php echo $tamp['cupA'] ?> ppm</td>
                <td align="center"><?php echo $tamp['lebB'] ?> ppm</td>
                <td align="center"><?php echo $tamp['lebT'] ?> ppm</td>
                <td align="center"><?php echo $tamp['lebA'] ?> ppm</td>
                </tr>
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
        <!-- Tanaman section ends here -->
                <!-- perhitungan section starts here -->
                <section id="perhitungan">
            <div class="container">
                <div class="block-heading">
                    <h2></h2>
                    <div class="content">
    <div class="card-header">
        <h2 class="text-center"> Perhitungan Fuzzy Logic </h2>
    </div>
    <div class="card-body">
        <div class="table-responsive">
        <table class="table">
            <thead class="text-primary" align="center">
                <tr>
                <td></td>
                <td><b>Suhu</b></td>
                <td><b>Kelembaban</b></td>
                <td><b>Nutrisi</b></td>
                </tr>
                <tr>
            </thead>
            <tbody>
                <tr>
                <td class="text-primary"><b>Kondisi</b></td>
                <td align="center"><?php echo $tampil['suhu'] ?> °C</td>
                <td align="center"><?php echo $tampil['kelembaban'] ?> %</td>
                <td align="center"><?php echo $tampil['nutrisi'] ?> ppm</td>
                </tr>
                <tr>
                <td class="text-primary"><b>Katagori</b></td>
                <td align="center"><?php echo $tampil['ktgs'] ?></td>
                <td align="center"><?php echo $tampil['ktgk'] ?></td>
                <td align="center"><?php echo $tampil['ktgn'] ?></td>
                </tr>
                <tr>
                <td class="text-primary"><b>Rumus</b></td>
                <td align="center"><?php echo $tampil['rmss'] ?></td>
                <td align="center"><?php echo $tampil['rmsk'] ?></td>
                <td align="center"><?php echo $tampil['rmsn'] ?></td>
                </tr>
                <tr>
                <td class="text-primary"><b>Perhitungan</b></td>
                <td align="center"><?php echo $tampil['hitungs'] ?></td>
                <td align="center"><?php echo $tampil['hitungk'] ?></td>
                <td align="center"><?php echo $tampil['hitungn'] ?></td>
                </tr>
                <tr>
                <td class="text-primary"><b>Derajat Keanggotaan</b></td>
                <td align="center"><?php echo $tampil['das'] ?></td>
                <td align="center"><?php echo $tampil['dak'] ?></td>
                <td align="center"><?php echo $tampil['dan'] ?></td>
                </tr>
            </tbody>
        </table>
        <h4>Kondisi Pertumbuhan : <font color="#00FF00"> <?php echo $tampil['hasil'] ?></font> </h4>
        </div>
    </div>
</div>
                </div>
                <div class="portfolio-wrapper clearfix">
                </div>
            </div>
        </section>
        <!-- perhitungan section ends here -->

        <!-- Services section starts here -->

        <section id="Services">
            <div class="container">
                <div class="block-heading">
                    <h2>Monitoring Tanaman</h2>
                    <!-- <p>munculin namanya dan minggu</p> -->
                </div>
                <div class="services-wrapper">
                    <div class="each-service">
                        <h5 class="service-title">Waktu </h5>
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
                    <div class="each-service">
                        <h5 class="service-title">Hasil</h5>
                        <p class="service-description"><?php echo $tampil['tes'] ?> </p>
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

                <div class="services-wrapper">
                    <div class="each-service">
                        <h5 class="service-title">Rekomendasi Tindakan</h5>
                        <p class="service-description"><font color="#FF0000"><?php echo $tampil['rekomendasi'] ?></font></p>
                    </div>
                </div>

                <div class="services-wrapper">
                    <div class="each-service">
                        <h5 class="service-title">Grafik Suhu</h5>
                        <!-- <p class="service-description">Grafik harian</p> -->
                        <a class="btn btn-success btn-fill" href="../admin/grafik_suhu.php.">Lihat Grafik</a> 
                    </div>
                    <div class="each-service">
                        <h5 class="service-title">Grafik Kelembaban</h5>
                        <!-- <p class="service-description">Grafik harian</p> -->
                        <a class="btn btn-success btn-fill" href="../admin/grafik_kelembaban.php.">Lihat Grafik</a> 
                    </div>
                    <div class="each-service">
                        <h5 class="service-title">Grafik Nurtrisi</h5>
                        <!-- <p class="service-description">Grafik harian</p> -->
                        <a class="btn btn-success btn-fill" href="../admin/grafik_kelembaban.php.">Lihat Grafik</a> 
                    </div>
                </div>
            </div> 
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

            $query = mysqli_query($konek, "SELECT * FROM tabel ORDER BY id_tabel DESC")or die(mysqli_error());
                    if(mysqli_num_rows($query) == 0){ 
                      echo '<tr><td colspan="4" align="center">Tidak ada data!</td></tr>';    
                    }
                      else
                    { 
                      $no = 1;        
                      while($data = mysqli_fetch_array($query)){  
                echo '<tr align="center">';
                echo '<td>'.$data['waktu'].'</td>';
                echo '<td>'.$data['suhu'].' °C</td>';
                echo '<td>'.$data['kelembaban'].' %</td>';
                echo '<td>'.$data['nutrisi'].' ppm</td>';
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