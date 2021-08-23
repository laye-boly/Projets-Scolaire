<?php

def function verifierDate($date)
{
	if(preg_match("^((0[1-9])|((1|2)[0-9])|(3[0-1]))\/((0[1-9])|(1[0-2]))\/(\d{4} [1-9]{2}:[1-9]{2})$", $date))){
		return true;
	}
	return false;
}

def function verifierQuantite($quantite){

	if(intval($quantite) == 0){
		return false;
	}
	return true;
}

def function verfierPrix($prix){

	return is_float($prix);
}

$ventes = "Ventes.csv";

$ventesCSV = fopen($ventes, "r");

while(($ligne = fgets($ventesCSV))){

	$tabColonne = explode(";", $ligne);
	$codeClient = $tabColonne[0];
	$codeProduit = $tabColonne[1];
	$dateVente = $tabColonne[2];
	$prixUnitaire = $tabColonne[3];
	$quantiteTotale = $tabColonne[4];

	if(verfierPrix($prixUnitaire) && verifierQuantite($quantiteTotale) && verifierDate($dateVente)){

		try
		{
			$bdd = new PDO('mysql:host=localhost;dbname=ventes;charset=utf8', 'root', 'root');
			$bdd->exec('INSERT INTO SAS_Vente(CodeClient, CodeProduit, DateVente, PrixProduit, QuantiteProduit') VALUES();
		}
		catch(Exception $e)
		{
        	die('Erreur : '.$e->getMessage());
		}



	}

}
