<?php

	error_reporting(0);
	
	include 'koneksi.php';
    $id_tanaman 	= $_GET["id_tanaman"];

    $edit    = "SELECT * FROM tanaman WHERE id_tanaman = '$id_tanaman'";
    $hasil   = mysqli_query($konek, $edit)or die(mysql_error());
    $data    = mysqli_fetch_array($hasil);

    // var_dump($data['status']);
    if ($data['status']==1)
    {
        $status=0;
    }
    else {
       $status=1;
    }


	$update     	= "UPDATE tanaman SET status='$status' WHERE id_tanaman='$id_tanaman'";

	$updateuser	    = mysqli_query($konek, $update)or die(mysqli_error());

	// die(var_dump($projek));

	if ($update)
    	{
    		echo "<br><br><br><strong><center><i>Data Berhasil di Ubah";
    		echo '<META HTTP-EQUIV="REFRESH" CONTENT = "1; URL=../admin/index.php?content=status_tanaman">';
    	}
	else {
    		print"
    			<script>
    				alert(\"Data Tidak Berhasil Di Ubah!\");
    				history.back(-1);
    			</script>";
    	}

?>