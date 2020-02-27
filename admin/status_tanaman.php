<div class="content">
    <div class="row">
        <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="text-center"> Manajemen Status Tanaman </h4>
           </div>
            <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                <thead class=" text-primary">
                    <th>No</th>
                    <th>Nama Projek</th>
                    <th>Jenis Tanaman</th>
                    <th>Status</th>
                    <th>Action</th>
                </thead>
                <tbody>
                <?php
          //error_reporting(0);

            include '../config/koneksi.php';

            $query = mysqli_query($konek, "SELECT a.*, b.* FROM tanaman a, jenis b where a.id_jenis = b.id_jenis")or die(mysqli_error());
                    if(mysqli_num_rows($query) == 0){ 
                      echo '<tr><td colspan="4" align="center">Tidak ada data!</td></tr>';    
                    }
                      else
                    { 
                      $no = 1;        
                      while($data = mysqli_fetch_array($query)){  
                echo '<tr>';
                echo '<td>'.$no.'</td>';
                echo '<td>'.$data['projek'].'</td>';
                echo '<td>'.$data['jenis'].'</td>';
                echo '<td>'.$data['status'].'</td>';
                echo '<td  width="20"><a data-toggle="tooltip"  data-placement="left" title="Edit"  href=../config/edit_status.php?id_tanaman='.$data['id_tanaman'].'><i class="now-ui-icons arrows-1_refresh-69"></i></a></td>';
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

  