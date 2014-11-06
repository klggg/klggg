<?php
// +----------------------------------------------------------------------
// | Fanwe 方维o2o商业系统
// +----------------------------------------------------------------------
// | Copyright (c) 2011 http://163u.taobao.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: 龙胜网络科技(163u.taobao.com)
// +----------------------------------------------------------------------

//将语言包载入JS
class LangAction extends BaseAction{
	public function js(){
		$str = "var LANG = {";
		foreach($this->lang_pack as $k=>$lang)
		{
			$str .= "\"".$k."\":\"".$lang."\",";
		}
		$str = substr($str,0,-1);
		$str .="};";
		header("Content-Type: text/javascript");
		echo $str;
	}
}
?>