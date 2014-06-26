<?php
require_once (G_SITE_LIB .'/simple_html_dom.php');

/**
 *cd /media/ggg/bak1/git/github_klggg/site/crawl/protected
 *./yiic zk8 992 1 1
 *tail -f ~/git/github_klggg/site/crawl/protected/runtime/script.log
 *00147vip 人力资源管理（一）（2014年7/10月保过精华版） 
 *   http://www.zk8.com.cn/main.php?app=wiki_free&id=991
 *00341vip 公文写作与处理(2014年7/10月保过精华版)
 *  http://www.zk8.com.cn/main.php?app=wiki_free&id=1068
 *
 *03350vip 社会研究方法(2014年7/10月保过精华版)
 *  http://www.zk8.com.cn/main.php?app=wiki_free&id=1254
 * 
 * 00163vip 管理心理学(2014年7/10月保过精华版)
 * http://www.zk8.com.cn/main.php?app=wiki_free&id=1282
 * 
 * 00312vip 政治学概论(2014年7/10月保过精华版)
 * http://www.zk8.com.cn/main.php?app=wiki_free&id=1311
 * 
 * 03706vip 思想道德修养与法律基础（2014年7/10月保过精华版）
 * http://www.zk8.com.cn/main.php?app=wiki_free&id=993
 * 
 * 03707vip 毛泽东思想、邓小平理论和“三个代表”重要思想概论（2014年7/10月保过精华版）	
 * http://www.zk8.com.cn/modules.php?app=groupbuy_show&id=998
 * 
 *  首页：　http://www.zk8.com.cn/modules.php?app=wiki_free&id=993&page=1
 * 　　　　－＞　http://www.zk8.com.cn/modules.php?app=wiki_free&id=993
 * 　　　　　　　http://www.zk8.com.cn/modules.php?app=wiki_free&id=993
 *            -http://www.zk8.com.cn/modules.php?app=wiki_free&id=991&page=2
 * 
 * 内容页：http://www.zk8.com.cn/main.php?app=wiki_free_study&id=993&wiki_id=322965
 * 　　　　http://www.zk8.com.cn/main.php?app=wiki_free_study&id=993&wiki_id=322969
 *        -http://www.zk8.com.cn/main.php?app=wiki_free_study&id=991&wiki_id=303889
 * 
 * 最终页：http://www.zk8.com.cn/modules.php?app=wiki_free_study&id=993&wiki_id=322965
 * 　　　　http://www.zk8.com.cn/modules.php?app=wiki_free_study&id=993&wiki_id=322969
 * 2013-11-24  by ggg
 * 章节表：　章节名，章节下列表
 * 内容表：　题目，所属章节，所属页号，地址，其他内容
 * 
 * 过程：
 * 取指定页信息
 *    得到章节名，当前页号，取当前文章列表，入库得到待处理表
 * 　  　如取到页号之前已存在，说明已结束
 * 
 * 根据待处理表取得每个题目详细信息，并更新状态为已处理
 * 
 * MySQL Query Error: select WikiId,DATE_FORMAT(NextLearnDate,'%Y-%m-%d') as NextLearnDate from szikao_wiki_list_learn_00000 where LearnUser = 'gggxin' and DATE_FORMAT(NextLearnDate,'%Y%m%d') < DATE_FORMAT(CURDATE(),'%Y%m%d') and ismanage=0 order by NextLearnDate asc limit 1
 * tail -f /media/ggg/bak1/git/github_klggg/site/crawl/protected/runtime/script.log
 */
class Zk8Command extends CConsoleCommand {

//    const  _DOMAIN_URL = 'http://www.zk8.com.cn';
    const  _DOMAIN_URL = 'http://www.zk06.com';
    private static  $_COOK_FILE = '/tmp/cookie_zk8';

    public $savePath = '/tmp';
    
    public $saveSubDir = '';
    
    private  $_login_email =  '';
    private  $_login_pass = '';

    
    public function init()
    {
        $this->savePath = dirname(__FILE__).'/../runtime/crawl/zk8';
		Yii::getLogger()->autoFlush = 10;
		Yii::getLogger()->autoDump = true;
		self::$_COOK_FILE = self::$_COOK_FILE.'_'.$this->_login_email;

    }
    

