<?php

require __DIR__.'/vendor/autoload.php';

use WsdlToPhp\PackageGenerator\ConfigurationReader\GeneratorOptions;
use WsdlToPhp\PackageGenerator\Generator\Generator;

$options = GeneratorOptions::instance();
$options
	->setOrigin('http://www.dneonline.com/calculator.asmx?WSDL')
	->setDestination('./CalcSdk')
	->setComposerName('foo/calcsdk')
	->setNamespace('CalcSdk')
;
$generator = new Generator($options);
$generator->generatePackage();
