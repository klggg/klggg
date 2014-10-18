<?php
require_once 'ini.php';

$worker = new GearmanWorkerTool();
$worker->setLogger();
//$worker->setLogLevel(Logger::INFO);
//$worker->setLogLevel(Logger::ERR);
$worker->setLogLevel(Logger::DEBUG);

$worker->run();

?>