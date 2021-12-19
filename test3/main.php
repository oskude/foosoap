<?php

require __DIR__.'/vendor/autoload.php';

use CalcSdk\CalcSdkClientFactory;
use CalcSdk\Type\Add;
use Phpro\SoapClient\Exception\SoapException;

$calc = CalcSdkClientFactory::factory('http://www.dneonline.com/calculator.asmx?WSDL');

try {
	$res = $calc->add(new Add(1, 2));
	echo($res->getAddResult() . "\n");
} catch (SoapException $e) {
	echo($e->getMessage());
}
