<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Vos restaurant</title>

  <!-- Bootstrap core CSS -->
  <link href="assets/lib/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="assets/lib/css/blog-home.css" rel="stylesheet">

</head>

<body>

  <!-- Navigation -->
<?php  include "template/navigation.php" ;?> 

  <!-- Page Content -->
  <div class="container" style="margin: 50px;">
  	<?php 
  		if(isset($_GET["erreur"])){
  		?> 
  			<div class="alert alert-danger" role="alert">
  				Votre fichier est invalide : seul le format xml est accepté et votre fichier ne doit pas dépassé 10Mo
			</div>
 <?php 
		
  		}
	?> 
    <!-- formulaire de de chargement de fichiers -->
    <!-- <a href='../Controller/FileController.php'>Laye</a> -->
    <form method="post" action="Controller/FileController.php" enctype="multipart/form-data">
      <div class="form-group">
        <label for="exampleInputEmail1">Télécharger votre fichier restaurant en xml</label>
        <input type="file" class="form-control" name="monfichier">
      </div>

    <button type="submit" class="btn btn-primary">Uploader votre restaurant</button>
    </form>

  </div>
    

  </div>
  <!-- /.container -->

  <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; Your Website 2020</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="../assets/lib/vendor/jquery/jquery.min.js"></script>
  <script src="../assets/lib/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