	public function run($args) {

		Yii::log("start",CLogger::LEVEL_INFO,__METHOD__);

		$this->_login_email = Yii::app()->params['zk8']['login_email'];
		$this->_login_pass = Yii::app()->params['zk8']['_login_pass'];
		
		if(count($args) < 1)
		{
			echo $this->getHelp();
			return false;
		}
		
		
        if(!file_exists(self::$_COOK_FILE) || (time() - filemtime(self::$_COOK_FILE) > 60*10))
        {
			Yii::log("start login",CLogger::LEVEL_INFO,__METHOD__);
            $result = $this->login($this->_login_email,$this->_login_pass);
			Yii::trace("login result: {$result}",__METHOD__);
            
        }

        if(!file_exists(self::$_COOK_FILE) || filesize(self::$_COOK_FILE) < 10)
        {

            $error_msg = 'cookie file: '.self::$_COOK_FILE.' error,may be user  error!';
			Yii::log($error_msg,CLogger::LEVEL_ERROR,__METHOD__);
            echo $error_msg;
            return;
        }

//$this->doTest();
//return;

		//得到课程号
		//http://www.zk8.com.cn/modules.php?app=wiki_free&id=[课程号]
		$courseId = $args[0];
		$start_page = 1;
		if(isset($args[1]))	{
			$start_page = intval($args[1]);
		}
		$end_page = 20;
		if(isset($args[2]))	{
			$end_page = intval($args[2]);
		}

		$this->saveSubDir = $courseId;
		
		
//		$this->doMovePic();
//		return;
		
		
				
		for($i=$start_page ; $i<=$end_page; $i++)
		{
			Yii::trace("getList {$i}",__METHOD__);
			
			if(!$this->getList($i,$courseId))	{
				Yii::log("getList false",CLogger::LEVEL_ERROR,__METHOD__);
				break;
			}
			sleep(1);
		}
		$this->doTasks();
		Yii::log("end",CLogger::LEVEL_INFO,__METHOD__);
	}
	
	/**
	 * 把图片进行归类整理
	 */
	public function doMovePic() {
		
		Yii::log('doMovePic',CLogger::LEVEL_INFO,__METHOD__);

		//读取字段内容
		$curr_model = Zk8Subject::model();
		$records = $curr_model->findAll(array(
			 'condition'=>'status = ? '
			 ,'params' => array(Zk8Subject::STATUS_DONE)
			 ,'order' => 'id asc'
			 ));
		 
		if(empty($records)){
			return false;
		}
		$find_fields = array('resolve','question','answer','hint');
		foreach ( $records as $record ) {
			
			Yii::log("-- id: [{$record['id']}] --",CLogger::LEVEL_INFO,__METHOD__);

			
			foreach ( $find_fields as $tmp_field ) {
			
				Yii::trace('filed:'.$tmp_field,__METHOD__);
			
				if(empty($record[$tmp_field])){
					Yii::log('empty for field:'.$tmp_field,CLogger::LEVEL_WARNING,__METHOD__);
					continue;
				}
				
				//提取图片地址
				$page_html = str_get_html($record[$tmp_field]);
				$img_urls = array();
				foreach ($page_html->find('img') as $tmp_li) {
					$img_file = $tmp_li->attr["src"];
					if(empty($img_file))
					{
						Yii::log('src is empty',CLogger::LEVEL_WARNING,__METHOD__);
						continue;
					}
					Yii::trace('old src:'.$img_file,__METHOD__);
					
					
					
					//移动图片
					$url_pathinfo = pathinfo($img_file);
					$from_path = $this->savePath."/{$record['course_id']}/{$url_pathinfo['extension']}/".substr($url_pathinfo['filename'],0,2);
					$file_relative_path = $url_pathinfo['extension'].'/'.substr($url_pathinfo['filename'],0,1);
					$move_to_path = $this->savePath."/new_ggg/{$record['course_id']}/".$file_relative_path;
					
					Yii::log('basename:'.$url_pathinfo['basename'],CLogger::LEVEL_INFO,__METHOD__);
        			Yii::trace('move_to_path:'.$move_to_path,__METHOD__);
        
			        if (!is_dir($move_to_path) && !mkdir($move_to_path , 0700, true)) {
			            yii::log('mkdir error path: '.$move_to_path,CLogger::LEVEL_ERROR,__METHOD__);
			            return false;
			        }
//			        if(file_exists($from_path.'/'.$img_file)){
//			        	copy($from_path.'/'.$img_file,$move_to_path.'/'.$url_pathinfo['basename']);
						$img_urls[$img_file] = $file_relative_path.'/'.$url_pathinfo['basename'];
//        				Yii::trace('copy to :'.$move_to_path.'/'.$url_pathinfo['basename'],__METHOD__);
//					}
        
		
				}

				if(empty($img_urls))	
					continue;		

				//替换图片地址
				Yii::trace('before content: '.$record[$tmp_field],__METHOD__);
				
				$search_urls = array_keys($img_urls);
				$replace_urls = array_values($img_urls);
				$tmp_str = str_replace($search_urls,$replace_urls,$record[$tmp_field]);	
				$record[$tmp_field] = $tmp_str;
				//保存记录 只需要保存文件名,将来读出后对图片进行替换
				
				Yii::trace('final content: '.$tmp_str,__METHOD__);
				
//				die();
				$record->save();
								 
					
						
			}
		}

	}	
	
