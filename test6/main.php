<?php

require __DIR__.'/vendor/autoload.php';

use WsdlToPhp\PackageBase\AbstractSoapClientBase;
use CalcSdk\ServiceType;
use CalcSdk\StructType;
use League\Csv\Reader;

$options = [
	AbstractSoapClientBase::WSDL_URL => 'http://www.dneonline.com/calculator.asmx?WSDL',
	AbstractSoapClientBase::WSDL_CLASSMAP => CalcSdk\ClassMap::get(),
];

$srv = new ServiceType\Add($options);
$csv = Reader::createFromPath(__DIR__.'/foo.csv');
$csv->setDelimiter(";");
$csv->setHeaderOffset(0);

foreach ($csv as $record) {
	print_r($record);
	try {
		$val = new StructType\Add(
			$record["foo"],
			$record["bar"]
		);
		if ($srv->Add($val) !== false) {
			print_r($srv->getResult());
		} else {
			print_r($srv->getLastError());
		}
	} catch (TypeError $e) {
		echo($e->getMessage());
	}
}
