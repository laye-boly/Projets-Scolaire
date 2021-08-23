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
    if(count($fichiers) !== 0){
  	?>
	  	<table class="table table-striped">
	  		<thead>
			    <tr>
			      <th scope="col">Nom Ficier</th>
			      <th scope="col">Valider</th>
			    </tr>
			</thead>
  			<tbody>
	<?php
    
  		foreach ($fichiers as $fichier) {
        $lien = "index.php?fichier=$fichier&action=validation";
    
  	?>
  		 		<tr>
			      <th scope="row"><?php echo $fichier ?></th>
			      <td><a href="<?php echo $lien ?>">Lien validation</a></td>
				</tr>
	<?php
		}

	?>
	 		</tbody>
		</table>
	<?php
  }else{

  ?> 
  	<div class="alert alert-info" role="alert">
      Tous les fichiers ont été validés
    </div>
  <?php
  }
  ?>
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
  <script src="assets/lib/vendor/jquery/jquery.min.js"></script>
  <script src="assets/lib/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
