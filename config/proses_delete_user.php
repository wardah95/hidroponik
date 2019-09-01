<?php

	include 'koneksi.php';

	$id_user = $_GET ['id_user'];

	$hapus 	 = "DELETE FROM user WHERE id_user='$id_user'";
	$query	 = mysqli_query($konek, $hapus);

	if ($query)
	    {
	    	echo "<br><br><br><strong><center><i>Data berhasil dihapus!";
	    	echo "<META HTTP-EQUIV='REFRESH' CONTENT ='1; URL=../admin/index.php?content=user'>";
	    }
	else {
	    	print"
	    		<script>
	    			alert(\"Data Gagal Dihapus!\");
	    			history.back(-1);
	    		</script>";
	    }

	

?>