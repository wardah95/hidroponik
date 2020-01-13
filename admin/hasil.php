<?php
include '../config/koneksi.php';

?>
    
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