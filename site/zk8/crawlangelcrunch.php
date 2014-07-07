<?php

$log =null;
$log_config = array('locking' => 1,'buffering' => true, 'lineFormat' =>'%1$s %2$s [%3$s] %8$s->%7$s  %6$s  %4$s');
$log = Log::singleton("file" 
		, $log_file,$log_category
		, $log_config
		,PEAR_LOG_DEBUG);




include_once(dirname(__FILE__).'/../libraries/simple_html_dom.php');

/**
 * http://angelcrunch.com/startup 爬虫
 * php artisan Crawlangelcrunch
 * 2013-11-24  by ggg
 */
class Crawlangelcrunch_Task {

//    private const hDOMAIN_URL = 'http://angelcrunch.com';
    const  _DOMAIN_URL = 'http://www.angelcrunch.com';
    const  _COOK_FILE = '/tmp/cookie_angelcrunch.txt';
    const  _PROJECT_TYPE = 3;

    private static  $_SAVE_FILE_PATH = '/tmp';

    private static $_login_email =  '283923749@qq.com';
    private static $_login_pass = 'SCVP13572468';

    //是否停止抓取
    private $_isStop = false;
    //保存已抓取过的网址列表
    private static $_donePageInfoUrls = array();


    private $_rss_list;
    private $_startup_names = array();
    private $_strong_filters;
    private $_saved_time = null;
    private $_saved_time_path = null;
    private $_last_saved_time = null;

    public function run() {


        self::$_SAVE_FILE_PATH = dirname(__FILE__).'/../../storage/data/crawl';

        if(!file_exists(self::_COOK_FILE) || (time() - filemtime(self::_COOK_FILE) > 60*10))
        {
            Log::write(__METHOD__,"start login");
            $this->login(self::$_login_email,self::$_login_pass);
        }
        // $result = $this->getInfo('http://www.angelcrunch.com/startup/10939');
        // print_r($result);
        // return;

        if(!file_exists(self::_COOK_FILE) || filesize(self::_COOK_FILE) < 10)
        {

            $error_msg = 'cookie file: '.self::_COOK_FILE.' error,may be user  error!';
            Log::write(__METHOD__,$error_msg);
            echo $error_msg;
            return;
        }


/*$info_url = "http://www.angelcrunch.com/startup/6858";
            $info_array    = $this->getInfo($info_url);
var_dump($info_array);
die();
*/


        $page_start = 1;
        $page_end = 10;

        //DEBUG
/*
        $page_start = date('j');
        $page_start = $page_start * 5 +1;
        if($page_start > 143 )
            $page_start = 1;
        $page_end = $page_start + 5;
*/

	Log::write(__METHOD__,"page_start:{$page_start} ,page_end: {$page_end} ");
        for($i = $page_start; $i <= $page_end; $i++)
        {
            $this->getList($i);
            if($this->_isStop)
            {
                Log::write(__METHOD__,"may be end of page ,exit for page {$i}" );
                break;
            }
        }

    }


    public function login($email,$pass){

        $url = self::_DOMAIN_URL.'/home/login';
        $post = array(
            //'type' => 0,
            'http_referer'=> self::_DOMAIN_URL,
            'email' => $email,
            //'password' => $pass,
            'pwdhash' => $pass,
            'autologin' => 'on',
        );

        //$cookie_file = tempnam("/tmp","cookie");//创建临时文件
        $options = array(
          CURLOPT_COOKIEJAR => self::_COOK_FILE 
        ) ;
 
 //curl_setopt($cont,CURLOPT_COOKIEFILE,$cookie_file);//调用已经存在的COOKIE文件

        $result = LibRequest::postContent($url, $post ,  $options);
        return $result;
    }

