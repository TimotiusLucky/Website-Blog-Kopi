<!DOCTYPE html>
<html lang="en">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
  <?php 
  include'header.html';
  ?>

  <script src="https://cdn.ckeditor.com/ckeditor5/38.1.1/inline/ckeditor.js"></script>

  <body>

      <?php
      session_start();

      if (!isset($_SESSION['username'])) {
          header("Location: login");
      }
      
      error_reporting(E_ALL && ~E_NOTICE);
      include'nav-bar-admin.html';
      ?>

      <main style="margin-top: 58px">
        <div class="container pt-4">

          <div class="container">
              <div class="row text-left">

                      <h1>Edit Jenis Kopi</h1>
                      <hr>

                      <?php 
                      include "koneksi.php";
                      $id = $_GET['id'];
                      $tampil = mysqli_query($conn, "SELECT * FROM jenis_kopi WHERE id='$id'");
                      while($jns_kopi = mysqli_fetch_array($tampil)){
                      ?>

                      <form method="post" action="aksi-edit-jenis-kopi.php" enctype="multipart/form-data">

                        <input type="hidden" name="id" value="<?php echo $jns_kopi['id'] ?>">

                        <h6>Nama Jenis Kopi</h6>
                        <input class="form-control" type="text" name="jenis_kopi" value="<?php echo $jns_kopi['jenis_kopi'] ?>">
                        <br>

                        <h6>Penjelasan</h6>
                        <textarea id="editor1" class="form-control" name="penjelasan" cols="40" rows="6"><?php echo $jns_kopi['isi'] ?></textarea>
                        <br>

                        <h6>Gambar</h6>
                        <input class="form-control" type="file" name="uploadfile" required>
                        <br>

                        <h6>Alt</h6>
                        <input class="form-control" type="text" name="alt" value="<?php echo $jns_kopi['alt'] ?>">
                        <br>

                        <h6>Preview</h6>
                        <textarea id="editor1" class="form-control" name="preview" cols="40" rows="6"><?php echo $jns_kopi['preview'] ?></textarea>
                        <br>

                        <script>
                          CKEDITOR.replace( 'editor1' );
                          CKEDITOR.on("instanceReady", function(event) {
                            event.editor.on("beforeCommandExec", function(event) {
                                // Show the paste dialog for the paste buttons and right-click paste
                                if (event.data.name == "paste") {
                                    event.editor._.forcePasteDialog = true;
                                }
                                // Don't show the paste dialog for Ctrl+Shift+V
                                if (event.data.name == "pastetext" && event.data.commandData.from == "keystrokeHandler") {
                                    event.cancel();
                                }
                            })
                        });
                        </script>

                        <button class="btn btn-info btn-xl text-uppercase" id="submitButton" name="Submit" type="submit">Konfirmasi</button>

                      </form>

                      <?php } ?>

              </div>
          </div>

        </div>
      </main>
              
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
      <script src="js/scripts.js"></script>
      <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>

  </body>
</html>
