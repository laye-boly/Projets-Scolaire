<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Montant converti</title>
</head>
<body>
	<h1>Résultat de la conversion</h1>
	<p>
		<?php
			if (isset($_POST['montant']))
			{
				$TAUX_CONVERSION = 655.957;

				$montant = (int) $_POST['montant'];

				if ($_GET['devise'] === 'euro') 
				{
					$montantConverti = $montant * $TAUX_CONVERSION;
					echo $montant.' EURO = '.$montantConverti.' CFA';
				}
				else if ($_GET['devise'] === 'cfa') 
				{
					$montantConverti = $montant / $TAUX_CONVERSION;
					echo $montant.' CFA = '.$montantConverti.' EURO';
				}
				else
				{
					echo 'Erreur, devise inconnue<br>';
					echo 'Vous pouvez cliquer <a href="money-convertor.html">ici</a> pour rejoindre la page d\'accueil';
				}
			}
			else
			{
				echo 'Erreur, le montant n\'a pas été transmis<br>';
				echo 'Vous pouvez cliquer <a href="money-convertor.html">ici</a> pour rejoindre la page d\'accueil';
			}
		?>
	</p>
</body>
</html>