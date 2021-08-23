<?php

require('controller/controller.php');
require('controller/ajoutCommentaireController.php');

// if (isset($_GET['action'])) {
//     if ($_GET['action'] == 'listBusiness') {
//         listBusiness();
//     }
//     elseif ($_GET['action'] == 'business') {
//         if (isset($_GET['id']) && $_GET['id'] > 0) {
//             business();
//         }
//         else {
//             echo 'Erreur : aucun identifiant de billet envoyé';
//         }
//     }
// }
// else {
//     listBusiness();

// require('controller/frontend.php');

if (isset($_GET['action'])) {
    if ($_GET['action'] == 'listBusiness') {
        listBusiness();
    }
    elseif ($_GET['action'] == 'business') {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            business();
        }
        else {
            echo 'Erreur : aucun identifiant de billet envoyé';
        }
    }
    // elseif (isset($_GET['id']) && $_GET['id'] > 0) {
    //     business();
    // }
    elseif ($_GET['action'] == 'ajoutCommentaire') {
        
        
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            
            if (!empty($_POST['auteur']) && !empty($_POST['commentaire'])) {
                addCommentaireController($_GET['id'], $_POST['auteur'], $_POST['commentaire']);
            }
            else {
                echo 'Erreur : tous les champs ne sont pas remplis !';
            }
        }
        else {
            echo 'Erreur : aucun identifiant de billet envoyé';
        }
    }
}
else {
    listBusiness();
}


// require('model.php');

// $business = getBusinesss();

// require('view.php');
