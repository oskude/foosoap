<?php

require __DIR__.'/vendor/autoload.php';

use WsdlToPhp\PackageBase\AbstractSoapClientBase;
use CalcSdk\ServiceType;
use CalcSdk\StructType;

$options = [
	AbstractSoapClientBase::WSDL_URL => 'http://www.dneonline.com/calculator.asmx?WSDL',
	AbstractSoapClientBase::WSDL_CLASSMAP => CalcSdk\ClassMap::get(),
];

$srv = new ServiceType\Add($options);
$val = new StructType\Add(1,2);

if ($srv->Add($val) !== false) {
	print_r($srv->getResult());
} else {
	print_r($srv->getLastError());
}
