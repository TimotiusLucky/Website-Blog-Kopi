<?php

include'koneksi.php';

$id = $_POST['id_hal'];
$nama = $_POST['nama'];
$isi = $_POST['isi'];
$waktu = date("Y.m.d");
$sts = $_POST['halaman'];
$r_of = $_POST['reply_of'];

mysqli_query($conn, "INSERT INTO comments VALUES('','$nama','$isi','$waktu','$sts','$r_of')");

header("location:konten?id=$id#halKomentar");

?>