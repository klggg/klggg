<?php

include_once(dirname(__FILE__).'/simple_html_dom.php');
include_once(dirname(__FILE__).'/LibRequest.php');


class CrawlAnjuke {


  /**
     * 抓取每页信息
     * @param  int $pageId  页号
     * @return array|boolen  
     */
    public function getList($pageId){

        $list_url = 'http://sh.zu.anjuke.com/fangyuan/p'.$pageId;
		
		$options = array();
		$message = null;
        $content = LibRequest::getContent($list_url,$options);
        if(empty($content))
        {
            return false;
        }

        //DEBUG
        //var_dump($content);
        //die();
  
        $page_html = str_get_html($content);

        foreach ($page_html->find('.grid .listitem') as $li) {
            
            //  /startup/1091
            $info_url = $li->find('.container .contentbox a', 0)->href;
            $info_name = $li->find('.container .contentbox a', 0)->innertext;
            if(empty($info_url))
            {
                Log::write(__METHOD__,' .contentbox a ,find empty url ');            
                continue;
            }

            //跳过已抓取过的页面
            if(isset($this::$_donePageInfoUrls[$info_url]))
            {
                Log::write(__METHOD__,"url {$info_url} is finished ,skip.." );
                //$this->_isStop = true;
                continue;
            }

            Log::write(__METHOD__,"name: {$info_name} ,url: {$info_url}" );
            //项目库里存在，跳过
            $count = ModelProject::countByCondition(array('name'=>$info_name));
            if($count > 0) {
                Log::write(__METHOD__,"Mysql Error: name existed:$info_name");
                continue;
            }

            
            //抓取详细信息
            $info_url = self::_DOMAIN_URL.$info_url;

            /*
            if($this->isDownLoad($info_url))
                continue;
            */

            $info_array    = $this->getInfo($info_url);

            if(empty($info_array))
            {
                continue;
            }

            try{
                ModelProject::add($info_array, FALSE);
            }catch(Exception $e) {
                Log::write(__METHOD__,"Mysql Error:$e");
            }       

            sleep(3);

        }
    }

}