    /**
     * 抓取每页信息
     * @param  int $pageId  页号
     * @return array|boolen  
     */
    public function getList($pageId){

        //该网站是采用post请求来处理分页
        $post_array = array(
            'p' => intval($pageId),
            'index' => 'AA',
            'regionid' => 'ZZ',
            'industryid' =>'ZZ', 
            'sort' => 'AA',
        );

        $options = array(
          CURLOPT_COOKIEFILE => self::_COOK_FILE 

        );

        $list_url = self::_DOMAIN_URL.'/startup';
	$list_url = $list_url.'?'.http_build_query($post_array);


	Log::write(__METHOD__,$list_url);
        //$content = LibRequest::postContent($list_url,$post_array,$options);
        //$content = LibRequest::postContent($list_url,$post_array,$options);
	$message = null;
        $content = LibRequest::getContent($list_url,$options,$message);
        if(empty($content))
        {
            Log::write(__METHOD__,"empty for ".$pageId);
            return false;
        }

        //DEBUG
        //var_dump($content);
        //die();
  
        $page_html = str_get_html($content);

        foreach ($page_html->find('.porList .list') as $li) {
            
            //  /startup/1091
	//	$info_url = $li->find('.col a', 0)->href;
		$info_url = $li->find('.col a', 0)->getAttribute('onclick');
		if(empty($info_url))
		{
			continue;
		}
		//viewprivilege(6323,'AHAB',0);
		preg_match("/viewprivilege\(([0-9]+)/",$info_url,$matches);
		if(empty($matches[1]))
		{
			Log::write(__METHOD__,' empty url ');            
			continue;
		}

		$info_url = '/startup/'.$matches[1];
		//$info_url = $li->find('.col a', 0)->getAllAttributes();
		$info_name = $li->find('.col a', 0)->innertext;
 
            //跳过已抓取过的页面
            if(isset($this::$_donePageInfoUrls[$info_url]))
            {
                Log::write(__METHOD__,"url {$info_url} is finished ,skip.." );
                //$this->_isStop = true;
                continue;
            }

            Log::write(__METHOD__,"name: {$info_name} ,url: {$info_url}" );
            //项目库里存在，跳过
            $count = ModelProject::countByCondition(array('name'=>$info_name),'');
            if($count > 0) {
                Log::write(__METHOD__,"Mysql countByCondition Error: name existed:$info_name");
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
                Log::write(__METHOD__,"empty getInfo: {$info_url}");
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

    public function getCacheFile($pageUrl){
        return self::$_SAVE_FILE_PATH . '/angel_info_'.md5($pageUrl);
    }
    public function isDownLoad($pageUrl){

        $file_name = self::$_SAVE_FILE_PATH . '/angel_info_'.md5($pageUrl);
        return file_exists($file_name);
    }    

    /**
     * 抓取特定项目信息
     * @param  string $pageUrl 项目详情地址
     * @return array|boolen  
     */
    public function getInfo($pageUrl){

        Log::write(__METHOD__,"pageUrl {$pageUrl}" );

        $file_name = $this->getCacheFile($pageUrl);
        $content = '';
        if(file_exists($file_name))
        {
            Log::write(__METHOD__,"file_exists {$file_name}" );

            $content = file_get_contents($file_name);
        }
        else
        {
/*
        $page_html = new simple_html_dom();
        $page_url = 'http://angelcrunch.com/startup/'.$id;        
        $page_html->load_file($page_url);
        $page_url = 'http://angelcrunch.com/startup/'.$id;
*/

            $options = array(
              CURLOPT_COOKIEFILE => self::_COOK_FILE 
            );

            $message = '';
            $content = LibRequest::getContent($pageUrl,$options,$message);
            Log::write(__METHOD__,"file from {$pageUrl}" );

            if(!empty($content))
                file_put_contents($file_name, $content);
            else
            {
                Log::write(__METHOD__,"[error] empty content" );
                return false;
            }
        }


        $page_html = str_get_html($content);
        //$page_html = file_get_html($pageUrl);
        if(empty($page_html))
        {
            Log::write(__METHOD__,"empty  {$page_html}" );                            
            return false;
        }

        $ar = array();

        $ar['title'] = $page_html->find('.col h3', 0)->innertext;
        $ar['desc'] = $page_html->find('.col .ellipsis', 0)->innertext;
        $ar['分类'] = trim(strip_tags($page_html->find('.col .mt5', 0)->innertext));
        $ar['url'] = $page_html->find('.col .officalurls', 0)->href;
        $ar['来源网站'] = $pageUrl;
        $ar['缓存页面'] = 'http://pre.17startup.com/startup/showpage/angelcrunch/'.urlencode($pageUrl);


        $ar['缩略图'] = $page_html->find('.col .logo', 0)->src;

        foreach ($page_html->find('.investorView dl') as $li) { 
            $tmp_array = array(
             '姓名' => $li->find('.name',0)->innertext,
             '职位' => $li->find('.position',0)->innertext,
             'desc' => $li->find('.summary',0)->innertext,

            );
            $ar['团队成员'][] = $tmp_array;
        }

        $page_html->clear();

        //save to db
        $ar_prj = array();
        $ar_prj['name'] = $ar['title'];
        $ar_prj['url'] = $ar['url'];
        $ar_prj['desc'] = $ar['desc'];
        $ar_prj['type'] = self::_PROJECT_TYPE; 
        $ar_prj['user_id'] = 12125;
        $ar_prj['status'] = -2;
        $ar_prj['created_at'] = time(); 
        unset($ar['desc']);
        $ar_prj['remarks'] = print_r($ar,true);
        return $ar_prj;
    }            


}




