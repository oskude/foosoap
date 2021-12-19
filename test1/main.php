<?php

$uri = "http://www.dneonline.com/calculator.asmx?WSDL";
$soap = new SoapClient($uri);

print_r($soap->__getFunctions());
print_r($soap->__getTypes());

try {
	$res = $soap->Add([
		"intA" => 1,
		"intB" => 2,
	]);
	print_r($res);
} catch (SoapFault $e) {
	echo($e->faultstring."\n");
}
