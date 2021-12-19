<?php

require 'vendor/autoload.php';

use League\Csv\Reader;

$csv = Reader::createFromPath(__DIR__.'/foo.csv');
$csv->setDelimiter(";");
$csv->setHeaderOffset(0);

foreach ($csv as $record) {
	print_r($record);
}
