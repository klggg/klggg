<?php
/* 
 * 2014/1/1 20:09 ggg
 */

require_once(G_SITE_LIB.'/simple_html_dom.php');
class AnjukeCommand extends CConsoleCommand
{
    public $savePath = '';

    public function init()
    {
        $this->savePath = dirname(__FILE__).'/../runtime/crawl/anjuke';

    }

    public function run($args)
    {
		//Yii::trace('trace',__METHOD__);        
		//Yii::log('test',CLogger::LEVEL_TRACE,__METHOD__);        
		//Yii::log('test',CLogger::LEVEL_WARNING,__METHOD__);        
		//Yii::log('test',CLogger::LEVEL_ERROR,__METHOD__);        
		// $this->getList(1);
        Yii::getLogger()->autoFlush=1000;
        $page_count = $this->getPageCount();
        // $page_count = 2;
        for($page_i=1; $page_i <= $page_count; $page_i++)
        {
            $this->getList($page_i);
        }
    }


    public function getPageCount(){

        $list_url = 'http://sh.zu.anjuke.com/fangyuan/';
        Yii::trace("LibRequest getContent url: {$list_url}",__METHOD__);

        $options = array();
        $message = null;
        $content = LibRequest::getContent($list_url,$options,$message);
        if(empty($content))
        {
            yii::log('no content',CLogger::LEVEL_ERROR,__METHOD__);
            return false;
        }

        Yii::trace("str_get_html",__METHOD__);

        $page_html = str_get_html($content);

        $record_count = intval($page_html->find('.main_content .content_l .PL_1 em', 0)->innertext);

        $page_size = 24;
        $page_count = ceil($record_count /  $page_size);

        yii::log("record_count: {$record_count}  page_count: {$page_count}",CLogger::LEVEL_INFO,__METHOD__);

        return $page_count;

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


        $save_path = $this->savePath.'/list/'.date('Y-m-d');
        if (!is_dir($save_path) && !mkdir($save_path , 0700, true)) {
            yii::log('mkdir error path: '.$save_path,CLogger::LEVEL_ERROR,__METHOD__);
            return false;
        }

        $content = null;
        $save_file = $save_path . '/'.$pageId.'.html';

        if(file_exists($save_file))
        {
            Yii::trace("file_get_contents: {$save_file}",__METHOD__);
            $content = file_get_contents($save_file);
        }
        else
        {
    		$list_url = 'http://sh.zu.anjuke.com/fangyuan/'.$params_page;
            Yii::trace("LibRequest getContent url: {$list_url}",__METHOD__);

    		$options = array();
    		$message = null;
            $content = LibRequest::getContent($list_url,$options,$message);
            if(empty($content))
            {
                yii::log('no content',CLogger::LEVEL_ERROR,__METHOD__);
                return false;
            }
            file_put_contents($save_file, $content);
            sleep(1);
         }

         if(empty($content))
         {
            yii::log("empty content",CLogger::LEVEL_WARNING,__METHOD__);
            continue;
         } 

         Yii::trace("str_get_html",__METHOD__);

        $page_html = str_get_html($content);
        foreach ($page_html->find('.plate .dl_list_house') as $li) {

            $info_url = $li->find('.dd_info a', 0)->href;
            $info_name = $li->find('.dd_info a', 0)->innertext;
            if(empty($info_url))
            {
                yii::log('contentbox a ,find empty url',CLogger::LEVEL_ERROR,__METHOD__);
                continue;
            }            
            yii::log("url: {$info_url}  title: {$info_name}",CLogger::LEVEL_INFO,__METHOD__);

            $this->getInfo($info_url);
        }

  
//        $page_html = str_get_html($content);
        Yii::trace('end',__METHOD__);

	}
    /**
     * 取得详细信息
     * @param  string $infoUrl http://sh.zu.anjuke.com/fangyuan/22225714
     * @return [type]     [description]
     */
    public function getInfo($infoUrl){

        Yii::trace('start',__METHOD__);
        $hash_file = md5($infoUrl);

        $save_path = $this->savePath.'/info/'.date('Y-m-d').'/'.substr($hash_file, 0,2);
        if (!is_dir($save_path) && !mkdir($save_path , 0700, true)) {
            yii::log('mkdir error path: '.$save_path,CLogger::LEVEL_ERROR,__METHOD__);
            return false;
        }


        $save_file = $save_path . '/'.$hash_file.'.html';

        if(file_exists($save_file))
        {
            Yii::trace("file_get_contents: {$save_file}",__METHOD__);
            $content = file_get_contents($save_file);
        }
        else
        {
            Yii::trace("LibRequest getContent url: {$infoUrl}",__METHOD__);

            $options = array();
            $message = null;
            $content = LibRequest::getContent($infoUrl,$options,$message);
            if(empty($content))
            {
                yii::log('no content',CLogger::LEVEL_ERROR,__METHOD__);
                return false;
            }
            file_put_contents($save_file, $content);
         }

        Yii::trace('end',__METHOD__);


    }    
	
	public function getHelp() {
        return "Test \n 参数一\n";
    }
}