	public function doTest(){
		$curr_model = Zk8Subject::model();
		$record = $curr_model->findByPk(427);
		$tmp_url = self::_DOMAIN_URL."/modules.php?app=wiki_free_study&id={$record['course_id']}&wiki_id={$record['subject_id']}";
		Yii::trace("do id:{$record['id']},status:{$record['status']},course_id:{$record['course_id']},subject_id:{$record['subject_id']},question:{$record['question']}",__METHOD__);
	
        $ret_array = $this->getInfo($tmp_url,$record["status"]) ;
        if(empty($ret_array)){
			Yii::log('empty ret_array ',CLogger::LEVEL_WARNING,__METHOD__);
        }
        else{
	 		Yii::trace("ret_array:".print_r($ret_array,true),__METHOD__);
        }
	        			
	}
	
	/**
	 * 执行所有任务
	 */
	public function doTasks() {

		$curr_model = Zk8Subject::model();
		//取待处理记录
		
		$records = $curr_model->findAll(array(
			 'condition'=>'status <> ? '
			 ,'params' => array(Zk8Subject::STATUS_DONE)
			 ,'order' => 'subject_id asc'
			 ));
		 
//		$records = $curr_model->findAllByAttributes(array('status' => Zk8Subject::STATUS_PENDDING));
		if(empty($records)){
			return false;
		}
		foreach ( $records as $record ) {
			Yii::trace("do id:{$record['id']},course_id:{$record['course_id']},subject_id:{$record['subject_id']},question:{$record['question']}",__METHOD__);
	        $tmp_url = self::_DOMAIN_URL."/modules.php?app=wiki_free_study&id={$record['course_id']}&wiki_id={$record['subject_id']}";
	        
	        $record["status"] = Zk8Subject::STATUS_DOING;
	        $record->save();
	        	
	        $ret_array = $this->getInfo($tmp_url,$record["status"]) ;
	        if(empty($ret_array)){
				Yii::log('empty ret_array ',CLogger::LEVEL_WARNING,__METHOD__);
	        	continue;
	        }
	        	
	        $record["question"] = $ret_array["question"];
	        $record["answer"] = isset($ret_array["answer"])?$ret_array["answer"]:""; 
	        $record["hint"] = isset($ret_array["hint"])?$ret_array["hint"]:""; 
	        $record["resolve"] = isset($ret_array["resolve"])?$ret_array["resolve"]:"";
	        $record["status"] = Zk8Subject::STATUS_DONE;
	        $record->save();
	        
		}
		

	}	
	/**
	 * 得到url窜里的参数
	 */
	public function getQueryArray($url) {
		
		 $tmp_url_array = parse_url($url);
		 if(empty($tmp_url_array['query']))
		 {
			Yii::log('parse_url error: '.print_r($tmp_url_array,true),CLogger::LEVEL_WARNING,__METHOD__);
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

		Yii::trace("post:".print_r($post,true),__METHOD__);


        //$cookie_file = tempnam("/tmp","cookie");//创建临时文件
        $options = array(
          CURLOPT_COOKIEJAR => self::$_COOK_FILE 
        ) ;
 
 //curl_setopt($cont,CURLOPT_COOKIEFILE,$cookie_file);//调用已经存在的COOKIE文件
//emailmsg|登录帐号错误，请重试
        $result = LibRequest::postContent($url, $post ,  $options);
        return $result;
    }
    	

    /**
     * 抓取每页信息
     * @param  int $pageId  页号
     * @return array|boolen  
     */
	  public function getList($pageId,$courseId){
		
        Yii::trace('start page:'.$pageId,__METHOD__);
        
        $is_last_page = false;
		$pageId = intval($pageId);
		$params_page = '';
		$pageId >0 &&  $params_page='page='.$pageId ;


        $content = null;

   		$list_url = self::_DOMAIN_URL."/modules.php?app=wiki_free&id={$courseId}&".$params_page;
		$save_file = $this->downFromUrl($list_url,'html');
		Yii::trace("save_file: {$save_file}",__METHOD__);
        $content = file_get_contents($save_file);
         if(empty($save_file) || empty($content))
         {
            yii::log("empty content",CLogger::LEVEL_ERROR,__METHOD__);
            return false;
         } 

        if(strlen($content) < 3000)
        {
            yii::log('content length < 3000 ,content: '.$content,CLogger::LEVEL_ERROR,__METHOD__);
            file_exists($save_file) && unlink($save_file);
        	return false;
        }
		//从当前页提取题目列表
        $page_html = str_get_html($content);
        
        //核对当前页码是否一致，如不一致，说明已到最后一页
//        $curr_page = $page_html->find('.pages_bar .current_page', 0)->innertext;

        $next_page = $this->getNextPageNumb($page_html->find('.pages_bar', 0)->innertext);

        if(empty($next_page) || $pageId >= $next_page)
        {
        	yii::log('pageId > next_page, next_page : '.$next_page ,CLogger::LEVEL_ERROR,__METHOD__);
        	$is_last_page = true;
        }
   
        //得到当前章节名
        $chapter_title = $page_html->find('.wiki_study .liebiao h3', 0)->innertext;
         Yii::trace('chapter_title: '.$chapter_title,__METHOD__);
        
        //得到当前章节下题目列表
        foreach ($page_html->find('.wiki_study .liebiao li a') as $li) {

			$tmp_str = $this->getScriptStr($li);
			if(empty($tmp_str))
			{
				Yii::log('getScriptStr is empty',CLogger::LEVEL_WARNING,__METHOD__);
			}
			
            $info_url = $li->href;	//main.php?app=wiki_free_study&id=993&wiki_id=322966
            $info_title = $this->getScriptStr($li->innertext);
            if(empty($info_url))
            {
                yii::log('contentbox a ,find empty url',CLogger::LEVEL_ERROR,__METHOD__);
                continue;
            }            
            yii::log("url: {$info_url}  title: {$info_title}",CLogger::LEVEL_INFO,__METHOD__);

			//提取 wiki_id
			$tmp_QueryArray = $this->getQueryArray($info_url);
			if (empty ($tmp_QueryArray['wiki_id'])) {
	            yii::log('wiki_id is null',CLogger::LEVEL_WARNING,__METHOD__);
				continue;
			} 
			
			$tmp_reord = array(
				'course_id' => $tmp_QueryArray['id'],
				'subject_id' => $tmp_QueryArray['wiki_id'],
				'from_url' => $info_url,
				'question' => $info_title,
				'page_numb' => $pageId,
				'chapter' => $chapter_title,
				'mark' => $tmp_QueryArray['app'],
			);
			
			$this->addTask($tmp_reord);
        }

  
//        $page_html = str_get_html($content);
        Yii::trace('end',__METHOD__);
		return ($is_last_page != true);
	}
	
    		
	/**
	 * 添加指定记录到任务列表，取得的题目状态为待处理
	 * 
	 */
	public function addTask($record) {

		$record['status'] = Zk8Subject::STATUS_PENDDING;
		$curr_model = Zk8Subject::model();
		$curr_model ->unsetAttributes();
        Yii::trace('record: '.print_r($record,true),__METHOD__);

		if($curr_model-> exists( 'course_id = ? AND subject_id = ?' 
			, array ( $record['course_id'] , $record['subject_id'] ))) {
				
		  yii::log("exists course_id:{$record['course_id']} ,subject_id:{$record['subject_id']}",CLogger::LEVEL_WARNING,__METHOD__);
		  return false;
		}

		$curr_model->attributes = $record;
		$curr_model->setIsNewRecord(true);
		
		if(!$curr_model->insert()){
			Yii::log('insert error',CLogger::LEVEL_WARNING,__METHOD__);
			return false;        
		}
		return $curr_model->primaryKey;
		
	}	

	/**
	 * 抓取特定项目信息
	 * @param  string $pageUrl 项目详情地址
	 * @return array|boolen  
	 */
	public function getInfo($pageUrl,$status ) {

//		$file_name = dirname(__FILE__)."/zk8_modules_detail.html";
		
		$isDelOld = false;
        //已删除状态，重新下载	        
        if(Zk8Subject::STATUS_DELETED == $status){
        	$isDelOld = true;
        	
        }
		$save_file = $this->downFromUrl($pageUrl,'html',$isDelOld);
		
		Yii::trace("save_file: {$save_file}",__METHOD__);
		$content = file_get_contents($save_file);
        if(strlen($content) < 3000)
        {
            yii::log('content length < 3000 ,content: '.$content,CLogger::LEVEL_ERROR,__METHOD__);
            file_exists($save_file) && unlink($save_file);
        	return false;
        }
        
        
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
		
		$ret_array = array();
		
		foreach ($page_html->find('.wiki_study_li script ') as $li) {

			$tmp_str = $this->getScriptStr($li);
			if(empty($tmp_str))
			{
				Yii::log('getScriptStr is empty',CLogger::LEVEL_WARNING,__METHOD__);
			}
			else
			{
				Yii::log('getScriptStr:'.$tmp_str.', postion:'.$tmp_postion,CLogger::LEVEL_INFO,__METHOD__);
				//转换图片路径
				$img_urls = $this->downImageUrls($tmp_str);
				if(!empty($img_urls))
				{
					Yii::trace("find img_urls",__METHOD__);
					$search_urls = array_keys($img_urls);
					$replace_urls = array_values($img_urls);
					$tmp_str = str_replace($search_urls,$replace_urls,$tmp_str);					 
				}
				
				
				//处理解析
//				if('resolve' == $tmp_type_map[$tmp_postion])
//				{
//					$urls = $this->downImageUrls($tmp_str);
//					if(!empty($urls))
//					{
//						$tmp_str = '';
//						foreach ( $urls as $tmp_url) {
//       						$tmp_str.="<p><img src='{$tmp_url}' alt='' /></p>";
//						}
//					}
//				}

				$ret_array[$tmp_type_map[$tmp_postion]] = $tmp_str;
				
			}

			$tmp_postion++;
		}
		
		$page_html->clear();
		return $ret_array;

	}
	
	/**
	 * suffix 下载的文件扩展名
	 * isDelOld 删除原来下载的文件 
	 * saveSubDir 存放子目录
	 * 返回相对定位
	 */
	public function downFromUrl($url,$suffix="",$isDelOld=false,$retRelativePath=false) {
		
        $url_md5 = md5($url);
        $save_path = $this->savePath.'/'.$this->saveSubDir;
        
        //保存文件的相对路径
		$file_relative_path = "";
        if(!empty($suffix))
        {
         	$file_relative_path.='/'.$suffix;
        }
        $file_relative_path.='/'.substr($url_md5,0,1);
        
        
        $tmp_save_path = $save_path.'/'.$file_relative_path;
        
        if (!is_dir($tmp_save_path) && !mkdir($tmp_save_path , 0700, true)) {
            yii::log('mkdir error path: '.$tmp_save_path,CLogger::LEVEL_ERROR,__METHOD__);
            return false;
        }
        
        $file_relative_path.='/'.$url_md5;
        //拼上扩展名
        if(!empty($suffix))
        {
         	$file_relative_path.='.'.$suffix;
        }
        $tmp_save_path_name = $save_path.'/'.$file_relative_path;
        
        if(file_exists($tmp_save_path_name))
        {
 			Yii::trace("file_exists :{$tmp_save_path_name}",__METHOD__);
 			if($isDelOld){
               file_exists($tmp_save_path_name) && unlink($tmp_save_path_name);
 		  	    Yii::log('isDelOld true',CLogger::LEVEL_WARNING,__METHOD__);
 				
 			}
 						
        }else{
        	
	        $options = array(
	          CURLOPT_COOKIEFILE => self::$_COOK_FILE 
	
	        );
	
			$message = null;
			
			Yii::log('url:'.$url,CLogger::LEVEL_INFO,__METHOD__);
			
	        $content = LibRequest::getContent($url,$options,$message);
	        if(empty($content))
	        {
	  			Yii::log('content is empty or < 3000 ,content:'.$content,CLogger::LEVEL_WARNING,__METHOD__);
	             file_exists($tmp_save_path_name) && unlink($tmp_save_path_name);
	             return false;
	        }
	        file_put_contents($tmp_save_path_name, $content);
        }

     
         Yii::trace("file_relative_path :{$file_relative_path}",__METHOD__);
         Yii::trace("save_path_file :{$tmp_save_path_name}",__METHOD__);
        
        if($retRelativePath)
        	return $file_relative_path;
        return $tmp_save_path_name;
        
	}

	/**
	 * 提示图片地址，并下载,为多张png图片
	 * 下载
	 */
	public function downImageUrls($str) {

//	$str = <<<EOF
//<p><img src='getfile.php?f=2dafd2aada4c9455c74e526fa3958820' alt="" /></p>
//<p><br /><img src='getfile.php?f=6c24267d6c4b9e5a2490783e4fdfac52' alt="" />
//	
//EOF;
		Yii::trace("str:{$str}",__METHOD__);

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
				$url_new_str = $this->downFromUrl(self::_DOMAIN_URL.'/'.$url_str,'png',false,true);
				if(!empty($url_str)){
					$url_array[$url_str] = $url_new_str;
				}
				
			}

		}
				
