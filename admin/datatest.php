<div class="content">
    <div class="row">
        <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="text-center"> DATATES </h4>
                <button class="btn btn-primary btn-fill" data-toggle="modal" data-target="#myModal"><i class="now-ui-icons users_single-02"></i> &nbsp USER</button> 
            </div>
            <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                <thead class=" text-primary">
                    <th>No</th>
                    <th>Nama</th>
                    <th>Usernama</th>
                    <th>Level</th>
                    <th colspan="2">Action</th>
                </thead>
                <tbody>
                <?php
          //error_reporting(0);

            include '../config/koneksi.php';

            $query = mysqli_query($konek, "SELECT * FROM user")or die(mysqli_error());
                    if(mysqli_num_rows($query) == 0){ 
                      echo '<tr><td colspan="4" align="center">Tidak ada data!</td></tr>';    
                    }
                      else
                    { 
                      $no = 1;        
                      while($data = mysqli_fetch_array($query)){  
                echo '<tr>';
                echo '<td>'.$no.'</td>';
                echo '<td>'.$data['nama'].'</td>';
                echo '<td>'.$data['username'].'</td>';
                echo '<td>'.$data['level'].'</td>';
                echo '<td  width="20"><a data-toggle="tooltip"  data-placement="left" title="Edit"  href=index.php?content=edit_user&&id_user='.$data['id_user'].'><i class="now-ui-icons ui-1_settings-gear-63"></i></a></td>';
                echo '<td  width="20"><a data-toggle="tooltip" data-placement="left" title="Delete" href=../config/proses_delete_user.php?id_user='.$data['id_user'].'><i class="now-ui-icons ui-1_simple-remove"></i></a></td>';
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
    <form method="POST" action="../config/proses_tambah_user.php">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">edit User</h4>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <label>Nama Lengkap</label>
                <input type="text" class="form-control" placeholder="Nama Lengkap" name="nama" required>
            </div>
            <div class="form-group">
                <label>Username</label>
                <input type="text" class="form-control" placeholder="Username" name="username" required>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="text" class="form-control" placeholder="Password" name="password" required>
            </div>
            <div class="form-group">
                <label>Posisi</label>
                <SELECT class="form-control" name="level" placeholder="Nama Lengkap" required>
                    <option>Admin</option>
                    <option>User</option>        
                </SELECT>            
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

  