<?php 
if (isset($_GET['action'])){
  if($_GET['action'] == "accueil"){
  	include("Controller/AccueilController.php");
  }elseif ($_GET['action'] == "dashbord") {
  	include("Controller/DashbordController.php");
  }elseif ($_GET['action'] == "merci") {
  	echo("Votre fichier a été bien uplodé. Patientez pour sa validation");
  }
  elseif ($_GET['action'] == "admin") {
  	include("Controller/AdminIndexController.php");
  }
  elseif ($_GET['action'] == "validation") {
  	include("Controller/ValidationDTDController.php");
  }


}else{
  include("Controller/AccueilController.php");
}