<?php
class AfficherMenuService 

{
	public function getMenusHTML($menus, $rangerMenusService){
		$menusHTML = "";
		foreach ($menus as $menu) {
			$containerMenu = '<div><div class="alert alert-info" role="alert" style="text-align:center; margin-top: 10px;">'.$menu->attributes()["titre"].' (Prix : '.$rangerMenusService->getPrix($menu).' '.$rangerMenusService->getDevise($menu).')</div>';
			$row = '<div class="row carte" style="margin-top: 10px;";>';
			$plats = $menu->plat;
			foreach ($plats as $plat) {							
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
							
			} //ici

			$row .= '</div>'; //On ferme la balise
			$containerMenu .= $row.'</div>';
			$menusHTML .= $containerMenu; 
			
		} // pour chaque menu

		return $menusHTML;

	}
}