<!-- Daftar Komentar -->
<section style="padding: 2rem 0;" id="halKomentar">

    <div class="container">

        <div class="row text-left">
            <h2 class="my-3">Daftar Komentar</h2>
            <hr>
        </div>

        <?php
        include 'koneksi.php';

        $tampil = mysqli_query($conn, "SELECT * FROM comments WHERE sts_halaman = '$halaman' AND reply_of='0' ORDER BY id_comment DESC");

        $cek = mysqli_num_rows($tampil);

        if($cek < 1){

            echo"<center><p>Tidak ada Komentar</p></center>";
        }

        while($komen = mysqli_fetch_array($tampil)) {

        ?>

            <div style="margin-bottom: 20px;" class="container com-padding">

                <div class="row">
                <?php
                            echo"<h4>".$komen['nama']."</h4>";
                            echo"<p style='margin-left: 20px; margin-bottom: 0px;'>".$komen['isi']."</p>";
                ?>
                </div>

                <div align="right" class="row">
                    <?php
                    echo"<b><p style='margin-bottom: 0px;'>".$komen['waktu']."</p></b>";

                    echo "<table><tr><th style='width:82%; border: 0px;'></th>";

                    echo"<th style='width:8%; border: 0px;'><button type='buttons' class='btn btn-info' data-id='".$komen['id_comment']."' onclick='showReplyForm(this);'>Reply</button></th>";

                    if($_SESSION['level']=="admin"){
                    ?>
                    <th style="width:10%; border: 0px;"><a style="margin-left: 10px;" class="btn btn-danger" href="hapus-komen.php?id=<?php echo $komen['id_comment']; ?>&r_of=<?php echo $komen['reply_of']; ?>&id_hal=<?php echo $id; ?>">Hapus</a></th><tr>
                    <?php
                    }
                    ?>

                    </table>

                </div>

                <!-- Form Reply -->
                <form action="aksi-tambah-reply.php" method="post" id="form-<?php echo $komen['id_comment']; ?>" style="display: none;">

                    <hr>
                 
                    <input type="hidden" name="reply_of" value="<?php echo $komen['id_comment']; ?>" required>
     
                    <?php
                    if($_SESSION['level']=="admin"){
                    ?>
                        <input type="hidden" name="nama" value="Admin">
                    
                    <?php
                    }else{
                    ?>
                        <div class="form-group">
                            <!-- Input Username -->
                            <input type="hidden" name="id" value="<?php echo $id; ?>">

                            <input class="form-control" name="nama" type="text" placeholder="Nama Kamu *" />
                            <div class="invalid-feedback">Kolom Nama Kosong.</div>
                        </div>
                    <?php
                    }
                    ?>
     
                    <div style="margin-top: 40px;" class="form-group form-group-textarea mb-md-0">
                        <!-- Input Komentar -->
                        <textarea rows="7" class="form-control" name="isi" placeholder="Pesan Kamu *"></textarea>
                        <div class="invalid-feedback">Kolom Pesan Kosong.</div>
                    </div>

                    <input type="hidden" name="id_hal" value="<?php echo "$id" ?>">
                    <input type="hidden" name="halaman" value="<?php echo"$halaman" ?>"><br>

                    <button class="btn btn-primary btn-x text-uppercase" value="Reply" name="do_reply" type="submit">Kirim</button><br><br>

                </form>

                <?php

                $id_k = $komen['id_comment'];

                $tampil2 = mysqli_query($conn, "SELECT * FROM comments WHERE reply_of = '$id_k' ORDER BY id_comment DESC");

                while($komen2 = mysqli_fetch_array($tampil2)) { ?>

                <!-- Reply 2 -->
                <br>
                <div style="margin-bottom: 20px;" class="container rpl-padding">
                
                    <div class="row">
                    <?php
                                echo"<h4>".$komen2['nama']."</h4>";
                                echo"<p style='margin-left: 20px; margin-bottom: 0px;'>".$komen2['isi']."</p>";
                    ?>
                    </div>

                    <div align="right" class="row">
                        <?php
                        echo"<b><p style='margin-bottom: 0px;'>".$komen2['waktu']."</p></b>";

                        echo "<table><tr><th style='width:90%; border: 0px;'></th>";

                        if($_SESSION['level']=="admin"){
                        ?>
                        <th style="width:10%; border: 0px;"><a style="margin-left: 10px;" class="btn btn-danger" href="hapus-komen.php?id=<?php echo $komen2['id_comment']; ?>&r_of=<?php echo $komen2['reply_of']; ?>&id_hal=<?php echo $id; ?>">Hapus</a></th><tr>
                        <?php
                        }
                        ?>

                        </table>

                    </div>

                </div>

                <?php } 

        echo"</div>";
        
            } ?>
    </div>

</section>

<!-- Komentar -->
<section style="padding: 2rem 0;" class="bg-dark">
    <div class="container">

        <div class="text-center text-light">
            <h2 class="text-uppercase">Komentar</h2>
            <p>Kirim komentar mu disini.</p>
        </div>
        <br>

        <form method="post" action="aksi-tambah.php" id="formKomen">
            <div class="row align-items-stretch mb-5">
                <div class="col-md-12">

                    <?php
                    if($_SESSION['level']=="admin"){
                    ?>
                        <input type="hidden" name="nama" value="Admin">
                    
                    <?php
                    }else{
                    ?>
                        <div class="form-group">
                            <!-- Input Username -->
                            <input class="form-control" name="nama" type="text" placeholder="Nama Kamu *" />
                            <div class="invalid-feedback">Kolom Nama Kosong.</div>
                        </div>
                    <?php
                    }
                    ?>

                    <div style="margin-top: 40px;" class="form-group form-group-textarea mb-md-0">
                        <!-- Input Komentar -->
                        <textarea rows="7" class="form-control" name="isi" placeholder="Pesan Kamu *"></textarea>
                        <div class="invalid-feedback">Kolom Pesan Kosong.</div>
                    </div>
                    <input type="hidden" name="id_hal" value="<?php echo "$id" ?>">
                    <input type="hidden" name="halaman" value="<?php echo "$halaman" ?>">
                </div>
            </div>

            <!-- Button Submit -->
            <div class="text-center">
                <button class="btn btn-primary btn-xl text-uppercase" id="submitButton" type="submit">Kirim</button>
            </div>

        </form>
    </div>
</section>

<script>
    function showReplyForm(self) {
        var commentId = self.getAttribute('data-id');
        if (document.getElementById('form-' + commentId).style.display == '') {
            document.getElementById('form-' + commentId).style.display = 'none';
        } else {
            document.getElementById('form-' + commentId).style.display = '';
        }
    }
</script>