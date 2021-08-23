<?php
require("dbconnect.php");
function getBusinesss()
{
	$db = dbConnect();

	$req = $db->query('SELECT id, titre, contenu, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM business ORDER BY date_creation DESC LIMIT 0, 5');
	
	return $req;
}

function getBusiness($businessId)
{
	$db = dbConnect();

	$req = $db->prepare('SELECT id, titre, contenu, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM business WHERE id = ?');
	$req->execute(array($businessId));
	$business = $req->fetch();
	return $business;
}

function getCommentaires($businessId)
{
    $db = dbConnect();


    $commentaires = $db->prepare('SELECT id, auteur, contenu, DATE_FORMAT(commentaire_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM commentaires WHERE business_id = ? ORDER BY commentaire_date DESC');
    $commentaires->execute(array($businessId));

    return $commentaires ;
}

// function dbConnect()
// {
//     try
//     {
//         $db = new PDO('mysql:host=localhost;dbname=testesp;charset=utf8', 'root', '');
//         return $db;
//     }
//     catch(Exception $e)
//     {
//         die('Erreur : '.$e->getMessage());
//     }
// }
?>