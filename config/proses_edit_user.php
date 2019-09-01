<?php

	error_reporting(0);
	
	include 'koneksi.php';
	$id_user 		= $_POST["id_user"];
	$nama		   	= $_POST["nama"];
	$username	   	= $_POST["username"];
	$password  		= $_POST["password"];
	$level		   	= $_POST["level"];

	$update     	= "UPDATE user SET id_user='$id_user', nama='$nama', username='$username', password='$password',  level='$level' WHERE id_user='$id_user'";

	$updateuser	    = mysqli_query($konek, $update)or die(mysqli_error());

	// die(var_dump($update));

	if ($update)
    	{
    		echo "<br><br><br><strong><center><i>Data Berhasil di Ubah";
    		echo '<META HTTP-EQUIV="REFRESH" CONTENT = "1; URL=../admin/index.php?content=user">';
    	}
	else {
    		print"
    			<script>
    				alert(\"Data Tidak Berhasil Di Ubah!\");
    				history.back(-1);
    			</script>";
    	}

?>