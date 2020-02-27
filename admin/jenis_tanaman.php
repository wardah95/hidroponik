<div class="content">
    <div class="row">
        <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="text-center"> Manajemen Jenis Tanaman </h4>
                <button class="btn btn-primary btn-fill" data-toggle="modal" data-target="#myModal"><i class="now-ui-icons design-2_ruler-pencil"></i> &nbsp Jenis</button> 
            </div>
            <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                <thead class="text-primary" align="center">
                <tr>
                <td rowspan="2"><b>No</b></td>
                <td rowspan="2"><b>Jenis Tanaman</b></td>
                <td colspan="2"><b>Suhu</b></td>
                <td colspan="2"><b>Kelembaban</b></td>
                <td colspan="2"><b>Nutrisi</b></td>
                </tr>
                <tr>
                <td><b>Minimal</b></td>
                <td><b>Maksimal</b></td>
                <td><b>Minimal</b></td>
                <td><b>Maksimal</b></td>
                <td><b>Minimal</b></td>
                <td><b>Maksimal</b></td>
                </tr>
            </thead>
                <tbody>
                <?php
          //error_reporting(0);

            include '../config/koneksi.php';

            $query = mysqli_query($konek, "SELECT * FROM jenis")or die(mysqli_error());
                    if(mysqli_num_rows($query) == 0){ 
                      echo '<tr><td colspan="4" align="center">Tidak ada data!</td></tr>';    
                    }
                      else
                    { 
                      $no = 1;        
                      while($data = mysqli_fetch_array($query)){  
                echo '<tr>';
                echo '<td>'.$no.'</td>';
                echo '<td>'.$data['jenis'].'</td>';
                echo '<td>'.$data['sejB'].'</td>';
                echo '<td>'.$data['sejA'].'</td>';
                echo '<td>'.$data['norB'].'</td>';
                echo '<td>'.$data['norA'].'</td>';
                echo '<td>'.$data['cupB'].'</td>';
                echo '<td>'.$data['cupA'].'</td>';
                // echo '<td  width="20"><a data-toggle="tooltip"  data-placement="left" title="Edit"  href=index.php?content=edit_user&&id_user='.$data['id_user'].'><i class="now-ui-icons ui-1_settings-gear-63"></i></a></td>';
                // echo '<td  width="20"><a data-toggle="tooltip" data-placement="left" title="Delete" href=../config/proses_delete_user.php?id_user='.$data['id_user'].'><i class="now-ui-icons ui-1_simple-remove"></i></a></td>';
                echo '</tr>';
                        $no++;  
                      }
                    }
                // die(var_dump($data));
                ?>
                    </tbody>
                  </table>
                </div>
</div>
  </div>
  <!-- modal tambah user -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    <form method="POST" action="../config/proses_jenis_tanaman.php">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Input Jenis Tanaman</h4>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <label>Jenis Tanaman</label>
                <input type="text" class="form-control" placeholder="Nama Jenis Tanaman" name="nama" required>
            </div>

            <div class="form-group">
                <label>Suhu</label>
                <input type="text" class="form-control" placeholder="Minimal" name="sumin" required>
                <label></label>
                <input type="text" class="form-control" placeholder="Maksimal" name="sumax" required>
            </div>
           
            <div class="form-group">
                <label>Kelembaban </label>
                <input type="text" class="form-control" placeholder="Minimal" name="kelmin" required>
                <label> </label>
                <input type="text" class="form-control" placeholder="Maksimal" name="kelmax" required>
            </div>
            
            <div class="form-group">
                <label>Nutrisi</label>
                <input type="text" class="form-control" placeholder="Minimal" name="nutmin" required>
                <label> </label>
                <input type="text" class="form-control" placeholder="Maksimal" name="nutmax" required>
            </div>
            
          <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" method="POST">Add</button>
          </div>
        </div>
      </form>
      </div>
    </div>  
  </div>

  