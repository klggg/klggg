<?php

include_once(dirname(__FILE__).'/simple_html_dom.php');
include_once(dirname(__FILE__).'/LibRequest.php');


class CrawlAnjuke {


  /**
     * ץȡÿҳ��Ϣ
     * @param  int $pageId  ҳ��
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

            //������ץȡ����ҳ��
            if(isset($this::$_donePageInfoUrls[$info_url]))
            {
                Log::write(__METHOD__,"url {$info_url} is finished ,skip.." );
                //$this->_isStop = true;
                continue;
            }

            Log::write(__METHOD__,"name: {$info_name} ,url: {$info_url}" );
            //��Ŀ������ڣ�����
            $count = ModelProject::countByCondition(array('name'=>$info_name));
            if($count > 0) {
                Log::write(__METHOD__,"Mysql Error: name existed:$info_name");
                continue;
            }

            
            //ץȡ��ϸ��Ϣ
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
