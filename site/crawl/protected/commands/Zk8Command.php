<?php
require_once (G_SITE_LIB .'/simple_html_dom.php');

/**
 * http://www.zk8.com.cn/modules.php?app=wiki_free&id=993&page=2
 * http://www.zk8.com.cn/modules.php?app=wiki_free&id=993&page=3
 * http://www.zk8.com.cn/main.php?app=wiki_free_study&id=991&wiki_id=303878 
 * http://www.zk8.com.cn/modules.php?app=wiki_free_study&id=991&wiki_id=303880
 * php artisan Crawlangelcrunch
 * 2013-11-24  by ggg
 */
class Zk8Command extends CConsoleCommand {

    const  _DOMAIN_URL = 'http://www.zk8.com.cn';
    const  _COOK_FILE = '/tmp/cookie_zk8.txt';
    const  _PROJECT_TYPE = 3;

    private static  $_SAVE_FILE_PATH = '/tmp';

    private static $_login_email =  '283923749@qq.com';
    private static $_login_pass = 'SCVP13572468';

    
    public function init()
    {
        $this->_SAVE_FILE_PATH = dirname(__FILE__).'/../runtime/crawl/zk8';
//http://www.zk8.com.cn/getfile.php?f=2dafd2aada4c9455c74e526fa3958820

    }
    

	public function run($args) {

//        if(!file_exists(self::_COOK_FILE) || (time() - filemtime(self::_COOK_FILE) > 60*10))
//        {
//            Log::write(__METHOD__,"start login");
//            $this->login(self::$_login_email,self::$_login_pass);
//        }
//
//        if(!file_exists(self::_COOK_FILE) || filesize(self::_COOK_FILE) < 10)
//        {
//
//            $error_msg = 'cookie file: '.self::_COOK_FILE.' error,may be user  error!';
//            Log::write(__METHOD__,$error_msg);
//            echo $error_msg;
//            return;
//        }
        
		//Yii::getLogger()->autoFlush=1000;
		var_dump($this->getResolve("aaa"));
		
//		$this->getInfo();
//		var_dump("save getLastInsertID:",$this->insert(array()));

return;
		$url = "http://www.zk8.com.cn/modules.php?app=wiki_free_study&id=991&wiki_id=303880";
	
//		print_r($this->getQueryArray($url));

	}
	
	public function getQueryArray($url) {
		
		 $tmp_url_array = parse_url($url);
		 if(empty($tmp_url_array['query']))
		 {
			Yii::log('parse_url error: '.$tmp_url_array,CLogger::LEVEL_WARNING,__METHOD__);
		 	return false;
		 }
		 
		 $tmp_query_array = array();
		 parse_str($tmp_url_array['query'],$tmp_query_array);
		 
		 return $tmp_query_array;
		 

	}	
	
	
    public function login($email,$pass){


        $url = self::_DOMAIN_URL.'/do.php?act=login';
        $post = array(
            'u_email' => $email,
            'u_pws' => $pass,
            'hidden' => '1',
        );

        //$cookie_file = tempnam("/tmp","cookie");//创建临时文件
        $options = array(
          CURLOPT_COOKIEJAR => self::_COOK_FILE 
        ) ;
 
 //curl_setopt($cont,CURLOPT_COOKIEFILE,$cookie_file);//调用已经存在的COOKIE文件
//emailmsg|登录帐号错误，请重试
        $result = LibRequest::postContent($url, $post ,  $options);
        return $result;
    }
    	
	/**
	 * 从页面提取要抓取的内容页URL
	 */
	public function getInfoUrl($fromUrl) {
		
	}

    /**
     * 抓取每页信息
     * @param  int $pageId  页号
     * @return array|boolen  
     */
    public function getList($pageId){
    	
    }
    		
	/**
	 * 添加一条任务
	 */
	public function addTask($fromUrl) {

		$query_array = $this->getQueryArray($fromUrl);
		if(empty($query_array))
		{
			return false;
		}

		$Zk8Subject_model = Zk8Subject::model();
		$dataArray = Array(
			'course_id' => $query_array['id'],
			'subject_id' => $query_array['wiki_id'],
			'status' => 0,
			'from_url' => $fromUrl,
			'mark' => $query_array['app'],
		);		 
		$Zk8Subject_model->attributes = $dataArray;
		$Zk8Subject_model->setIsNewRecord(true);
		
		if(!$Zk8Subject_model->insert()){
			Yii::log('insert error',CLogger::LEVEL_WARNING,__METHOD__);
			return false;        
		}
		return $Zk8Subject_model->primaryKey;
		
	}	

