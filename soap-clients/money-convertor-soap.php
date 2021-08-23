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
				$client = new SoapClient('http://172.20.10.4/ConversionDevise?wsdl');

				$montant = (int) $_POST['montant'];

				if ($_GET['devise'] === 'euro') 
				{
					$param = array('prixEnEuro' => $montant);
					$montantConverti = $client->__soapCall('euroToCfa', array($param));

					echo $montant.' EURO = '.$montantConverti->return.' CFA';
				}
				else if ($_GET['devise'] === 'cfa') 
				{
					$param = array('prixEnCfa' => $montant);
					$montantConverti = $client->__soapCall('cfaToEuro', array($param));
					
					echo $montant.' CFA = '.$montantConverti->return.' EURO';
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