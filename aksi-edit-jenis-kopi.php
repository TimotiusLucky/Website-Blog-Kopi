<?php
include "koneksi.php";

$msg = "";

  $id = $_POST['id']; 
  $jenis=$_POST['jenis_kopi'];
  $isi=$_POST['penjelasan'];
  $alt=$_POST['alt'];
  $preview=$_POST['preview'];

  $filename = $_FILES["uploadfile"]["name"];
  $tempname = $_FILES["uploadfile"]["tmp_name"];
  $folder = "./uploads/jenis_kopi/" . $filename;

  $hpsgbr = mysqli_query($conn, "SELECT * FROM jenis_kopi where id='$id'");
  $jalankan =mysqli_fetch_array($hpsgbr);

  if ($jalankan['gambar'] == "") {
    
  }else{

  unlink("uploads/jenis_kopi/$jalankan[gambar]");

  }

  $result = mysqli_query($conn, "UPDATE jenis_kopi SET jenis_kopi='$jenis',isi='$isi',gambar='$filename',alt='$alt', preview='$preview' WHERE id=$id");

  if (move_uploaded_file($tempname, $folder)) {
    echo "<h3> Image uploaded successfully!</h3>";
  } else {
    echo "<h3> Failed to upload image!</h3>";
  }

  header("Location: adm-jenis-kopi?pesan=berhasil-edit");

?>
