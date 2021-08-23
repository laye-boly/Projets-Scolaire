<?php

// require("dbconnect.php");


function posterCommentaire($businessId, $auteur, $contenu)
{
    $db = dbConnect();
    $commentaires = $db->prepare('INSERT INTO commentaires(business_id, auteur, contenu, commentaire_date) VALUES(?, ?, ?, NOW())');
    $lignes = $commentaires->execute(array($businessId, $auteur, $contenu));
    var_dump($lignes);
    return $lignes;
}