		return $url_array;
				
	}
	public function getScriptStr($str) {

		preg_match("/base64decode\(\"([^\"]+)\"\)/", $str, $matches);
		if (!empty ($matches[1])) {
			return urldecode(base64_decode($matches[1]));
			//				Log::write(__METHOD__,' empty url ');            
		} else
			return false;

	}
	public function getNextPageNumb($str) {
		
		//<a href="javascript:void(0);" "="">下一页</a>
		//<a href="/modules.php?app=wiki_free&id=993&page=2">下一页</a>
		
		Yii::trace("str: {$str}",__METHOD__);
		
		$next_page_url = "";
		preg_match("/\<a[\s]+href=\"([^\"]+)[^\>]+\>下一页/", $str, $matches);
		if (!empty ($matches[1])) {
			$next_page_url = $matches[1];
			//				Log::write(__METHOD__,' empty url ');            
		} 
					
//        $next_page_url = $page_html->find('.pages_bar .endless-pages-found-next-link', 0)->href;
        
		Yii::trace("next_page_url: {$next_page_url}",__METHOD__);

		$queryArray  = $this->getQueryArray($next_page_url);
		if (!isset ($queryArray["page"])) {
			Yii::log('empty page',CLogger::LEVEL_WARNING,__METHOD__);
			return false;
		} else	{
			Yii::log("page: {$queryArray['page']} ",CLogger::LEVEL_INFO,__METHOD__);
			
			return $queryArray["page"];
		}			

	}
	
	public function getHelp() {
        return "zk8 精华版抓取\n ./yiic zk8 课程编号 [star_page] [end_page]\n";
    }
}