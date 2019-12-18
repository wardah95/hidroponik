<div class="content">
    <div class="row">
        <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="text-center"> DATASET </h4>
            </div>
<!-- DATASET MINGGU KE 1 -->
            <div class="card-body">
            <div class="table-responsive">
            <h5>Form Input Minggu 1</h5>
            <form method="post" enctype="multipart/form-data" action="../config/input_dataset1.php"> 
	                <input name="dataset3" type="file" required="required"> 
	                <button class="btn btn-primary btn-fill" type ="submit"><i class="now-ui-icons files_single-copy-04"></i> &nbsp input</button> 
              </form> 
            <button class="btn btn-primary btn-fill" data-toggle="modal" data-target="#minggu1"><i class="now-ui-icons design-2_ruler-pencil"></i> &nbsp input</button> 
            <table class="table">
                <thead class=" text-primary">
                    <th>No</th>
                    <th>Suhu</th>
                    <th>Kelembaban</th>
                    <th>Nutrisi</th>
                    <th></th>
                </thead>
                <tbody>
                <?php
          //error_reporting(0);

            include '../config/koneksi.php';

            $query = mysqli_query($konek, "SELECT * FROM dataset1")or die(mysqli_error());
                    if(mysqli_num_rows($query) == 0){ 
                      echo '<tr><td colspan="4" align="center">Tidak ada data!</td></tr>';    
                    }
                      else
                    { 
                      $no = 1;        
                      while($data = mysqli_fetch_array($query)){  
                echo '<tr>';
                echo '<td>'.$no.'</td>';
                echo '<td>'.$data['suhu'].'</td>';
                echo '<td>'.$data['kelembaban'].'</td>';
                echo '<td>'.$data['tds'].'</td>';
                // echo '<td  width="20"><a data-toggle="tooltip" data-placement="left" title="Delete" href=../config/proses_delete_dataset1.php?id_user='.$data[''].'><i class="now-ui-icons ui-1_simple-remove"></i></a></td>';
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

<!-- DATASET MINGGU KE 2 -->
            <div class="card-body">
            <div class="table-responsive">
            <h5>Form Input Minggu 2</h5> 
            <form method="post" enctype="multipart/form-data" action="upload_aksi.php"> 
	                <input name="dataset2" type="file" required="required"> 
	                <button class="btn btn-primary btn-fill" type ="submit"><i class="now-ui-icons files_single-copy-04"></i> &nbsp input</button> 
              </form>
            <button class="btn btn-primary btn-fill" data-toggle="modal" data-target="#minggu2"><i class="now-ui-icons design-2_ruler-pencil"></i> &nbsp input</button> 
            <table class="table">
                <thead class=" text-primary">
                    <th>No</th>
                    <th>Suhu</th>
                    <th>Kelembaban</th>
                    <th>Nutrisi</th>
                    <th></th>
                </thead>
                <tbody>
                <?php
          //error_reporting(0);

            include '../config/koneksi.php';

            $query = mysqli_query($konek, "SELECT * FROM dataset2")or die(mysqli_error());
                    if(mysqli_num_rows($query) == 0){ 
                      echo '<tr><td colspan="4" align="center">Tidak ada data!</td></tr>';    
                    }
                      else
                    { 
                      $no = 1;        
                      while($data = mysqli_fetch_array($query)){  
                echo '<tr>';
                echo '<td>'.$no.'</td>';
                echo '<td>'.$data['suhu'].'</td>';
                echo '<td>'.$data['kelembaban'].'</td>';
                echo '<td>'.$data['tds'].'</td>';
                // echo '<td  width="20"><a data-toggle="tooltip" data-placement="left" title="Delete" href=../config/proses_delete_dataset1.php?id_user='.$data[''].'><i class="now-ui-icons ui-1_simple-remove"></i></a></td>';
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
 <!-- DATASET MINGGU KE 3 -->
            <div class="card-body">
            <div class="table-responsive">
            <h5>Form Input Minggu 3</h5> 
            <form method="post" enctype="multipart/form-data" action="upload_aksi.php"> 
	                <input name="dataset3" type="file" required="required"> 
	                <button class="btn btn-primary btn-fill" type ="submit"><i class="now-ui-icons files_single-copy-04"></i> &nbsp input</button> 
              </form> 
            <button class="btn btn-primary btn-fill" data-toggle="modal" data-target="#minggu3"><i class="now-ui-icons design-2_ruler-pencil"></i> &nbsp input</button> 
            
                <table class="table">
                <thead class=" text-primary">
                    <th>No</th>
                    <th>Suhu</th>
                    <th>Kelembaban</th>
                    <th>Nutrisi</th>
                    <th></th>
                </thead>
                <tbody>
                <?php
          //error_reporting(0);

            include '../config/koneksi.php';

            $query = mysqli_query($konek, "SELECT * FROM dataset3")or die(mysqli_error());
                    if(mysqli_num_rows($query) == 0){ 
                      echo '<tr><td colspan="4" align="center">Tidak ada data!</td></tr>';    
                    }
                      else
                    { 
                      $no = 1;        
                      while($data = mysqli_fetch_array($query)){  
                echo '<tr>';
                echo '<td>'.$no.'</td>';
                echo '<td>'.$data['suhu'].'</td>';
                echo '<td>'.$data['kelembaban'].'</td>';
                echo '<td>'.$data['tds'].'</td>';
                // echo '<td  width="20"><a data-toggle="tooltip" data-placement="left" title="Delete" href=../config/proses_delete_dataset1.php?id_user='.$data[''].'><i class="now-ui-icons ui-1_simple-remove"></i></a></td>';
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


  <!-- modal tambah dataset minggu 1 -->
  <div class="modal fade" id="minggu1" role="dialog">
    <div class="modal-dialog">
    <form method="POST" action="../config/proses_input_dataset1.php">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Input DataSet Minggu 1</h4>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <label>Suhu</label>
                <input type="text" class="form-control" placeholder="Suhu" name="suhu" required>
            </div>
            <div class="form-group">
                <label>kelembaban</label>
                <input type="text" class="form-control" placeholder="Kelembaban" name="kelembaban" required>
            </div>
            <div class="form-group">
                <label>Nutrisi (TDS)</label>
                <input type="text" class="form-control" placeholder="Nutrisi" name="tds" required>
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

  <!-- modal tambah dataset minggu 2 -->
  <div class="modal fade" id="minggu2" role="dialog">
    <div class="modal-dialog">
    <form method="POST" action="../config/proses_input_dataset2.php">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Input DataSet Minggu 2</h4>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <label>Suhu</label>
                <input type="text" class="form-control" placeholder="Suhu" name="suhu" required>
            </div>
            <div class="form-group">
                <label>kelembaban</label>
                <input type="text" class="form-control" placeholder="Kelembaban" name="kelembaban" required>
            </div>
            <div class="form-group">
                <label>Nutrisi (TDS)</label>
                <input type="text" class="form-control" placeholder="Nutrisi" name="tds" required>
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

<!-- modal tambah dataset minggu 1 -->
<div class="modal fade" id="minggu3" role="dialog">
    <div class="modal-dialog">
    <form method="POST" action="../config/proses_input_dataset3.php">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Input DataSet Minggu 3</h4>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <label>Suhu</label>
                <input type="text" class="form-control" placeholder="Suhu" name="suhu" required>
            </div>
            <div class="form-group">
                <label>kelembaban</label>
                <input type="text" class="form-control" placeholder="Kelembaban" name="kelembaban" required>
            </div>
            <div class="form-group">
                <label>Nutrisi (TDS)</label>
                <input type="text" class="form-control" placeholder="Nutrisi" name="tds" required>
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
