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

                $tampil = mysqli_query($conn, "SELECT * FROM konten WHERE id='$id'");

                while($tmpl = mysqli_fetch_array($tampil)) { ?>

                    <div class="row img-padding">
                        <?php echo"<img src='uploads/".$tmpl['gambar']."' alt='".$tmpl['alt']."'"?>
                    </div>

                    <div class="row text-left">

                        <?php

                        //Judul
                        echo"<h1 class='my-3'>".$tmpl['judul']."</h1><hr>";

                        ?>

                        <div style="margin-left: 20px;">

                            <?php

                            //Sub isi 1
                            echo"<p class='text-muted'>".$tmpl['isi']."</p>";?>

                        </div>

                    </div>

                    <?php 
                    $halaman = $tmpl['halaman'];
                } ?>

                <?php if($id == "2"){ ?>

                <h3 style="margin: 20px 0px  40px 0px;">Jenis-Jenis Kopi</h3>


                <?php $tampil1 = mysqli_query($conn, "SELECT * FROM jenis_kopi ORDER BY id DESC");

                while($tmpl1 = mysqli_fetch_array($tampil1)) { ?>

                    <div class="col-md-4">

                    <div style="width: 90%; margin-top: 20px;" class="cont-padding">

                    <div class="row">
                        <?php echo"<img src='uploads/jenis_kopi/".$tmpl1['gambar']."' alt='".$tmpl1['alt']."'"?>
                    </div>

                    <?php
                    //Jenis Kopi
                    echo"<h2 class='my-3'>".$tmpl1['jenis_kopi']."</h2><hr>";
                    
                    echo"<p class='text-muted'>".$tmpl1['preview']."</p>";

                    echo "<a class='btn btn-primary text-uppercase text-black' href='konten-jenis?id=".$tmpl1['id']."'><b>Baca Selengkapnya</b></a>"; ?>

                    </div>
                    </div>
                    </div>


                <?php }
            } ?>

        </section>

        <?php 
        include'komentar.php';
        include'footer.html';
        ?>

    </body>
</html>
