<?php
session_cache_limiter('private,must-revalidate');
$_G = array();
require_once ("core/config.inc.php");
error_reporting(E_ALL ^ E_NOTICE);
//将mysql加进去
$_G['mysql'] = $mysql;
$_G['nowtime'] = time();

//获取地址的基本信息
$query_string = explode("&",$_SERVER['QUERY_STRING']);
$_G['query_string'] = $query_string;
if (isset($_REQUEST['query_site']) && $_REQUEST['query_site']!=""){
	$_G['query_site'] = $_REQUEST['query_site'];
}elseif (isset($query_string[0])){
	$_G['query_site'] = $query_string[0];
}

//网站基本配置文件
$system = array();
$system_name = array();
$_system = $mysql->db_selects("system");
$system['con_cookie_status'] =0;
foreach ($_system as $key => $value){
	$system[$value['nid']] = $value['value'];
	$system_name[$value['nid']] = $value['name'];
}
$_G['system'] = $system;
$_G['_system'] = $_system;


//获取用户id
if ($_COOKIE["dy_cookie_status"]==1){
	$_G["user_id"] = GetCookies(array("cookie_status"=>1));
}else{
	$_G["user_id"] = GetCookies(array("cookie_status"=>$_G['system']['con_cookie_status']));
}
	

if ($_G["user_id"]!=""){
	require_once ("modules/users/users.class.php");
	$_G["user_result"] = usersClass::GetUsers(array("user_id"=>$_G["user_id"]));

	$_G["user_info"] = usersClass::GetUsersInfo(array("user_id"=>$_G["user_id"]));

	// 短消息
	require_once (ROOT_PATH."modules/message/message.class.php");
	$_G['message_result'] =  messageClass::GetUsersMessage(array("user_id"=>$_G["user_id"]));
	
	
	// 积分
	require_once (ROOT_PATH."modules/credit/credit.class.php");
	$_G['user_credit'] =  creditClass::GetUserCredit(array("user_id"=>$_G["user_id"]));

			
	
}
//联动模块
require_once ("modules/linkages/linkages.class.php");
$result = linkagesClass::GetList(array("limit"=>"all"));
foreach ($result as $key => $value){
	$_G['linkages'][$value['type_nid']][$value['value']] = $value['name'];
	$_G['linkages'][$value['id']] = $value['name'];
	if ($value['type_nid']!=""){
		$_G['_linkages'][$value['type_nid']][$value['id']] = array("name"=>$value['name'],"id"=>$value['id'],"value"=>$value['value']);
	}
}

//地区模块
include_once ("modules/areas/areas.class.php");
$_G['areas'] = areasClass::GetAreas(array("limit"=>"all"));
$_G['areas_city'] = areasClass::GetCityAll(array("areas"=>$_G['areas']));
//如果网站是采用二级地区分区的，则进行相关的配置
//if (isset($_G['system']['con_area_part']) && $_G['system']['con_area_part']==1){
if (!isset($_G['system']['con_area_part'])){
	if ($_COOKIE['set_city_nid']!=""){
		$_G['city_result'] = areasClass::GetOne(array("nid"=>$_COOKIE['set_city_nid']));
	}	
}


//站点模块
include_once ("modules/admin/admin.class.php");
$quer = explode("/",$query_string[0]);	
if (isset($_REQUEST['query_site']) && $_REQUEST['query_site']!=""){
	$site_nid =$_REQUEST['query_site'];
}else{
	$site_nid = isset($quer[0])?$quer[0]:"";
}
$_G["article_id"] = isset($_REQUEST['article_id'])?$_REQUEST['article_id']:"";
$_G["content_page"] = isset($quer[2])?$quer[2]:"";//内容的分页
$_G['site'] = adminClass::GetSiteList(array("limit"=>"all"));
$_G['site_list'] = adminClass::GetSites();
$_G['site_result'] = adminClass::GetSiteOnes(array("nid"=>$site_nid));

//当前节点ID
if ($_G['site_result']==false){
	$_G['site_result']['id'] = 1;
}
/*echo "<script>alert({$_G['site_result']['id']});</script>";*/

//父ID
$_G['site_result']['pid'] = isset( $_G['site_result']['pid'])? $_G['site_result']['pid']:"";

/*echo "<script>alert({$_G['site_result']['pid']});</script>";*/

