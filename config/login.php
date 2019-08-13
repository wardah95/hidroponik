<?php
error_reporting();
	include 'koneksi.php';

	$username  = $_POST['username'];
	$password  = $_POST['password'];

	$query     ="SELECT * FROM user WHERE username='$username' AND password='$password'";
	// die(var_dump($query));

	$login     = mysqli_query($konek,$query)or die(mysqli_error($konek));
	$jlhrecord = mysqli_num_rows($login);

	$data      	= mysqli_fetch_array($login,MYSQLI_BOTH);

	$nama	   	= $data['nama'];
	$username  	= $data['username'];
	$password  	= $data['password'];
	$level   	= $data['level'];


if($jlhrecord > 0){

	session_start();
	
	$_SESSION['nama']		=$nama;
	$_SESSION['username']   =$username;
	$_SESSION['password']	=$password;
	$_SESSION['level']		=$level;
	// die(var_dump($level));
	//redirect level
		if($level=='admin'){
			echo 'Anda berhasil login sebagai admin';
			header('Location:../admin/dashboard.php');
		}
			elseif($level=='user'){
            echo 'Anda berhasil Login sebagai user';
			header('Location:../user/index.php?content=dashboard');
		}
}

else{

	echo "<br><br><br><strong><center><i>Maaf anda gagal login. Mungkin Username atau Password yang anda masukkan salah.<br>Silahkan masukkan Username atau Password dengan benar!";
	echo '<META HTTP-EQUIV="REFRESH" CONTENT = "2; URL=../index.php">';  
}

?>