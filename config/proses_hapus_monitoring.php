<?php

	include 'koneksi.php';

	$hapus 	 = "DELETE FROM tabel";
	$query	 = mysqli_query($konek, $hapus);

	if ($query)
	    {
	    	echo "<br><br><br><strong><center><i>Data berhasil dihapus!";
	    	echo "<META HTTP-EQUIV='REFRESH' CONTENT ='1; URL=../admin/index.php?content=tanaman'>";
	    }
	else {
	    	print"
	    		<script>
	    			alert(\"Data Gagal Dihapus!\");
	    			history.back(-1);
	    		</script>";
	    }

	

?>