//获得子站点的信息
foreach ($_G['site'] as $key => $value){
//	if ($value['pid'] == $_G['site_result']['id']){
//		if ($value['status']==1){
//		$_G['site_sub_list'][] = $value;//子站点列表
//		}
//	}

	if ($value['pid'] == $_G['site_result']['id']){
		if ($value['status']==1){
			$_G['site_sub_list'][] = $value;//子站点列表
		}
	}
	
	if ($value['pid'] == 1){
		if ($value['status']==1){
			$_G['site_sub_list_1'][] = $value;//子站点列表
		}
	}
	
	if ($value['pid'] == 2){
		if ($value['status']==1){
			$_G['site_sub_list_2'][] = $value;//子站点列表
		}
	}
	
	if ($value['pid'] == 3){
		if ($value['status']==1){
			$_G['site_sub_list_3'][] = $value;//子站点列表
		}
	}
	
	if ($value['pid'] == 4){
		if ($value['status']==1){
			$_G['site_sub_list_4'][] = $value;//子站点列表
		}
	}
	
	if ($value['pid'] == 41){
		if ($value['status']==1){
			$_G['site_sub_list_41'][] = $value;//子站点列表
		}
	}
	
	if ($value['pid'] == 50){
		if ($value['status']==1){
			$_G['site_sub_list_50'][] = $value;//工具箱
		}
	}
	
	if ($value['id'] == $_G['site_result']['pid']){
		$_G['site_presult'] = $value;//父站点
	}
	
	if ($value['pid'] == $_G['site_result']['pid']){
		if ($value['status']==1){
			$_G['site_brother_list'][] = $value;//同级站点列表
		}
	}
	
	if ($value['pid'] == 129){
		if ($value['status']==1){
			$_G['site_sub_list_129'][] = $value;//关于我们
		}
	}
	
	if ($value['pid'] == 164){
		if ($value['status']==1){
			$_G['site_sub_list_164'][] = $value;//新闻中心
		}
	}
	
	if ($value['pid'] == 172){
		if ($value['status']==1){
			$_G['site_sub_list_172'][] = $value;//产品服务
		}
	}
	
	if ($value['pid'] == 184){
		if ($value['status']==1){
			$_G['site_sub_list_184'][] = $value;//合同文本
		}
	}
}

$_G['module'] = adminClass::GetModuleList(array("limit"=>"all","type"=>"all"));
$_G['module']['ucenter_status']=1;
foreach ($_G['module'] as $key => $value){
	$_G['_module'][$value['nid']] = $value['name'];
	if ($value['nid']=="ucenter" && $value['status']==1){
		$_G['module']['ucenter_status'] = 1;
	}
}
if ($_G['module']['ucenter_status']==1){

	require_once (ROOT_PATH."modules/ucenter/ucenter.class.php");
}

//积分模块
require_once (ROOT_PATH."modules/credit/credit.class.php");
$_G['credit']['class'] = creditClass::GetClassList(array("limit"=>"all"));
foreach ($_G['credit']['class'] as $key => $value){
	$_G['credit']['_class'][$value['id']] = $value['name'];
}
$_G['credit']['rank'] = creditClass::GetRankList(array("limit"=>"all"));

//上传图片的配置
$_G['upimg']['cut_status'] = 0;
$_G['upimg']['user_id'] = empty($_G['user_id'])?0:$_G['user_id'];
$_G['upimg']['cut_type'] = 2;
$_G['upimg']['cut_width'] = isset($_G['system']['con_fujian_imgwidth'])?$_G['system']['con_fujian_imgwidth']:"";
$_G['upimg']['cut_height'] = isset($_G['system']['con_fujian_imgheight'])?$_G['system']['con_fujian_imgheight']:"";
//$_G['upimg']['file_dir'] = "data/aa/";
$_G['upimg']['file_size'] = 1000;
$_G['upimg']['mask_status'] = isset($_G['system']['con_watermark_status'])?$_G['system']['con_watermark_status']:"";
$_G['upimg']['mask_position'] = isset($_G['system']['con_watermark_position'])?$_G['system']['con_watermark_position']:"";
if (isset($_G['system']['con_watermark_type']) && $_G['system']['con_watermark_type']==1){
	$_G['upimg']['mask_word'] =isset($_G['system']['con_watermark_word'])?$_G['system']['con_watermark_word']:"";
	$_G['upimg']['mask_font'] = "3";
	//$_G['upimg']['mask_size'] = $_G['system']['con_watermark_font'];
	$_G['upimg']['mask_color'] = isset($_G['system']['con_watermark_color'])?$_G['system']['con_watermark_color']:"";
}else{
	$_G['upimg']['mask_img'] = isset($_G['system']['con_watermark_file'])?$_G['system']['con_watermark_file']:"";
	if ($_G['upimg']['mask_img']!=""){
		$result = $upload->GetOne(array("id"=>$_G['system']['con_watermark_file']));
		if ($result!=false){
		$_G['upimg']['mask_img'] = $result['fileurl'];
		}
	}
}


//更新文件
if(file_exists("update.php")){
	include_once("update.php");
}



//更新文件
if(file_exists($db_config['webname'].".php")){
	require_once($db_config['webname'].".php");
}



//模块，分页，每页显示条数
$_G['page'] = intval(isset($_REQUEST['page'])?$_REQUEST['page']:1);//分页
$_G['epage'] = isset($_REQUEST['epage'])?$_REQUEST['epage']:10;//分页的每一页

