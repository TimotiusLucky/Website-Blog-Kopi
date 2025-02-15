<!DOCTYPE html>
<html lang="en">

    <?php include'header.html';?>

    <body id="page-top">

        <?php
        session_start();
        error_reporting(E_ALL && ~E_NOTICE);
        ?>

        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand" href="#page-top"><h3>Coffee Beans</h3></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars ms-1"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                        <li class="nav-item"><a class="nav-link" href="#Sejarah">Sejarah</a></li>
                        <li class="nav-item"><a class="nav-link" href="#Jenis">Jenis</a></li>
                        <li class="nav-item"><a class="nav-link" href="#Karakteristik">Karakteristik</a></li>
                        <li class="nav-item"><a class="nav-link" href="#Metode">Metode</a></li>
                        <li class="nav-item"><a style="color: #ffc800;" class="nav-link" href="tentang">Tentang</a></li>
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
        <!-- Masthead-->
        <header alt="Photo by Nathan Dumlao on Unsplash" class="masthead">
            <div class="container">
                <div class="masthead-subheading" style="text-shadow: 2px 2px #7D7463;">Welcome To My Website!</div>
                <div class="masthead-heading text-uppercase text-warning" style="text-shadow: 3px 3px #7D7463;">Coffee Beans</div>
            </div>
        </header>

        <?php 
        include "koneksi.php";
        $id = $_GET['id'];
        $tampil = mysqli_query($conn, "SELECT * FROM konten WHERE halaman = 'Beranda'");
        while($beranda = mysqli_fetch_array($tampil)){
        ?>

        <!-- Home -->
        <div style="margin-top: 50px;" class="container">
            <div class="row text-left">
                <?php echo "<img src='uploads/".$beranda['gambar']."' alt='".$beranda['alt']."'>";?>
                <div style="margin-top: 20px;">
                    <?php
                    echo "<h2 class='my-3'>".$beranda['judul']."</h2>
                    <p class='text-muted'>".$beranda['isi']."</p>";
                    ?>
                </div>
            </div>
        </div>

        <?php }?>

        <?php 
        include "koneksi.php";
        $id = $_GET['id'];
        $tampil = mysqli_query($conn, "SELECT * FROM konten WHERE halaman != 'Beranda' AND halaman != 'Tentang' ORDER BY id ASC");
        while($konten = mysqli_fetch_array($tampil)){
        ?>

        <!-- Sejarah-->
        <?php echo"<section class='page-section bg-light' id=".$konten['halaman'].">"?>
            <div class="container cont-padding">
                <div class="row text-left">
                    <?php 
                    echo"<img src='uploads/".$konten['gambar']."' alt='".$konten['alt']."' class='col-md-5'>

                    <div class='col-md-7'>

                        <h2 class='section-heading text-uppercase'>".$konten['halaman']."</h2>
                        <h3 class='section-subheading text-muted'>".$konten['preview']."</h3>
                        <a class='btn btn-primary btn-xl text-uppercase text-black' href='konten?id=".$konten['id']."'>Baca Selengkapnya</a>"
                        ?>
                    </div>
                </div>
            </div>
        </section>

            <?php }?>

        <?php include'footer.html';?>

    </body>
</html>
