<!DOCTYPE html>
<html lang="en">
    
    <?php 
    include'header.html';
    ?>

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

                        <h1>Tambah Admin</h1>
                        <hr>

                        <form method="post" action="aksi-tambah-admin.php">

                          <h6>Username</h6>
                          <input class="form-control" type="text" name="username" required>
                          <br>
                          <h6>Password</h6>
                          <input class="form-control" type="text" name="password" required>
                          <br>
                          <button class="btn btn-info btn-xl text-uppercase" id="submitButton" name="Submit" type="submit">Konfirmasi</button>

                        </form>

                </div>
            </div>

          </div>
        </main>
                
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>

    </body>
</html>
