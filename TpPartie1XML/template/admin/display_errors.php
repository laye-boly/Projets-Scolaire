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
      $gestionErreursXMLService = new GestionErreursXMLService;
      $gestionErreursXMLService->displayErrors();
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
