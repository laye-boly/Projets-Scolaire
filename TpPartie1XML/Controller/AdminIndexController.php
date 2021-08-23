<?php
	$dossier = "restaurants_uploads";
	if(is_dir($dossier)){
		if($dossierOuvert = opendir($dossier)){
			$fichiers = array();
			while (($fichier = readdir($dossierOuvert)) !== false) {
				if($fichier != '.' && $fichier != '..'){
					$fichiers[] = "$fichier";
					
					
				}
            	// : type : " . filetype($dossier . $fichier) . "\n";
        	}

        closedir($dossierOuvert);

        include("template/admin/index.php");

		}

	}
?>