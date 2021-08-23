<?php

	if(isset($_GET["fichier"])){
		
		// Activation de la gestion des erreurs ; ce qui empéche l'affichage d'erreur si le document est invalide et aussi de mettre en place notre propre code de gestion des erreurs
		libxml_use_internal_errors(true);
						
		$xml = new DOMDocument();
		$xml->load('restaurants_uploads/'.$_GET["fichier"]);
		if (!$xml->schemaValidate('restaurant.xsd')) {
				
			// On inclut le service de gestion des erreurs xml
			include("Service/GestionErreursXMLService.php");
			// On affiche les erreurs
			include("template/admin/display_errors.php");

			
   		}else{

   				rename('restaurants_uploads/'.$_GET["fichier"], 'restaurants_valides/'.$_GET["fichier"].".xml");
   				echo("validé");
   		}

		


	}else{

		echo "fichier absent";
	}