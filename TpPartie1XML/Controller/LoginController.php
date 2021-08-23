<?php 
include "../Service/VerifierEmailService.php";
include "../Service/VerifierPasswordService.php";
include "../Repository/UserModele.php";
include "../Entite/User.php";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$password = $email = "";
  if(isset($_POST["email"])){
  	$email = $_POST["email"];
  	$verifierEmailService = new VerifierEmailService;
  	if(!$verifierEmailService->verifierEmail($email)){
  		header("Location: test.php?erreur='ok'");
  		exit;
  	}
  }
  	if(isset($_POST["password"])){
  		$password = $_POST["password"];
  		$verifierPasswordService = new VerifierPasswordService;
  		if(!$verifierPasswordService->verifierPassword($password)){
  			header("Location: ../test.php?erreur='ok'");
  			exit;
  		}
  	}

  	$userModele = new UserModele;
  	$res = $userModele->findOneByEmailPassword($email, $password);

  	if($res){
  		session_start();
  		$user = hash("sha256", "".$res["email"]."".$res["password"]);
  		$_SESSION["status"] = $res["status"];
  		$_SESSION["user"] = $user;
  		if($res["status"] == "resto"){
  			header("Location: ../template/dashbord.php");
  			exit;
  		}else{
  			echo "connecté";
  			exit;
  		}
  	}else{
      echo "Parametre de connextion invalide";
    }
  	
  
}