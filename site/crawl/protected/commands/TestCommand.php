<?php
/* 
 * 2013-4-7 13:54 
 * yiic.bat help test
 * yiic.bat test
 */
class TestCommand extends CConsoleCommand
{
    public function init()
    {

    }

    public function run($args)
    {
		echo "hello";
		//Yii::trace('trace',__METHOD__);        
		Yii::log('test',CLogger::LEVEL_TRACE,__METHOD__);        
		Yii::log('test',CLogger::LEVEL_WARNING,__METHOD__);        
		//Yii::log('test',CLogger::LEVEL_ERROR,__METHOD__);        
	
    }

	
	public function getHelp() {
        return "Test jackie\n 参数一\n";
    }
}
