<?php
  
  include '../config/koneksi.php';
  session_start();
    $nama = $_SESSION['nama'];

  if(isset($_GET['content'])) $content = $_GET['content']; 
      else $content = "index";
      $sql = "SELECT * FROM user where nama = '$nama'";
      $query = mysqli_query($konek, $sql)or die(mysqli_error());
      $data    = mysqli_fetch_array($query);
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Now UI Dashboard by Creative Tim
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <!-- CSS Files -->
  <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="assets/css/now-ui-dashboard.css?v=1.3.0" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="assets/demo/demo.css" rel="stylesheet" />
  <style>
    @media (min-width: 991px) {
  .sidebar{
    display: block;
    box-shadow: $sidebar-box-shadow;
  }
}

.panel-header {
    height:0px;
  padding-top: 80px;
  padding-bottom: 45px;
  background: #141E30;  /* fallback for old browsers */
  background: -webkit-gradient(linear, left top, right top, from(#0c2646), color-stop(60%, #204065), to(#2a5788));
  background: linear-gradient(to right, #0c2646 0%, #204065 60%, #2a5788 100%);
  position: relative;
  overflow: hidden;}
    </style>
</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="yellow">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
    -->
      <div class="logo">
        <a href="http://www.creative-tim.com" class="simple-text logo-mini">Admin</a>
        <a href="http://www.creative-tim.com" class="simple-text logo-normal">BPTP</a>
      </div>
      <div class="sidebar-wrapper" id="sidebar-wrapper">

        <ul class="nav">
          <li>
            <a href="index.php?content=dashboard">
              <i class="now-ui-icons design_app"></i>
              <p>Dashboard admin</p>
            </a>
          </li>
          
          <li>
            <a href="index.php?content=user">
              <i class="now-ui-icons business_badge"></i>
              <p>Manajemen User</p>
            </a>
          </li>
          
           <li> 
            <a href="index.php?content=grafik">
              <i class="now-ui-icons loader_gear"></i>
              <p>grafik</p>
            </a>
          </li> 

          <li>
            <a href="index.php?content=dataset">
              <i class="now-ui-icons arrows-1_cloud-upload-94"></i>
              <p>Dataset</p>
            </a>
          </li>

          <!-- <li>
            <a href="index.php?content=datatest">
              <i class="now-ui-icons design-2_ruler-pencil"></i>
              <p>Datatest</p>
            </a>
          </li> -->

          <li>
            <a href="index.php?content=penguji">
              <i class="now-ui-icons loader_refresh"></i>
              <p>Penguji</p>
            </a>
          </li>

          <li>
            <a href="index.php?content=hasil">
              <i class="now-ui-icons files_single-copy-04"></i>
              <p>Hasil</p>
            </a>
          </li>
<!-- 
          <li>
            <a href="index.php?content=Tabel">
              <i class="now-ui-icons loader_gear"></i>
              <p>Tabel</p>
            </a>
          </li> -->

        </ul>
      </div>
    </div>

    <div class="main-panel" id="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent  bg-primary  navbar-absolute">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a>Selamat datang di Monitoring Hidroponik anda sebagai admin</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
              <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="#pablo">
                  <i class="now-ui-icons users_single-02"></i>
                  <p><?php echo $data['nama'] ?></p>
                </a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="now-ui-icons location_world"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Some Actions</span>
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="#">Edit Profile</a>
                  <a class="dropdown-item" href=../config/logout.php>Log Out</a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="panel-header ">
      
      </div>

      <div class="content">
      <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="content">
                                <?php
                                    
                                    if ($content=='dashboard')
                                        include 'dashboard.php';
                                    if ($content=='user')
                                        include 'user.php';
                                    if ($content=='setting')
                                        include 'setting.php';
                                    if ($content=='dataset')
                                        include 'dataset.php'; 
                                    if ($content=='datatest')
                                        include 'datatest.php'; 
                                    if ($content=='penguji')
                                        include 'penguji.php'; 
                                    if ($content=='hasil')
                                        include 'hasil.php'; 


                                    if ($content=='edit_user')
                                        include 'edit_user.php';
                                    if ($content=='edit_setting')
                                        include 'edit_setting.php';

                                    

                                    if ($content=='grafik')
                                        include 'grafik.php'; 
                                     
                                    // if ($content=='edit_setting')
                                    //     include 'edit_setting.php'; 
                                    // if ($content=='edit_setting')
                                    //     include 'edit_setting.php';



                                    if ($content=='Tabel')
                                        include 'tabel.php';
                                ?>
                                </div>
                            </div>
                        </div>
                    </div>
      <footer class="footer">
        <div class="container-fluid">
          <nav>
            <ul>
              <li>
                <a href="https://www.creative-tim.com">
                  Creative Tim
                </a>
              </li>
              <li>
                <a href="http://presentation.creative-tim.com">
                  About Us
                </a>
              </li>
              <li>
                <a href="http://blog.creative-tim.com">
                  Blog
                </a>
              </li>
            </ul>
          </nav>
          <div class="copyright" id="copyright">
            &copy;
            <script>
              document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))
            </script>, Designed by
            <a href="https://www.invisionapp.com" target="_blank">Invision</a>. Coded by
            <a href="https://www.creative-tim.com" target="_blank">Creative Tim</a>.
          </div>
        </div>
      </footer>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="assets/js/core/jquery.min.js"></script>
  <script src="assets/js/core/popper.min.js"></script>
  <script src="assets/js/core/bootstrap.min.js"></script>
  <script src="assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chart JS -->
  <script src="assets/js/plugins/chartjs.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="assets/js/now-ui-dashboard.min.js?v=1.3.0" type="text/javascript"></script>
  <!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->
  <script src="assets/demo/demo.js"></script>
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      demo.initDashboardPageCharts();

    });
  </script>
</body>

</html>