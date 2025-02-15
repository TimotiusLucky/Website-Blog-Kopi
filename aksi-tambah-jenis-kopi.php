<?php 

$jenis = $_POST['jenis_kopi'];
$isi = $_POST['penjelasan'];
$alt = $_POST['alt'];
$preview = $_POST['preview'];

include_once("koneksi.php");

  $filename = $_FILES["uploadfile"]["name"];
  $tempname = $_FILES["uploadfile"]["tmp_name"];
  $folder = "./uploads/jenis_kopi/" . $filename;

  $hasil = mysqli_query($conn, "INSERT INTO jenis_kopi(jenis_kopi, isi, gambar, alt, preview) VALUES('$jenis', '$isi', '$filename', '$alt', '$preview')");

  if (move_uploaded_file($tempname, $folder)) {
    echo "<h3> Image uploaded successfully!</h3>";
  } else {
    echo "<h3> Failed to upload image!</h3>";
  }

header("location:adm-jenis-kopi?pesan=berhasil-input");

?>