<?php
include '../config/koneksi.php';

$edit    = "SELECT * FROM setting WHERE id_setting = '1'";
$hasil   = mysqli_query($konek, $edit)or die(mysql_error());
$data    = mysqli_fetch_array($hasil);
?>
    
<div class="content">
    <div class="card-header">
        <h2 class="text-center"> Edit Kondisi Tanaman </h2>
        <a class="btn btn-primary btn-fill" href="index.php?content=setting"><i class="now-ui-icons arrows-1_minimal-left"></i></a>         
    </div>
    <form method="POST" action="../config/proses_edit_setting.php">
    <div class="card-body">
    <input type="hidden" name="id_setting" value="<?php echo $id_setting ?>">
        <div class="form-group">
            <label>Jenis Tanaman</label>
            <input type="text" class="form-control" placeholder="Jenis Tanaman" name="jenis" value="<?php echo $data['jenis']; ?>" required>
        </div>
        <div class="form-group">
            <label>Waktu Penanaman</label>
            <input type="text" class="form-control" placeholder="Waktu" name="waktu" value="<?php echo $data['waktu']; ?>"required>
        </div>
        <div class="table-responsive">
        <table class="table">
            <thead class=" text-primary">
                <th></th>
                <th><b>TDS</b></th>
                <th><b>SUHU</b></th>
                <th><b>KELEMBAPAN</b></th>
            </thead>
            <tbody>
                <tr>
                <td class=" text-primary">Minggu 1</td>
                <td><input type="text" class="form-control" placeholder="TDS Minggu ke 1" name="tds_m1" value="<?php echo $data['tds_m1']; ?>"required></td>
                <td><input type="text" class="form-control" placeholder="Suhu Minggu ke 1" name="suhu_m1" value="<?php echo $data['suhu_m1']; ?>"required></td>
                <td><input type="text" class="form-control" placeholder="Kelembapan Minggu ke 1" name="kelembapan_m1" value="<?php echo $data['kelembapan_m1']; ?>"required> </td>
                </tr>
                <tr>
                <td class=" text-primary">Minggu 2</td>
                <td><input type="text" class="form-control" placeholder="TDS Minggu ke 1" name="tds_m2" value="<?php echo $data['tds_m2']; ?>"required></td>
                <td><input type="text" class="form-control" placeholder="Suhu Minggu ke 2" name="suhu_m2" value="<?php echo $data['suhu_m2']; ?>"required></td>
                <td><input type="text" class="form-control" placeholder="Kelembapan Minggu ke 2" name="kelembapan_m2" value="<?php echo $data['kelembapan_m2']; ?>"required></td>
                </tr>
                <tr>
                <td class=" text-primary">Minggu 3</td>
                <td><input type="text" class="form-control" placeholder="TDS Minggu ke 1" name="tds_m3" value="<?php echo $data['tds_m3']; ?>"required></td>
                <td><input type="text" class="form-control" placeholder="Suhu Minggu ke 3" name="suhu_m3" value="<?php echo $data['suhu_m3']; ?>"required> </td>
                <td><input type="text" class="form-control" placeholder="Kelembapan Minggu ke 3" name="kelembapan_m3" value="<?php echo $data['kelembapan_m3']; ?>"required> </td>
                </tr>
            </tbody>
        </table>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary" method="POST">Edit</button>
        </div>
    </div>
    </form>
</div>