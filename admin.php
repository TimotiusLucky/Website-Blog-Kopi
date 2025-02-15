<!DOCTYPE html>
<html lang="en">
    
    <?php 
    include'header.html';
    include 'koneksi.php';
    ?>

    <body>

        <?php
        session_start();

        if (!isset($_SESSION['username'])) {
            header("Location: logout");
        }

        error_reporting(E_ALL && ~E_NOTICE);
        include'nav-bar-admin.html';
        ?>

        <main style="margin-top: 58px">
          <div class="container pt-4">

            <div class="container">
                <div class="row text-left">

                    <?php 
                    if(isset($_GET['pesan'])){
                        $pesan = $_GET['pesan'];
                        if($pesan == "berhasil-input"){
                            echo "<div style='background-color : green; padding : 10px;'><b style='color:white;'>Data berhasil di input.</b></div>";
                        }else if($pesan == "berhasil-hapus"){
                            echo "<div style='background-color : green; padding : 10px;'><b style='color:white;'>Data berhasil di Hapus.</b></div>";
                        }
                    }
                    ?>

                    <table style="width:100%">
                    <tr>
                        <th style="border: 0px; width:85%;"><h1 class="my-3">Daftar Admin</h1></th>
                        <th style="border: 0px; width:15%"><center><a class="btn btn-info text-light" href="tambah-admin"><b>Tambah</b></a></center></th>
                    </tr>
                    </table>

                    <hr>

                    <div style="padding: 0px 20px;">

                        <table>

                          <tr>
                            <th>Username</th>
                            <th>Aksi</th>
                          </tr>

                          <?php

                          $tampil = mysqli_query($conn, "SELECT * FROM admin ORDER BY id DESC");
                          while($admin = mysqli_fetch_array($tampil)) { 

                            echo"<tr>";

                            echo"<td>".$admin['username']."</td>";
                            echo "<td><a class='btn btn-danger text-light' href='hapus-admin?id=".$admin['id']."'><b>Hapus</b></a></td>";

                            echo"</tr>";

                            }?>

                        </table>

                    </div>
                </div>
            </div>

          </div>
        </main>
                
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>

    </body>
</html>
