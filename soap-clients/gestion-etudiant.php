<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Gestion des étudiants</title>
</head>
<body>
	<h1>Gestion des étudiants</h1>
	<form method="post">
		<fieldset>
			<legend>Ajout d'un étudiant</legend>
			<label>Prénom</label>
			<input type="text" name="prenom">
			<label>Nom</label>
			<input type="text" name="nom">
			<input type="submit" value="Ajouter">
		</fieldset>
	</form>
	<h1>Liste des étudiants</h1>
	<?php
		$client = new SoapClient('http://localhost:1712/EtudiantManager?wsdl');

		if (isset($_POST['prenom'], $_POST['nom'])) 
		{
			$params = array(
				'arg0' => $_POST['nom'],
				'arg1' => $_POST['prenom']
			);

			$reponse = $client->__soapCall('ajouterEtudiant', array($params));
		}

		$reponse = $client->__soapCall('listerEtudiant', array());

		if (is_array($reponse->return)) 
		{?>
			<table border="1" cellspacing="0" cellpadding="3">
				<tr>
					<th>Prénom</th>
					<th>Nom</th>
				</tr><?php 
				foreach ($reponse->return as $etudiant) 
				{?>
					<tr>
						<td><?= $etudiant->prenom ?></td>
						<td><?= $etudiant->nom ?></td>
					</tr><?php
				}?>
			</table><?php
		}
		else
		{
			echo 'Aucune réponse n\'a été envoyée';
		}
	?>
</body>
</html>