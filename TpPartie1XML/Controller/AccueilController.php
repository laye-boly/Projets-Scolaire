<?php
	$dossier = "restaurants_valides";
	if(is_dir($dossier)){
		if($dossierOuvert = opendir($dossier)){
			$fichiers = array();
			while (($fichier = readdir($dossierOuvert)) !== false) {
				if($fichier != '.' && $fichier != '..'){

					$fichiers[] = "restaurants_valides/$fichier";
					
				}
            	// : type : " . filetype($dossier . $fichier) . "\n";
        	}

        closedir($dossierOuvert);
        include 'Service/DisplayRestoService.php';
        include 'Service/RangerMenusService.php';
        include 'Service/AfficherMenuService.php';
        $rangerMenusService = new RangerMenusService;
		$afficherMenuService = new AfficherMenuService;

        $displayRestoService = new DisplayRestoService;
        include("template/frontend/accueil.php");

		}

	}
?>