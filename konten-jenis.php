<!DOCTYPE html>
<html lang="en">
    
    <?php include'header.html';?>

    <body id="page-top">

        <?php
        session_start();
        error_reporting(E_ALL && ~E_NOTICE);

        $id = $_GET['id'];

        ?>

        <?php include'nav-bar.html';?>

        <!-- Konten -->
        <section style="padding: 2.5rem 0;">
            <div class="container">

                <?php
                include 'koneksi.php';

                $tampil = mysqli_query($conn, "SELECT * FROM jenis_kopi WHERE id='$id'");

                while($tmpl = mysqli_fetch_array($tampil)) { ?>

                    <div class="row img-padding">
                        <?php echo"<img src='uploads/jenis_kopi/".$tmpl['gambar']."' alt='".$tmpl['alt']."'"?>
                    </div>

                    <div class="row text-left">

                        <?php

                        //Judul
                        echo"<h1 class='my-3'>".$tmpl['jenis_kopi']."</h1><hr>";

                        ?>

                        <div style="margin-left: 20px;">

                            <?php

                            //Sub isi 1
                            echo"<p class='text-muted'>".$tmpl['isi']."</p>";?>

                        </div>

                    </div>

                    <?php } ?>

            </div>
        </section>

        <?php 
        include'footer.html';
        ?>

    </body>
</html>
