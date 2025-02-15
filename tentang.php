<!DOCTYPE html>
<html lang="en">
    
    <?php include'header.html';?>

    <style type="text/css">

        body {
            width: 100%;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }


    </style>

    <body class="bg-light">

        <?php
        session_start();
        error_reporting(E_ALL && ~E_NOTICE);
        ?>

        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top bg-dark" id="mainNav">
            <div class="container">
                <a class="navbar-brand" href="index"><h3>Website Kopi</h3></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars ms-1"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                        <?php
                        if($_SESSION['level']=="admin"){
                        ?>
                        <li class="nav-item"><a class="btn btn-info nav-link" href="admin">Admin</a></li>
                        <?php
                        }
                        ?>
                        
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container">

            <?php
                        include 'koneksi.php';

                        $tampil = mysqli_query($conn, "SELECT * FROM konten WHERE halaman='tentang'");

                        while($tentang = mysqli_fetch_array($tampil)) {?>

            <section style="padding: 10rem 0;" class="page-section bg-light" >
            <div class="container">
                <div class="row text-left">
                    <?php echo "<img src='uploads/".$tentang['gambar']."' alt='".$tentang['alt']."' class='col-md-5'>";?>

                    <div class="col-md-7">
                        <!-- Judul -->
                        <h2 class="section-heading text-uppercase">Tentang Saya</h2><hr>

                            <?php
                            //Isi Konten
                            echo"<h3 class='section-subheading text-muted'>".$tentang['isi']."</h3><br>";

                        }?>
                        
                        <h5>Find Me On</h5>
                        <a class="btn btn-dark btn-social mx-2" href="https://instagram.com/tan.taniaa_?igshid=ZGUzMzM3NWJiOQ==" aria-label="Twitter"><i class="fab fa-instagram"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="https://www.facebook.com/tania.amanda.33?mibextid=ZbWKwL" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                    </div>
                </div>
            </div>
        </section>

        </div>
    </body>
</html>
