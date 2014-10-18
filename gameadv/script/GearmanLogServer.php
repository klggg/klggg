<?php
require_once 'ini.php';

$logworker = new GearmanLogWorkerTool();
$logworker->setLogger();
//$worker->setLogLevel(Logger::INFO);
//$worker->setLogLevel(Logger::ERR);
$logworker->setLogLevel(Logger::DEBUG);

$logworker->run();

?>