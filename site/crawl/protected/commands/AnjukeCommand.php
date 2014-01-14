<?php
/* 
 * 2014/1/1 20:09 ggg
 */
class AnjukeCommand extends CConsoleCommand
{
    public $savePath = '';

    public function init()
    {
        $this->savePath = dirname(__FILE__).'/../runtime/crawl/anjuke';

    }

    public function run($args)
    {
		echo "hello1";
		//Yii::trace('trace',__METHOD__);        
		//Yii::log('test',CLogger::LEVEL_TRACE,__METHOD__);        
		//Yii::log('test',CLogger::LEVEL_WARNING,__METHOD__);        
		//Yii::log('test',CLogger::LEVEL_ERROR,__METHOD__);        
		$this->getList(1);
    }

    /**
     * 抓取每页信息
     * @param  int $pageId  页号
     * @return array|boolen  
     */
    public function getList($pageId){
		
        Yii::trace('start',__METHOD__);
		$pageId = intval($pageId);
		$params_page = '';
		$pageId >1 &&  $params_page='p'.$pageId ;
		//http://sh.zu.anjuke.com/fangyuan/#filtersort
		//http://sh.zu.anjuke.com/fangyuan/p2/#filtersort
		$list_url = 'http://sh.zu.anjuke.com/fangyuan/'.$params_page;

/*
		$options = array();
		$message = null;
        $content = LibRequest::getContent($list_url,$options,$message);
        if(empty($content))
        {
            yii::log('no content',CLogger::LEVEL_ERROR,__METHOD__);
            return false;
        }
*/
        $save_path = $this->savePath.'/list/'.date('Y-m-d');
        if (!mkdir($save_path , 0, true)) {
            yii::log('mkdir error path: '.$save_path,CLogger::LEVEL_ERROR,__METHOD__);
            return false;
        }

        $save_file = $save_path . '/'.$pageId.'.html';
        file_put_contents($save_file, $content);

//var_dump($content);
  
//        $page_html = str_get_html($content);
        Yii::trace('end',__METHOD__);

	}
    /**
     * 取得详细信息
     * @param  int $id 
     * @return [type]     [description]
     */
    public function getInfo($id){

        $save_path = $this->savePath.'/info/'.date('Y-m-d');
        if (!mkdir($save_path , 0, true)) {
            yii::log('mkdir error path: '.$save_path,CLogger::LEVEL_ERROR,__METHOD__);
            return false;
        }

        $save_file = $save_path . '/'.$pageId.'.html';
        file_put_contents($save_file, $content);


    }    
	
	public function getHelp() {
        return "Test \n 参数一\n";
    }
}
