<?php

require('model/ajoutCommentaireModel.php');

function addCommentaireController($businessId, $auteur, $contenu)
{
    $ligne = posterCommentaire($businessId, $auteur, $contenu);

    if ($ligne === false) {
    	var_dump("impossible");
        die('Impossible d\'ajouter le commentaire !');

    }
    else {
         header('Location: ./index.php?action=business&id=' . $businessId);
        
    }
}