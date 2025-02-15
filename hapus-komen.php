<?php
include 'koneksi.php';

if (isset($_GET['id'])) {

	$id_hal = $_GET['id_hal'];
	$id_komen = $_GET['id'];
	$r_of = $_GET['r_of'];

	if ($r_of == "0") {

		mysqli_query($conn, "DELETE FROM comments WHERE reply_of='$id_komen'");
		mysqli_query($conn, "DELETE FROM comments WHERE id_comment='$id_komen'");

	}else{

		mysqli_query($conn, "DELETE FROM comments WHERE id_comment='$id_komen'");

	}

header("location:konten?id=$id_hal#halKomentar");

}else{
 echo 'data kosong';
}

?>