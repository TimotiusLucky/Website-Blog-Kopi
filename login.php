<!DOCTYPE html>
<html lang="en">
    
    <?php include'header.html';?>

    <?php 

    session_start();
    unset($_SESSION['username']);  
    session_destroy();

    ?>

    <script type="text/javascript">
        history.pushState(null, null, location.href);
        window.onpopstate = function () {
            history.go(1);
        };
    </script>

    <style type="text/css">

    	body {
		    width: 100%;
		    min-height: 100vh;
		    display: flex;
		    justify-content: center;
		    align-items: center;
		}

		.alert{
			background: #e44e4e;
			color: white;
			padding: 10px;
			text-align: center;
			border:1px solid #b32929;
		}


    </style>

    <body class="bg-dark">

        <div class="container con-tengah">

        	<?php 
			if(isset($_GET['pesan'])){
				if($_GET['pesan']=="gagal"){
					echo "<div class='alert'>Username dan Password tidak sesuai !</div>";
				}
			}
			?>
			
        	<h1 class="text-dark text-center">LOGIN</h1>
        	<hr>
        	<div class="bg-light">
        		<form method="post" action="cek-login.php">
        			<h6>Username</h6>
                    <input class="form-control" type="text" name="username">
                    <br>
                    <h6>Password</h6>
                    <input class="form-control" type="password" name="password">
                    <br>
                    <center><button class="btn btn-primary btn-xl text-uppercase" id="submitButton" type="submit">Konfirmasi</button></center>
                </form>
        	</div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>

    </body>
</html>
