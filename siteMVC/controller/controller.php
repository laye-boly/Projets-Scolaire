<?php

require('model/model.php');

function listBusiness()
{
    $businesss = getBusinesss();

    require('view/listeBusinessview.php');
}

function business()
{
    $business = getBusiness($_GET['id']);
    $commentaires = getCommentaires($_GET['id']);
    
	require('view/businessView.php');
}