$_G['nowurl'] = "http://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
$_G['url_now'] = $_SERVER['REQUEST_URI'];
if ($_SERVER['REQUEST_URI'] != "/index.php?user&q=login" && $_SERVER['REQUEST_URI'] != "/index.php?user&q=logout&type=index"  ){
$_G['pre_url'] = substr($_SERVER['REQUEST_URI'],strripos($_SERVER['REQUEST_URI'],'url')+4,strlen($_SERVER['REQUEST_URI']));
}
else{
$_G['pre_url'] = "/?user";
}



//模板选择
$con_template = "themes/";
$con_template .= empty($system['con_template'])?"default":$system['con_template'];
$template_error = false;
if (!file_exists($con_template)){
	$template_error = true;
	$con_template = "themes/default";
	$magic->template_error = $template_error;
}
$magic->template_dir = $con_template;
//$magic->force_compile = true;
$_G['tpldir'] = "/".$con_template;
$magic->assign("tpldir",$_G['tpldir']);
$magic->assign("tempdir",$_G['tpldir']);//图片地址


$magic->assign("_G",$_G);
//管理地址
if (isset($_G['system']['con_houtai']) && $_G['system']['con_houtai']!=""){
	$admin_name = $_G['system']['con_houtai'];
}else{
	$admin_name = "admin";
}
//var_dump($_G['query_site']);
//var_dump($admin_name);
//die();

if ($_G['query_site'] == $admin_name ){

	include_once (ROOT_PATH."/modules/admin/index.php");exit;
}

//清空缓存
elseif ($_G['query_site'] == "clear" ){
	DelFile("data/compile");
	echo "<script>location.href='/'</script>";

}

//清空缓存
elseif ($_G['query_site'] == "vinswfupload" ){
	include_once ("plugins/vinswfupload/index.php");exit;

}



//用户中心
elseif ($_G['query_site'] == "user" ){

	require_once ("modules/member/index.php");exit;
}
//用户中心
elseif ($_G['query_site'] == "plugins" ){
	require_once ("plugins/index.php");exit;
}

//用户中心
elseif ($_G['query_site'] == "home" ){
	$user_id = $_REQUEST['user_id'];
	if ($user_id==""){
		$user_id = $_G['user_id'];
	}
	$_G['article_id'] = $user_id;
	$magic->assign("_G",$_G);
	//usersClass::AddVisit(array("user_id"=>$user_id,"visit_userid"=>$_G['user_id']));
	if ($home_dir!=""){
		$magic->template_dir =$home_dir;
		$magic->assign("tpldir","/".$home_dir);
		$magic->display($home_template);
	}else{
		$magic->display("home.html");
	}
	exit;
}

else{	
		/**
		* 关闭网站
		**/
		if ($_G['system']['con_webopen']==0){
			die($_G['system']['con_closemsg']);
		}
		
		//首页
		elseif ($_G['query_site']==""){
			$template = "index.html";
		}
		
		//其他
		else{
			//城市切换
			if ($_G['query_site'] == "city" ){
				$nid = $_REQUEST['nid'];
				setcookie("set_city_nid",$nid,time()+3600*24*30);
				$_G['city_result'] = areasClass::GetOne(array("nid"=>$nid));
				$template = "index.html";
			}
			//错误页面
			elseif (!IsExiest($_G['site_result']['nid'])){
				$_G['msg'] = array("页面不存在","","");
				$template = "error.html";
			}
			
			//跳转地址
			elseif ($_G['site_result']["type"]=="url"){
				echo "<script>location.href='{$_G['site_result']['value']}'</script>";
				exit;
			}
			
			//其他
			else{
				if ($_G['site_result']['type']=="page"){
					require_once(ROOT_PATH."modules/articles/articles.class.php");
					$_G['page_result'] = articlesClass::GetPageOne(array("id"=>$_G['site_result']['value']));
					
				}
				//获得站点和文章的信息
				$_REQUEST['page'] = isset($_REQUEST['page'])?$_REQUEST['page']:"";
				
				if (IsExiest($_G['article_id'])!=false){
					if ($_G['site_result']['type']=="article"){
						require_once(ROOT_PATH."modules/articles/articles.class.php");
						$_G['articles_result'] = articlesClass::GetOne(array("id"=>$_G['article_id'],"hits_status"=>1));
						//print_r($_G['articles_result']);
					}
					$template = $_G['site_result']["content_tpl"];
				}elseif (IsExiest($_REQUEST['page'])!=false || $_REQUEST['nid']!=""){
					$template = $_G['site_result']["list_tpl"];
				
				}else{
					$template = $_G['site_result']["index_tpl"];
				}
			}
			
		}
		

		$magic->assign("_G",$_G);
		$magic->display($template);
		mysql_close();
		exit;
		
		
		
		
}

?>