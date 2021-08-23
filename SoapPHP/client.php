<?php
require 'lib/nusoap.php';

$client = new nusoap_client("http://127.0.0.1:8000/index.php/soap?wsdl"); // Create a instance for nusoap client
$response = $client->call('test', array(["a" => 4, "b" => 2]));

var_dump($response);


?>

	