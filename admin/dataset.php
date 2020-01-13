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
            <h5>Form Input </h5>
            <!-- <form method="post" enctype="multipart/form-data" action="../config/input_dataset1.php"> 
	                <input name="dataset3" type="file" required="required"> 
	                <button class="btn btn-primary btn-fill" type ="submit"><i class="now-ui-icons files_single-copy-04"></i> &nbsp input</button> 
              </form>  -->
            <button class="btn btn-primary btn-fill" data-toggle="modal" data-target="#minggu"><i class="now-ui-icons design-2_ruler-pencil"></i> &nbsp input</button> 
            <table class="table">
                <thead class=" text-primary">
                    <th>No</th>
                    <th>Suhu</th>
                    <th>Kelembaban</th>
                    <th>Nutrisi</th>
                    <th>Minggu</th>
                    <th>Kondisi</th>
                    <th></th>
                </thead>
                <tbody>
                <?php
          //error_reporting(0);

            include '../config/koneksi.php';

            $query = mysqli_query($konek, "SELECT * FROM dataset")or die(mysqli_error());
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
                echo '<td>'.$data['nutrisi'].'</td>';
                echo '<td>'.$data['minggu'].'</td>';
                echo '<td>'.$data['kondisi'].'</td>';
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
  </div>


  <!-- modal tambah dataset minggu 1 -->
  <div class="modal fade" id="minggu" role="dialog">
    <div class="modal-dialog">
    <form method="POST" action="../config/input_dataset.php">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Input DataSet</h4>
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
                <label>Nutrisi</label>
                <input type="text" class="form-control" placeholder="Nutrisi" name="nutrisi" required>
            </div>
            <div class="form-group">
                <label>Minggu</label>
                <SELECT class="form-control" name="minggu">
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                </SELECT>
            </div>
            <div class="form-group">
                <label>Kondisi</label>
                <input type="text" class="form-control" placeholder="Kondisi" name="kondisi" required>
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