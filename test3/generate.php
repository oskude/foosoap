<?php

require __DIR__.'/vendor/autoload.php';

use Phpro\SoapClient\Console\Application;
use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Console\Output\ConsoleOutput;

$out = new ConsoleOutput();
$app = new Application();
$cnf = new ArrayInput(["--config" => "./config/soap-client.php"]);

$cmd = $app->find("generate:types");
$cmd->run($cnf, $out);

$cmd = $app->find("generate:classmap");
$cmd->run($cnf, $out);

$cmd = $app->find("generate:client");
$cmd->run($cnf, $out);

$cmd = $app->find("generate:clientfactory");
$cmd->run($cnf, $out);
