<?php
class DisplayRestoService 

{
	public function displayRestaurant($restoXML, $rangerMenusService, $afficherMenuService){
		$restaurant = simplexml_load_file($restoXML);
		$coordonnees = $restaurant->coordonnees;

		$restaurantHTML = '<div class="card"><div class="card-header"> Nom du restaurant : '.$coordonnees->nom.'</div>';
		$restaurantHTML .= '<div class="card-body"><h5 class="card-title">Adresse : '.$coordonnees->adresse.'</h5>';
		$restaurantHTML .= '<h5 class="card-title">Gérant(e) : '.$coordonnees->nom_restaurateur.'</h5>';

		$descriptions = $coordonnees->descript;
		// var_dump($descriptions);
		if($descriptions){
			foreach ($descriptions as $description) {
				$enfants = $description->children();
				foreach ($enfants as $enfant) {
					$nom = $enfant->getName();
					switch ($nom) {
						case 'liste':
							$restaurantHTML .= '<ul class="list-group">';
                           foreach ($enfant as $liste) {
								$restaurantHTML .= '<li class="list-group-item">'.$liste.'</li>';
							}
								$restaurantHTML .= '</ul>';
							break;
						case 'pi':
							$restaurantHTML .= '<strong>'.$enfant[0].'</strong>';
							break;
						case 'paragraphe':

							if($enfant->image){
								$images = $enfant->image;
								$div = '<div class="card-text">';
								$centres = '<div class="row">';
								$centre = '<div class="col-md-4 offset-md-4" style="margin-top: 20px;">';
								$gauchedroitetexte = '<div class="row">';
								$gauche = '<div class="col-md-4">';
								$texte = '<div class="col-md-4" style="margin: 20px;">';
								$droite = '<div class="col-md-4">';
								foreach ($images as $image) {
									$position = $image->attributes()["position"];
									$url = $image->attributes()["url"];
									if($position == "centré"){
										$centre .= '<img src="'.$url.'" alt="Image indisponible">';
									}elseif ($position == "gauche"){
										$gauche .= '<img src="'.$url.'" alt="Image indisponible">';
									}else{
										$droite .= '<img src="'.$url.'" alt="Image indisponible">';
									}
								}
								$centre .= '</div>';
								$centres .= $centre;
								$centres .= '</div>';
								$gauche .= '</div>';
								$droite .= '</div>';
								$texte .= $enfant->texte.'<hr></div>';
								$gauchedroitetexte .= $gauche.''.$texte.''.$droite.'</div>';
								$div .= $centres.''.$gauchedroitetexte.'</div>';
								$restaurantHTML .= $div;
								$restaurantHTML .= '</div>'; //fermeture card-body pour debugger

							}else{
								$restaurantHTML .= '<p class="card-text">'.$premierEnfant->texte.'</p>';
							}
							break;
						
						
					}

				}


			}
				

		}
		

		$carte = $restaurant->carte;
		$restaurantHTML .= '<div class="alert alert-info" role="alert" style="text-align:center;">La carte proposée par le restaurant</div>';
		$row = '<div class="row carte" style="margin-top: 10px;";>';
		$plats = $carte->plat;
		foreach ($plats as $plat) {
			// var_dump($plat->prix);
			$colonne = '<div class="col-md-3" style="margin-top: 10px;">';
			$ul = '<ul class="list-group"><li class="list-group-item">Indication : '.$plat->attributes()["indication"].'</li>';
			if($plat->children()){
				$enfants = $plat->children();
				// Permet de séparer les ensembles prix et description(s)
				$separateur = false;
				$nbreEnfants = count($enfants);
				$li = '<li class="list-group-item">';
				foreach ($enfants as $enfant) {
					$nom = $enfant->getName();
					
					switch ($nom) {
						case 'prix':
							$li .= 'Le prix est de : '.$enfant->attributes()["valeur"].' '.$enfant->attributes()["devise"].'</li>';
							$ul .= $li;
							// var_dump($li);
							$separateur = true;
							break;
						
						case 'description_plat':
							if($separateur == false){
								$li .= '<strong>'.$enfant->partie_importante.'</strong><br>';
							}
							else{
								$li = '<li class="list-group-item"><strong>'.$enfant->partie_importante.'</strong><br>';
								$separateur == false;
							}

							break;
					}						
					
				}

				$ul .= '</ul>'; // On ferme la balise 
				$colonne .= $ul;
				$colonne .= '</div>';
				$row .= $colonne;


			}else{
				$ul .= '</ul>'; // On ferme la balise 
				$colonne .= $ul;
				$colonne .= '</div>'; //On ferme la balise
				$row .= $colonne;
			}

		}
			
		$row .= '</div>'; //On ferme la balise

		$restaurantHTML .= $row;
		$menus = $restaurant->menus;
		// var_dump($menus[0]->children());
		if($menus){
			//On récupére l'ordre d'affichages des menus 
			$ordre = $menus->attributes()["ordre"];
			$restaurantHTML .= '<div class="alert alert-info" role="alert" style="text-align:center; margin-top: 10px;">Les Menus proposés par le restaurant : ordre '.$ordre.'</div>';
			// include('RangerMenusService.php');
			// include('AfficherMenuService.php');

			// $rangerMenusService = new RangerMenusService;
			// $afficherMenuService = new AfficherMenuService;
			switch ($ordre) {
				case 'pluscher':
					$menusParOrdreDecroissant = $rangerMenusService->getMenusParOdreDecroissant($menus->children());
					$menuHTML = $afficherMenuService->getMenusHTML($menusParOrdreDecroissant, $rangerMenusService);
					$restaurantHTML .= $menuHTML;
					break;
				
				case 'pluspetit':
					$menusParOrdreCroissant = $rangerMenusService->getMenusParOdreCroissant($menus->children());
					$menuHTML = $afficherMenuService->getMenusHTML($menusParOrdreCroissant, $rangerMenusService);
					$restaurantHTML .= $menuHTML;

					// pour chaque menu
					break;
				case 'aleatoire':
					$menuHTML = $afficherMenuService->getMenusHTML($menus->children(), $rangerMenusService);
					$restaurantHTML .= $menuHTML;
					break;
			}
		}
		


?>


		
<?php
		$restaurantHTML .= '</div>'; // On fermee la div.class=card-body
		$restaurantHTML .= '</div>'; // On fermee la div.class=card
		echo $restaurantHTML;
		
	}
}
?>
		
<?php


?>