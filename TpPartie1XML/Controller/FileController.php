<?php 
	session_start();
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
	
		
		if (isset($_FILES['monfichier']) AND $_FILES['monfichier']['error'] == 0)
		{
			

		        // On vérifie si la taille du fichier ne dépasse pas 10Mo autorisé par PHP
		        if ($_FILES['monfichier']['size'] <= 1000000)
		        {

		                // Testons si l'extension est autorisée
		                $infosfichier = pathinfo($_FILES['monfichier']['name']);
		                $extension_upload = $infosfichier['extension'];
		                if ($extension_upload == "xml")
		                {
		                	// Nous permet d'éviter que deux fichiers uploader aie le même nom
		                	$date = new DateTime();
						    $timestamp = $date->getTimestamp();
						    $nomFichier = hash("sha256", $timestamp.'');
		                        // On peut valider le fichier et le stocker définitivement
		                    move_uploaded_file($_FILES['monfichier']['tmp_name'], '../restaurants_uploads/' . $nomFichier);
		                        echo "L'envoi a bien été effectué !";
		                                  		var_dump("move");
		

							header("Location: ../index.php?action=merci");


		                }else{

		                	
							header("Location: ../index.php?erreur=er&action=dashbord");

		                }
		        }
		}else{
			$_SESSION["erreur"] = "erreur";
			header("Location: ../index.php?erreur=er&action=dashbord");
		}

		
	}