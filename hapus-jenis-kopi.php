<?php

    include "koneksi.php";

    $id = $_GET['id'];

    $hpsgbr = mysqli_query($conn, "SELECT * FROM jenis_kopi where id='$id'");
  	$jalankan =mysqli_fetch_array($hpsgbr);
    unlink("uploads/jenis_kopi/$jalankan[gambar]");
    
    $hasil = mysqli_query($conn, "DELETE FROM jenis_kopi WHERE id = $id");

    header("location:adm-jenis-kopi?pesan=berhasil-hapus");

?>