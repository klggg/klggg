<?php
	date_default_timezone_set('PRC');
	require 'vendor/autoload.php';

/*
	$log = new Monolog\Logger('name');
	$log->pushHandler(new Monolog\Handler\StreamHandler('app.log', Monolog\Logger::WARNING));

	$log->addWarning('Foo',array('a','b'));
	$log->addError('Bar');

*/

$conf = array('locking' => 1);
$log = Log::singleton("file" , './pear.log','DEMO',$conf,PEAR_LOG_INFO);  //PEAR_LOG_DEBUG
$log->debug("check it out");
$log->warning("you have a emergency");
$log->err("something terrible happened");
$log->info("再见");



$parser = new Console_CommandLine();
$parser->description = 'A fantastic command line program that does nothing.';
$parser->version = '1.5.0';
$parser->addOption('filename', array(
    'short_name'  => '-f',
    'long_name'   => '--file',
    'description' => 'write report to FILE',
    'help_name'   => 'FILE',
    'action'      => 'StoreString'
));
$parser->addOption('quiet', array(
    'short_name'  => '-q',
    'long_name'   => '--quiet',
    'description' => "don't print status messages to stdout",
    'action'      => 'StoreTrue'
));
try {
    $result = $parser->parse();
    // do something with the result object
    print_r($result->options);
    print_r($result->args);
} catch (Exception $exc) {
    //$parser->displayError($exc->getMessage());
	var_dump($exc->getMessage());
}


