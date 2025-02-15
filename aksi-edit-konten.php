<?php
include "koneksi.php";

$msg = "";

  $id = $_POST['id']; 
  $judul=$_POST['judul'];
  $isi=$_POST['isi'];
  $preview=$_POST['preview'];
  $alt=$_POST['alt'];

  $filename = $_FILES["uploadfile"]["name"];
  $tempname = $_FILES["uploadfile"]["tmp_name"];
  $folder = "./uploads/" . $filename;

  $hpsgbr = mysqli_query($conn, "SELECT * FROM konten where id='$id'");
  $jalankan =mysqli_fetch_array($hpsgbr);

  if ($jalankan['gambar'] == "") {
    
  }else{

  unlink("uploads/$jalankan[gambar]");

  }

  $result = mysqli_query($conn, "UPDATE konten SET judul='$judul',isi='$isi',gambar='$filename',alt='$alt',preview='$preview' WHERE id=$id");

  if (move_uploaded_file($tempname, $folder)) {
    echo "<h3> Image uploaded successfully!</h3>";
  } else {
    echo "<h3> Failed to upload image!</h3>";
  }

  header("Location: adm-konten");

?>
