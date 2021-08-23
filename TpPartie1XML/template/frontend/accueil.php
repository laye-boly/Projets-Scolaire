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

   <?php  include "template/navigation.php" ;?> 

  <!-- Page Content -->
  <div class="container">
      <?php
          if(count($fichiers) > 0){
            foreach ($fichiers as $fichier) {
              $displayRestoService->displayRestaurant($fichier, $rangerMenusService, $afficherMenuService);
              echo "<hr> <hr> <hr> <hr>";
            } 
          }else {

            echo '<div class="alert alert-info" role="alert" style="text-align:center; margin-top: 10px;"> Désolé Pas encore de restaurants sur le site. Revenez plus tard</div>';
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
