<?php

require 'vendor/autoload.php';

use League\Csv\Reader;
use CalcSdk\CalcSdkClientFactory;
use CalcSdk\Type\Add;
use Phpro\SoapClient\Exception\SoapException;

$calc = CalcSdkClientFactory::factory('http://www.dneonline.com/calculator.asmx?WSDL');
$csv = Reader::createFromPath(__DIR__.'/foo.csv');
$csv->setDelimiter(";");
$csv->setHeaderOffset(0);

foreach ($csv as $record) {
	print_r($record);
	try {
		$val = new Add(
			$record["foo"],
			$record["bar"]
		);
		$res = $calc->add($val);
		echo("result: " . $res->getAddResult() . PHP_EOL);
	} catch (SoapException $e) {
		echo($e->getMessage());
	}
}
