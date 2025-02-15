<?php 

$name = $_POST['username'];
$pass = $_POST['password'];
$level = "admin";

include_once("koneksi.php");
      
$hasil = mysqli_query($conn, "INSERT INTO admin(username,password,level) VALUES('$name', MD5('$pass'), '$level')");

header("location:admin?pesan=berhasil-input");

?>