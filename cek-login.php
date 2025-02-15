<?php
session_start();

include'koneksi.php';

$username = $_POST['username'];
$password = $_POST['password'];

$login = mysqli_query($conn, "SELECT * from admin where username='$username' AND password=MD5('$password')");

$cek = mysqli_num_rows($login);

if($cek > 0){

	$data = mysqli_fetch_assoc($login);

	if($data['level'] == "admin"){

		$_SESSION['username'] = $username;
		$_SESSION['level'] = "admin";

		header("location:admin");
	}else{

		header("location:login?pesan=gagal");
	}

}else{
	header("location:login?pesan=gagal");
}
?>