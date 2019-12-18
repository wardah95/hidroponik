<?php
include '../config/koneksi.php';

$view    = "SELECT * FROM tabel ";
$hasil   = mysqli_query($konek, $view)or die(mysql_error());
$data    = mysqli_fetch_array($hasil);
?>
    
<div class="content">
    <div class="card-header">
        <h2 class="text-center"> tes tebel </h2>         
    </div>
    <div class="card-body">
    <div class="table-responsive">
        <table class="table">
            <thead class=" text-primary">
                <th></th>
                <th><b>ID</b></th>
                <th><b>WAKTU</b></th>
                <th><b>SUHU</b></th>
                <th><b>KELEMBAPAN</b></th>
            </thead>
            <tbody>
                <tr>
                <!-- <td class=" text-primary">Minggu 1</td> -->
                <td><?php echo $data["id"]; ?></td>
                <td><?php echo $data['waktu']; ?> </td>
                <td><?php echo $data['suhu']; ?> C</td>
                <td><?php echo $data['kelembaban']; ?> %</td>
                </tr>
            </tbody>
        </table>
        </div>
    </div>
</div>