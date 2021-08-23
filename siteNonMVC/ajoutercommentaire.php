<?php
// echo var_dump($_GET['id']);
if (isset($_GET['id']) && $_GET['id'] > 0) {
	$id = $_GET['id'];
            
   if (!empty($_POST['auteur']) && !empty($_POST['commentaire'])) {

   		require('dbconnect.php');

    	$db = dbConnect();
    	$commentaires = $db->prepare('INSERT INTO commentaires(business_id, auteur, contenu, commentaire_date) VALUES(?, ?, ?, NOW())');
    	$lignes = $commentaires->execute(array($_GET['id'], $_POST['auteur'], $_POST['commentaire']));
    

    	if ($ligne === false) {
    	
        	die('Impossible d\'ajouter le commentaire !');

    	}
    	else {
         header('Location: view.php?id='.$id);
                 
    	}
    }	
}else {

	echo "identifiant du post invalide";
}