<?php

use App\Command\PadConvertCommand;
use App\Command\TestesContabilidadeCommand;
use Dotenv\Dotenv;
use GetOpt\ArgumentException;
use GetOpt\ArgumentException\Missing;
use GetOpt\GetOpt;
use NunoMaduro\Collision\Provider;

require_once __DIR__.'/vendor/autoload.php';

define('NAME', 'IDDRS');
define('VERSION', '1.0.0');

(new Provider)->register();

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

$getopt = new GetOpt();

$getopt->addCommand(new PadConvertCommand());
$getopt->addCommand(new TestesContabilidadeCommand());

try {
    try {
        $getopt->process();
    } catch (Missing $ex) {
        if(!$getopt->getOption('help')){
            throw $ex;
        }
    }
} catch (ArgumentException $ex) {
    file_put_contents('php://stderr', $ex->getMessage().PHP_EOL);
    echo PHP_EOL, $getopt->getHelpText();
    exit;
}

if($getopt->getOption('version')) {
    echo sprintf('%s: %s'.PHP_EOL, NAME, VERSION);
    exit;
}

$command = $getopt->getCommand();
if(!$command || $getopt->getOption('help')){
    echo $getopt->getHelpText();
    exit;
}

call_user_func($command->getHandler(), $getopt);