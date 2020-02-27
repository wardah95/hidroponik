<div class="content">
    <div class="row">
        <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="text-center"> Manajemen Tanaman </h4>
                <a class="btn btn-primary btn-fill" href="index.php?content=jenis_tanaman"><i class="now-ui-icons design-2_ruler-pencil"></i> &nbsp Jenis</a> 
                <a class="btn btn-primary btn-fill" href="index.php?content=status_tanaman"><i class="now-ui-icons ui-1_check"></i> &nbsp Status</a> 
                <a class="btn btn-primary btn-fill" data-toggle="modal" data-target="#myModal"><i class="now-ui-icons arrows-1_refresh-69"></i> &nbsp Refresh</a> 
            </div>
        </div>
        </div>
    </div>
    <!-- modal pesan Refresh -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    <form method="POST" action="../config/proses_hapus_monitoring.php">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title"><b>PERINGATAN..!!</b></h4>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <p>APAKAH ADA YAKIN MENGHAPUS SEMUA DATA MONITORING..???</p>
            </div>
          <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
          <button type="submit" class="btn btn-primary" method="POST">Iya</button>
          </div>
        </div>
      </form>
      </div>
    </div>  
  </div>
</div>

  