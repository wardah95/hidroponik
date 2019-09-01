<?php

    error_reporting(0);

    include '../config/koneksi.php';

    $id_user = $_GET['id_user'];

    $edit    = "SELECT * FROM user WHERE id_user = '$id_user'";
    $hasil   = mysqli_query($konek, $edit)or die(mysql_error());
    $data    = mysqli_fetch_array($hasil);
// die(var_dump($id_user));

?> 
<div class="content">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">EDIT USER</h4>
        </div>
        <form method="POST" action="../config/proses_edit_user.php">
        <div class="modal-body">
        <input type="hidden" name="id_user" value="<?php echo $id_user ?>">
            <div class="form-group">
                <label>Nama Lengkap</label>
                <input type="text" class="form-control" placeholder="Nama Lengkap" name="nama" value="<?php echo $data['nama']; ?>" required>
            </div>
            <div class="form-group">
                <label>Username</label>
                <input type="text" class="form-control" placeholder="Username" name="username" value="<?php echo $data['username']; ?>"required>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="text" class="form-control" placeholder="Password" name="password" value="<?php echo $data['password']; ?>" required>
            </div>
            <div class="form-group">
                <label>Posisi</label>
                <SELECT class="form-control" name="level" placeholder="Nama Lengkap"  required>
                    <option><?php echo $data['level']; ?></option>
                    <option>Admin</option>
                    <option>User</option>        
                </SELECT>            
            </div>
          <div class="modal-footer">
          <button type="submit" class="btn btn-primary" method="POST">Edit</button>
          </div>
        </div>
      </form>
      </div>
    </div>  
  </div>


</div>