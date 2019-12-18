<?php
include '../config/koneksi.php';

$view    = "SELECT * FROM setting ";
$hasil   = mysqli_query($konek, $view)or die(mysql_error());
$data    = mysqli_fetch_array($hasil);
?>
    
<div class="content">
    <div class="card-header">
        <h2 class="text-center"> Kondisi Tanaman </h2>
        <a class="btn btn-primary btn-fill" href="index.php?content=edit_setting"><i class="now-ui-icons ui-1_settings-gear-63"></i></a>         
    </div>
    <div class="card-body">
        <p>Jenis Tanaman : <?php echo $data['jenis']; ?></p><br>
        <p>Waktu Penanaman : <?php echo $data['waktu']; ?> Hari</p>
        <div class="table-responsive">
        <table class="table">
            <thead class=" text-primary">
                <th></th>
                <th><b>TDS</b></th>
                <th><b>SUHU</b></th>
                <th><b>KELEMBAPAN</b></th>
            </thead>
            <tbody>
                <tr>
                <td class=" text-primary">Minggu 1</td>
                <td><?php echo $data['tds_m1']; ?> ppm</td>
                <td><?php echo $data['suhu_m1']; ?> C</td>
                <td><?php echo $data['kelembapan_m1']; ?> %</td>
                </tr>
                <tr>
                <td class=" text-primary">Minggu 2</td>
                <td><?php echo $data['tds_m2']; ?> ppm</td>
                <td><?php echo $data['suhu_m2']; ?> C</td>
                <td><?php echo $data['kelembapan_m2']; ?> %</td>
                </tr>
                <tr>
                <td class=" text-primary">Minggu 3</td>
                <td><?php echo $data['tds_m3']; ?> ppm</td>
                <td><?php echo $data['suhu_m3']; ?> C</td>
                <td><?php echo $data['kelembapan_m3']; ?> %</td>
                </tr>
            </tbody>
        </table>
        </div>
    </div>
</div>