	public function insert($dataArray) {

		$Zk8Subject_model = Zk8Subject::model();
		$dataArray = Array(
			'course_id' => '1',
			'subject_id' => '2',
			'question' => 'Question',
			'answer' => 'Answer',
			'hint' => 'Hint',
			'status' => 0,
			'category' => '3',
			'user' => 'User',
		);		 
		$Zk8Subject_model->attributes = $dataArray;
		$Zk8Subject_model->setIsNewRecord(true);
		
		if(!$Zk8Subject_model->insert()){
			Yii::log('insert error',CLogger::LEVEL_WARNING,__METHOD__);
			return false;        
		}
		return $Zk8Subject_model->primaryKey;
	}
	/**
	 * 抓取特定项目信息
	 * @param  string $pageUrl 项目详情地址
	 * @return array|boolen  
	 */
	public function getInfo($pageUrl = '') {

		$file_name = dirname(__FILE__)."/zk8_sf.html";
		$content = file_get_contents($file_name);

		$page_html = str_get_html($content);

		$tmp_postion = 0; 
		$tmp_type_map = array(
			0 => "question",
			1 => "answer",
			2 => "hint",			
			3 => "resolve",			//解析　
		);
/*		
<p><img src='getfile.php?f=2dafd2aada4c9455c74e526fa3958820' alt="" /></p>
<p><br /><img src='getfile.php?f=6c24267d6c4b9e5a2490783e4fdfac52' alt="" /></p>		
*/
		
		$dataArray = Array(
			'question' => 'Question',
			'answer' => 'Answer',
			'hint' => 'Hint',
			'status' => '1',
		);	
		
		foreach ($page_html->find('.wiki_study_li script ') as $li) {
			

			$tmp_str = $this->getScriptStr($li);
			if(empty($tmp_str))
			{
				Yii::log('getScriptStr is empty',CLogger::LEVEL_WARNING,__METHOD__);
			}
			else
			{
				Yii::log('getScriptStr:'.$tmp_str.', postion:'.$tmp_postion,CLogger::LEVEL_INFO,__METHOD__);
				$dataArray[$tmp_type_map[$tmp_postion]] = $tmp_str;
			}

			$tmp_postion++;
		}
		
//		var_dump($dataArray);

		$page_html->clear();

	}

	public function downFromUrl($url) {

        $save_path_file = self::$_SAVE_FILE_PATH . '/zk8_'.md5($url);

        $options = array(
          CURLOPT_COOKIEFILE => self::_COOK_FILE 

        );

		$message = null;
        $content = LibRequest::getContent($url,$options,$message);
        if(empty($content))
        {
            Log::write(__METHOD__,"empty for ".$url);
            return false;
        }
        file_put_contents($save_path_file, $content);
        
        return $save_path_file;


	}

	/**
	 * 处理解析内容 为多张png图片
	 */
	public function getResolveUrl($str) {

	/*		
	<script>window.document.write(base64decode("JTNDcCUzRCVFNCVCQSVCQSVFNSU4"));</script>
	
<p><img src='getfile.php?f=2dafd2aada4c9455c74e526fa3958820' alt="" /></p>
<p><br /><img src='getfile.php?f=6c24267d6c4b9e5a2490783e4fdfac52' alt="" />
		
	*/
	$str = <<<EOF
<p><img src='getfile.php?f=2dafd2aada4c9455c74e526fa3958820' alt="" /></p>
<p><br /><img src='getfile.php?f=6c24267d6c4b9e5a2490783e4fdfac52' alt="" />
	
EOF;

		$page_html = str_get_html($str);
		$url_array = array();
		
		foreach ($page_html->find('img ') as $li) {
			

			$url_str = $li->attr["src"];
			if(empty($url_str))
			{
				Yii::log('src is empty',CLogger::LEVEL_WARNING,__METHOD__);
			}
			else
			{
				Yii::log('src:'.$url_str,CLogger::LEVEL_INFO,__METHOD__);
				$url_array[] = $url_str;
			}

		}
				
		return $url_array;
//		preg_match("/img\s\=\'([^\']+)/", $str, $matches);
//		if (!empty ($matches[1])) {
//			return $matches[1];
//			//				Log::write(__METHOD__,' empty url ');            
//		} else
//			return false;
				
	}
	public function getScriptStr($str) {

		preg_match("/base64decode\(\"([^\"]+)\"\)/", $str, $matches);
		if (!empty ($matches[1])) {
			return urldecode(base64_decode($matches[1]));
			//				Log::write(__METHOD__,' empty url ');            
		} else
			return false;

	}

	public function test() {

		urldecode("hello");

	}
}