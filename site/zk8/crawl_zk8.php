<?php	
	include_once (dirname(__FILE__) . '/simple_html_dom.php');

	$tmp_obj = new CrawZk8();
	$tmp_obj->getInfo();
	/**
	 * http://www.zk8.com.cn/main.php?app=wiki_free_study&id=991&wiki_id=303878 
	 * http://www.zk8.com.cn/modules.php?app=wiki_free_study&id=991&wiki_id=303880
	 * php artisan Crawlangelcrunch
	 * 2013-11-24  by ggg
	 */
	class CrawZk8 {

		/**
		 * 抓取特定项目信息
		 * @param  string $pageUrl 项目详情地址
		 * @return array|boolen  
		 */
		public function getInfo($pageUrl='') {

			$file_name = "./zk8.html";
			$content = file_get_contents($file_name);

			$page_html = str_get_html($content);

			
	      foreach ($page_html->find('.wiki_study_li script ') as $li) { 
	      	
	      	echo "\n -- \n";
	      	echo $this->getScriptStr($li);
	      	echo "\n -- \n";
	      	
          }

		$page_html->clear();

		}
		
/*		
<script>window.document.write(base64decode("JTNDcCUzRCVFNCVCQSVCQSVFNSU4"));</script>
*/
		public function getScriptStr($str) {
	
			preg_match("/base64decode\(\"([^\"]+)\"\)/",$str,$matches);
			if(!empty($matches[1]))
			{
				return urldecode(base64_decode($matches[1]));
//				Log::write(__METHOD__,' empty url ');            
			}
			else
				return false;
			
		}

		public function test() {

			urldecode("hello");

		}
	}