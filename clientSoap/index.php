<?php 

$soapClient = new SoapClient('http://127.0.0.1:8000/index.php/soap?wsdl');
var_dump($soapClient);
$result = $soapClient->__call('edit', ["id" => 7, "status" => 2, "emailUser" => "bhdbdsb", "emailUserr" => "bhdbdsb"]);

var_dump($result);

