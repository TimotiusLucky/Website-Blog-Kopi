<?php

    include "koneksi.php";

    $id_admin = $_GET['id'];
    
    $hasil = mysqli_query($conn, "DELETE FROM admin WHERE id = $id_admin");

    header("location:admin?pesan=berhasil-hapus");

?>