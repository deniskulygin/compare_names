<?php

require_once '../vendor/autoload.php';

use src\Logger\FileLogger;
use src\Kernel;

$kernel = new Kernel;

$logger = new FileLogger();

$namesList = $kernel->getFileNamesList(__DIR__ .  getenv('fileNamesList'));

$namesFolder = $kernel->getRootFolderPathsList(__DIR__ . getenv('rootFolderPathsList'));

$result = $kernel->Compare($namesFolder, $namesList);

$logger->log('test');

foreach($result as $key => $v)
{
    echo "{$key} {$v}" . PHP_EOL;
}
