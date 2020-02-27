<?php
include '../config/koneksi.php';

?>
    
<div class="content">
    <div class="card-header">
        <h2 class="text-center"><b>Pengujian Kondisi Tanaman</b>  </h2>
        <div class="card-body">
                <form method="POST" action="../config/proses_uji.php">
                <div class="row">
                    <div class="col-md-3 pr-1">
                      <div class="form-group">
                        <label><b>Suhu</b></label>
                        <input type="text" class="form-control" placeholder="Suhu" name="suhu" required>
                      </div>
                    </div>
                    <div class="col-md-3 px-1">
                      <div class="form-group">
                        <label><b>Kelembaban</b></label>
                        <input type="text" class="form-control" placeholder="Kelembaban" name="kelembaban" required>
                      </div>
                    </div>
                    <div class="col-md-3 pl-1">
                      <div class="form-group">
                        <label><b>Nutrisi</b></label>
                        <input type="text" class="form-control" placeholder="Nutrisi" name="nutrisi" required></div>
                    </div>
                    <!-- <div class="col-md-3 pl-1">
                      <div class="form-group">
                        <label><b>Minggu</b></label>
                        <SELECT class="form-control" name="minggu">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                        </SELECT>
                      </div>
                    </div> -->
                </div>
                <div class="row">
                    <button type="submit" class="btn btn-primary" method="POST">Cek</button>
                </div>
                </form>
              </div>

      <div class="card-body">
      <h3>hasil data uji</h3>
        <div class="table-responsive">
        <table class="table">
            <thead class=" text-primary" align="center">
                <tr>
                <td colspan="3"><b>Monitorinng</b></td>
                <td colspan="3"><b>Derajat Keanggotaan</b></td>
                <td colspan="3"><b>Katagori</b></td>
                <td colspan="3"><b>Rumus</b></td>
                <td colspan="3"><b>Perhitungan</b></td>
                <td rowspan="2"><b>Rekomendasi</b></td>
                <td rowspan="2"><b>Kondisi</b></td>
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
                <td><b>Suhu</b></td>
                <td><b>Kelembaban</b></td>
                <td><b>Nutrisi</b></td>
                <td><b>Suhu</b></td>
                <td><b>Kelembaban</b></td>
                <td><b>Nutrisi</b></td>
                </tr>
            </thead>
            <tbody>
            <?php
          //error_reporting(0);

            include '../config/koneksi.php';

            $query = mysqli_query($konek, "SELECT * FROM hasil_fuzzy ORDER BY id_hasil DESC")or die(mysqli_error());
                    if(mysqli_num_rows($query) == 0){ 
                      echo '<tr><td colspan="4" align="center">Tidak ada data!</td></tr>';    
                    }
                      else
                    { 
                      $no = 1;        
                      while($data = mysqli_fetch_array($query)){  
                echo '<tr align="center">';
                echo '<td>'.$data['suhu'].'</td>';
                echo '<td>'.$data['kelembaban'].'</td>';
                echo '<td>'.$data['nutrisi'].'</td>';
                echo '<td>'.$data['das'].'</td>';
                echo '<td>'.$data['dak'].'</td>';
                echo '<td>'.$data['dan'].'</td>';
                echo '<td>'.$data['ktgs'].'</td>';
                echo '<td>'.$data['ktgk'].'</td>';
                echo '<td>'.$data['ktgn'].'</td>';
                echo '<td>'.$data['rmss'].'</td>';
                echo '<td>'.$data['rmsk'].'</td>';
                echo '<td>'.$data['rmsn'].'</td>';
                echo '<td>'.$data['hitungs'].'</td>';
                echo '<td>'.$data['hitungk'].'</td>';
                echo '<td>'.$data['hitungn'].'</td>';
                echo '<td>'.$data['rekomendasi'].'</td>';
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