<?php

class RangerMenusService 

{
	public function getPrix($menu){
		$plats = $menu->plat;
		$prixMenu = 0;
		foreach ($plats as $plat) {
			$prixPlat = intval($plat->prix->attributes()["valeur"]);
			$prixMenu += $prixPlat;
		}
		return $prixMenu;
		
	}

	public function getMenusParOdreCroissant($menus) {
		$tabPrixMenus = array();
		$menusParOrdreCroissant = array();
		foreach ($menus as $menu) {
			$tabPrixMenus[] = $this->getPrix($menu);
		}
		// On trie par ordre croissant les prix
		sort($tabPrixMenus);
		
		$indexMenusRange = array();

		foreach ($tabPrixMenus as $prix) {
			for ($i=0; $i < count($menus); $i++) { 
			 	if($this->getPrix($menus[$i]) == $prix){
			 		if(!in_array($i, $indexMenusRange)){
			 			$menusParOrdreCroissant[] = $menus[$i];
			 			$indexMenusRange[] = $i;
			 			break;

			 		}
			 	}
			}
		}

		return $menusParOrdreCroissant;
	}

	public function getMenusParOdreDecroissant($menus) {
		$tabPrixMenus = array();
		$menusParOrdreDecroissant = array();
		foreach ($menus as $menu) {
			$tabPrixMenus[] = $this->getPrix($menu);
		}
		// On trie par ordre croissant
		rsort($tabPrixMenus);
		$indexMenusRange = array();

		foreach ($tabPrixMenus as $prix) {
			for ($i=0; $i < count($menus); $i++) { 
			 	if($this->getPrix($menus[$i]) == $prix){
			 		if(!in_array($i, $indexMenusRange)){
			 			$menusParOrdreDecroissant[] = $menus[$i];
			 			$indexMenusRange[] = $i;
			 			break;

			 		}
			 	}
			}
		}
		return $menusParOrdreDecroissant;
	}

	public function getDevise($menu){

		$plat = $menu->plat[0];
		return $plat->prix->attributes()["devise"];
				
	}



	
}