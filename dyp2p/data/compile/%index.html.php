<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
 <title><? if (!isset($this->magic_vars['_G']['articles']['name'])) $this->magic_vars['_G']['articles']['name']=''; ;if (  $this->magic_vars['_G']['articles']['name']!=""): ?><? if (!isset($this->magic_vars['_G']['articles']['name'])) $this->magic_vars['_G']['articles']['name'] = ''; echo $this->magic_vars['_G']['articles']['name']; ?> | <? endif; ?><? if (!isset($this->magic_vars['_G']['articles_result']['name'])) $this->magic_vars['_G']['articles_result']['name']=''; ;if (  $this->magic_vars['_G']['articles_result']['name']!=""): ?><? if (!isset($this->magic_vars['_G']['articles_result']['name'])) $this->magic_vars['_G']['articles_result']['name'] = ''; echo $this->magic_vars['_G']['articles_result']['name']; ?> | <? endif; ?><? if (!isset($this->magic_vars['_G']['site_result']['name'])) $this->magic_vars['_G']['site_result']['name']=''; ;if (  $this->magic_vars['_G']['site_result']['name']!=""): ?><? if (!isset($this->magic_vars['_G']['site_result']['name'])) $this->magic_vars['_G']['site_result']['name'] = ''; echo $this->magic_vars['_G']['site_result']['name']; ?> | <? endif; ?><? if (!isset($this->magic_vars['_G']['system']['con_webname'])) $this->magic_vars['_G']['system']['con_webname'] = ''; echo $this->magic_vars['_G']['system']['con_webname']; ?></title>
 <meta name="description" content="<? if (!isset($this->magic_vars['_G']['articles']['contents'])) $this->magic_vars['_G']['articles']['contents']=''; ;if (  $this->magic_vars['_G']['articles']['contents']!=""): ?><? if (!isset($this->magic_vars['_G']['articles']['contents'])) $this->magic_vars['_G']['articles']['contents'] = '';$_tmp = $this->magic_vars['_G']['articles']['contents'];$_tmp = $this->magic_modifier("html_format",$_tmp,"");$_tmp = $this->magic_modifier("truncate",$_tmp,"60");echo $_tmp;unset($_tmp); ?><? if (!isset($this->magic_vars['_G']['site_result']['description'])) $this->magic_vars['_G']['site_result']['description']=''; ;elseif (  $this->magic_vars['_G']['site_result']['description']!=""): ?><? if (!isset($this->magic_vars['_G']['site_result']['description'])) $this->magic_vars['_G']['site_result']['description'] = ''; echo $this->magic_vars['_G']['site_result']['description']; ?><? else: ?><? if (!isset($this->magic_vars['_G']['system']['con_description'])) $this->magic_vars['_G']['system']['con_description'] = ''; echo $this->magic_vars['_G']['system']['con_description']; ?><? endif; ?>" />
    <meta name="keywords" content="<? if (!isset($this->magic_vars['_G']['articles']['tags'])) $this->magic_vars['_G']['articles']['tags']=''; ;if (  $this->magic_vars['_G']['articles']['tags']!=""): ?><? if (!isset($this->magic_vars['_G']['articles']['tags'])) $this->magic_vars['_G']['articles']['tags'] = ''; echo $this->magic_vars['_G']['articles']['tags']; ?><? if (!isset($this->magic_vars['_G']['site_result']['keywords'])) $this->magic_vars['_G']['site_result']['keywords']=''; ;elseif (  $this->magic_vars['_G']['site_result']['keywords']!=""): ?><? if (!isset($this->magic_vars['_G']['site_result']['keywords'])) $this->magic_vars['_G']['site_result']['keywords'] = ''; echo $this->magic_vars['_G']['site_result']['keywords']; ?><? else: ?><? if (!isset($this->magic_vars['_G']['system']['con_keywords'])) $this->magic_vars['_G']['system']['con_keywords'] = ''; echo $this->magic_vars['_G']['system']['con_keywords']; ?><? endif; ?>" />
<link rel="stylesheet" href="<? if (!isset($this->magic_vars['tempdir'])) $this->magic_vars['tempdir'] = ''; echo $this->magic_vars['tempdir']; ?>/longbao/style.css" type="text/css" media="screen, projection" />
<script src='<? if (!isset($this->magic_vars['tempdir'])) $this->magic_vars['tempdir'] = ''; echo $this->magic_vars['tempdir']; ?>/longbao/js/jquery-1.4.2.min.js' type="text/javascript"></script>
 <script src="<? if (!isset($this->magic_vars['tempdir'])) $this->magic_vars['tempdir'] = ''; echo $this->magic_vars['tempdir']; ?>/js/sub.js" type="text/javascript"></script>
    <script src="<? if (!isset($this->magic_vars['tempdir'])) $this->magic_vars['tempdir'] = ''; echo $this->magic_vars['tempdir']; ?>/js/yu.js" type="text/javascript"></script>
    <script src="<? if (!isset($this->magic_vars['tempdir'])) $this->magic_vars['tempdir'] = ''; echo $this->magic_vars['tempdir']; ?>/js/tb.js" type="text/javascript"></script>
    <script src="<? if (!isset($this->magic_vars['tempdir'])) $this->magic_vars['tempdir'] = ''; echo $this->magic_vars['tempdir']; ?>/js/tipswindown.js" type="text/javascript"></script>
    <script src="<? if (!isset($this->magic_vars['tempdir'])) $this->magic_vars['tempdir'] = ''; echo $this->magic_vars['tempdir']; ?>/js/lhgdialog.min.js" type="text/javascript"></script>
    <script src="/plugins/timepicker/WdatePicker.js" type="text/javascript"></script>
    <script src="<? if (!isset($this->magic_vars['tempdir'])) $this->magic_vars['tempdir'] = ''; echo $this->magic_vars['tempdir']; ?>/js/base.js" type="text/javascript"></script>
	<script type="text/javascript" src="<? if (!isset($this->magic_vars['tempdir'])) $this->magic_vars['tempdir'] = ''; echo $this->magic_vars['tempdir']; ?>/longbao/js/scrollNews.js"></script>
</head>

<body>
<div class="header clearfix">
  <div class="top">
    <div class="box980"> <a href="/tool_lixi/index.html"><img src="<? if (!isset($this->magic_vars['tempdir'])) $this->magic_vars['tempdir'] = ''; echo $this->magic_vars['tempdir']; ?>/longbao/images/jsq.jpg" width="8" height="11" /> 利息计算器</a> <a href="/help/index.html">帮助中心</a> 
                    <? if (!isset($this->magic_vars['_G']['user_id'])) $this->magic_vars['_G']['user_id']=''; ;if (  $this->magic_vars['_G']['user_id']==""): ?>	 
                      <a href="/index.php?user&q=reg">注册</a>
                      <a href="/index.php?user&q=login">登录</a>
                           <span>您好，游客</span>
                       <? else: ?>
                        <a href="/index.php?user&q=logout&type=index">退出</a> 
                        <a href="/?user&q=code/message">站内信(<? if (!isset($this->magic_vars['_G']['message_result']['message_no'])) $this->magic_vars['_G']['message_result']['message_no'] = '';$_tmp = $this->magic_vars['_G']['message_result']['message_no'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?>)</a>  
                       <a href="/?user">您好，<? if (!isset($this->magic_vars['_G']['user_result']['username'])) $this->magic_vars['_G']['user_result']['username'] = ''; echo $this->magic_vars['_G']['user_result']['username']; ?></a> 
                        <? endif; ?>
    

    
    
     </div>
  </div>
  <div class="head">
    <div class="box980">
      <div class="logo"><a href="/"><img src="<? if (!isset($this->magic_vars['tempdir'])) $this->magic_vars['tempdir'] = ''; echo $this->magic_vars['tempdir']; ?>/longbao/images/logo.jpg" width="219" height="64" /></a></div>
      <div class="nav">
        <ul>
          <li id="cm1"><a href="/"  <? if (!isset($this->magic_vars['_G']['site_result']['pid'])) $this->magic_vars['_G']['site_result']['pid']='';if (!isset($this->magic_vars['_G']['site_result']['pid'])) $this->magic_vars['_G']['site_result']['pid']='';if (!isset($this->magic_vars['_G']['site_result']['pid'])) $this->magic_vars['_G']['site_result']['pid']='';if (!isset($this->magic_vars['_G']['site_result']['id'])) $this->magic_vars['_G']['site_result']['id']=''; ;if ( ( $this->magic_vars['_G']['site_result']['pid']==1)||( $this->magic_vars['_G']['site_result']['pid']==164)||( $this->magic_vars['_G']['site_result']['pid']==129)||( $this->magic_vars['_G']['site_result']['id']==1)): ?>class="on"<? endif; ?>>首页</a></li>
          <li id="cm2"><a href="/invest/index.html" <? if (!isset($this->magic_vars['_G']['site_result']['pid'])) $this->magic_vars['_G']['site_result']['pid']='';if (!isset($this->magic_vars['_G']['site_result']['id'])) $this->magic_vars['_G']['site_result']['id']=''; ;if ( ( $this->magic_vars['_G']['site_result']['pid']==2)||( $this->magic_vars['_G']['site_result']['id']==2)): ?>class="on"<? endif; ?>>我要投资</a></li>
          <li  id="cm3"><a href="/borrow/index.html" <? if (!isset($this->magic_vars['_G']['site_result']['pid'])) $this->magic_vars['_G']['site_result']['pid']='';if (!isset($this->magic_vars['_G']['site_result']['id'])) $this->magic_vars['_G']['site_result']['id']=''; ;if ( ( $this->magic_vars['_G']['site_result']['pid']==3)||( $this->magic_vars['_G']['site_result']['id']==3)): ?>class="on"<? endif; ?>>我要借款</a></li>
          <li id="cm4"><a href="/?user" <? if (!isset($this->magic_vars['_G']['site_result']['pid'])) $this->magic_vars['_G']['site_result']['pid']='';if (!isset($this->magic_vars['_G']['site_result']['id'])) $this->magic_vars['_G']['site_result']['id']=''; ;if ( ( $this->magic_vars['_G']['site_result']['pid']==4)||( $this->magic_vars['_G']['site_result']['id']==4)): ?>class="on"<? endif; ?>>我的账户</a></li>
          <li><a href="/zhongchou/index.html">众筹项目</a></li>
          <li><a href="/bbs/forum.php" target="_blank">论坛</a></li>
        </ul>
      </div>
    </div>
    
       
    <script type="text/javascript">
        $(document).ready(function(){
            $(".nav li").mouseover(function(){
                $(".nav-list div").css("display","none");	
                var x=$(this).attr("id");
                $("."+x).css("display","block");
            });
			
			var _curclassname="cm1";
			$(".nav-list div").each(function() {
				if($(this).css("display")=="block"){
					_curclassname=$(this).attr("class");
				}
			});
			
		
        });
    </script>
	 
    <div class="nav-list">
                         	<div class="box980 cm1" <? if (!isset($this->magic_vars['_G']['site_result']['pid'])) $this->magic_vars['_G']['site_result']['pid']='';if (!isset($this->magic_vars['_G']['site_result']['pid'])) $this->magic_vars['_G']['site_result']['pid']='';if (!isset($this->magic_vars['_G']['site_result']['id'])) $this->magic_vars['_G']['site_result']['id']=''; ;if ( ( $this->magic_vars['_G']['site_result']['pid']==1)||( $this->magic_vars['_G']['site_result']['pid']==164)||( $this->magic_vars['_G']['site_result']['id']==1)): ?>style=""<? else: ?>style="display:none;"<? endif; ?>>
                    <? if (!isset($this->magic_vars['_G']['site_sub_list_1'])) $this->magic_vars['_G']['site_sub_list_1']=''; ;if (  $this->magic_vars['_G']['site_sub_list_1']!=""): ?>
					<?  if(!isset($this->magic_vars['_G']['site_sub_list_1']) || $this->magic_vars['_G']['site_sub_list_1']=='') $this->magic_vars['_G']['site_sub_list_1'] = array();  $_from = $this->magic_vars['_G']['site_sub_list_1']; 
 if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); } 
if (count($_from)>0):
;    foreach ($_from as $this->magic_vars['key'] =>  $this->magic_vars['_item']):
?>
					<a href="/<? if (!isset($this->magic_vars['_item']['nid'])) $this->magic_vars['_item']['nid'] = ''; echo $this->magic_vars['_item']['nid']; ?>/index.html">· <? if (!isset($this->magic_vars['_item']['name'])) $this->magic_vars['_item']['name'] = ''; echo $this->magic_vars['_item']['name']; ?></a>
					<? endforeach; endif; unset($_from); ?>
					<? endif; ?>
                        </div>
                        
                        
                        <div class="box980 cm2" <? if (!isset($this->magic_vars['_G']['site_result']['pid'])) $this->magic_vars['_G']['site_result']['pid']='';if (!isset($this->magic_vars['_G']['site_result']['id'])) $this->magic_vars['_G']['site_result']['id']=''; ;if ( ( $this->magic_vars['_G']['site_result']['pid']==2)||( $this->magic_vars['_G']['site_result']['id']==2)): ?>style=""<? else: ?>style="display:none;"<? endif; ?>>
                   <? if (!isset($this->magic_vars['_G']['site_sub_list_2'])) $this->magic_vars['_G']['site_sub_list_2']=''; ;if (  $this->magic_vars['_G']['site_sub_list_2']!=""): ?>
					<?  if(!isset($this->magic_vars['_G']['site_sub_list_2']) || $this->magic_vars['_G']['site_sub_list_2']=='') $this->magic_vars['_G']['site_sub_list_2'] = array();  $_from = $this->magic_vars['_G']['site_sub_list_2']; 
 if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); } 
if (count($_from)>0):
;    foreach ($_from as $this->magic_vars['key'] =>  $this->magic_vars['_item']):
?>
					<a href="/<? if (!isset($this->magic_vars['_item']['nid'])) $this->magic_vars['_item']['nid'] = ''; echo $this->magic_vars['_item']['nid']; ?>/index.html">· <? if (!isset($this->magic_vars['_item']['name'])) $this->magic_vars['_item']['name'] = ''; echo $this->magic_vars['_item']['name']; ?></a>
					<? endforeach; endif; unset($_from); ?>
					<? endif; ?>
                        </div>
                        
                        <div class="box980 cm3" <? if (!isset($this->magic_vars['_G']['site_result']['pid'])) $this->magic_vars['_G']['site_result']['pid']='';if (!isset($this->magic_vars['_G']['site_result']['id'])) $this->magic_vars['_G']['site_result']['id']=''; ;if ( ( $this->magic_vars['_G']['site_result']['pid']==3)||( $this->magic_vars['_G']['site_result']['id']==3)): ?>style=""<? else: ?>style="display:none;"<? endif; ?>>
                   <? if (!isset($this->magic_vars['_G']['site_sub_list_3'])) $this->magic_vars['_G']['site_sub_list_3']=''; ;if (  $this->magic_vars['_G']['site_sub_list_3']!=""): ?>
					<?  if(!isset($this->magic_vars['_G']['site_sub_list_3']) || $this->magic_vars['_G']['site_sub_list_3']=='') $this->magic_vars['_G']['site_sub_list_3'] = array();  $_from = $this->magic_vars['_G']['site_sub_list_3']; 
 if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); } 
if (count($_from)>0):
;    foreach ($_from as $this->magic_vars['key'] =>  $this->magic_vars['_item']):
?>
					<a href="/<? if (!isset($this->magic_vars['_item']['nid'])) $this->magic_vars['_item']['nid'] = ''; echo $this->magic_vars['_item']['nid']; ?>/index.html">· <? if (!isset($this->magic_vars['_item']['name'])) $this->magic_vars['_item']['name'] = ''; echo $this->magic_vars['_item']['name']; ?></a>
					<? endforeach; endif; unset($_from); ?>
					<? endif; ?>
                        </div>
                        
                        <div class="box980 cm4" <? if (!isset($this->magic_vars['_G']['site_result']['pid'])) $this->magic_vars['_G']['site_result']['pid']='';if (!isset($this->magic_vars['_G']['site_result']['id'])) $this->magic_vars['_G']['site_result']['id']=''; ;if ( ( $this->magic_vars['_G']['site_result']['pid']==4)||( $this->magic_vars['_G']['site_result']['id']==4)): ?>style=""<? else: ?>style="display:none;"<? endif; ?>>
                    <? if (!isset($this->magic_vars['_G']['site_sub_list_4'])) $this->magic_vars['_G']['site_sub_list_4']=''; ;if (  $this->magic_vars['_G']['site_sub_list_4']!=""): ?>
					<?  if(!isset($this->magic_vars['_G']['site_sub_list_4']) || $this->magic_vars['_G']['site_sub_list_4']=='') $this->magic_vars['_G']['site_sub_list_4'] = array();  $_from = $this->magic_vars['_G']['site_sub_list_4']; 
 if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); } 
if (count($_from)>0):
;    foreach ($_from as $this->magic_vars['key'] =>  $this->magic_vars['_item']):
?>
					<a href="/<? if (!isset($this->magic_vars['_item']['nid'])) $this->magic_vars['_item']['nid'] = ''; echo $this->magic_vars['_item']['nid']; ?>/index.html">· <? if (!isset($this->magic_vars['_item']['name'])) $this->magic_vars['_item']['name'] = ''; echo $this->magic_vars['_item']['name']; ?></a>
					<? endforeach; endif; unset($_from); ?>
					<? endif; ?>
                        </div>
                        
 
    </div>
  </div>
</div>
<div class="banner">
  <div class="top_view" style="height: 330px;">
    <div class="index_view" id="view_img">
      <ul>
       <? $this->magic_vars['query_type']='GetList';$data = array('var'=>'var','limit'=>'6','status'=>'1','type_id'=>'1');$default = '';  require_once(ROOT_PATH.'modules/scrollpic/scrollpic.class.php');$this->magic_vars['magic_result'] = scrollpicClass::GetList($data);if(!isset($this->magic_vars['magic_result'])) $this->magic_vars['magic_result']= array(); $_from = $this->magic_vars['magic_result']; if (!is_array($_from) && !is_object($_from)) {$_from =array(); } if (count($_from)>0):
;    foreach ($_from as $this->magic_vars['key'] => $this->magic_vars['var']):
?>
        <li style="background:url(<? if (!isset($this->magic_vars['var']['pic'])) $this->magic_vars['var']['pic'] = ''; echo $this->magic_vars['var']['pic']; ?>) no-repeat center top"> <a href="<? if (!isset($this->magic_vars['var']['url'])) $this->magic_vars['var']['url'] = ''; echo $this->magic_vars['var']['url']; ?>" target="_blank"></a> </li>
       <? endforeach;else:echo $default; endif; unset($_from);unset($_magic_vars); ?>
      </ul>
    </div>
    <script type="text/javascript">
                    //启动定时器 5秒自动切换图片
                    var s = new scrollNews("#view_img", "s", 3000, 0);
                </script> 
  </div>
  <div class="gain-items">
    <div class="gain" id="userGain" style="z-index: 9; top: -290px; right: 0px; ">
      <? if (!isset($this->magic_vars['_G']['user_id'])) $this->magic_vars['_G']['user_id']=''; ;if (  $this->magic_vars['_G']['user_id']==""): ?>
      <div class="gain-cont">
      
      
        <h2>会员登录</h2>
        
        <form name="login_in_form" method="post" action="/index.php?user&q=login"  class="ui-form" >
        <p>账户名：
          <input name="keywords" type="text" placeholder="用户名" style="width:210px; height:30px;" />
        </p>
        <p>登录密码：
         <input type="hidden" name="url" value='1' />	
          <input name="password" type="password" placeholder="密码" style="width:210px; height:30px;" />
        </p>
      
        <p class="reg"><a href="javascript:void(0)" onclick="document.forms.login_in_form.submit();">登录</a></p>
        <p class="tar"><a href="/index.php?user&q=reg">还没注册? </a></p>
        
          </form>
      </div>
       <? else: ?>
        <div class="gain-cont usered">
          <h2>欢迎开启您的投资理财！</h2>
          <p>您当前的登录账户是: <span class="light-org"><? if (!isset($this->magic_vars['_G']['user_result']['username'])) $this->magic_vars['_G']['user_result']['username'] = ''; echo $this->magic_vars['_G']['user_result']['username']; ?></span></p>
           <? $data = array('var'=>'var','user_id'=>$this->magic_vars['_G']['user_id']);  include_once(ROOT_PATH.'modules/account/account.class.php');$this->magic_vars['var'] = accountClass::GetOne($data);if(!is_array($this->magic_vars['var'])){ $this->magic_vars['var']=array();}?>
        <p> 可 用 余 额：<font color="#ff6600">￥<? if (!isset($this->magic_vars['var']['balance'])) $this->magic_vars['var']['balance'] = '';$_tmp = $this->magic_vars['var']['balance'];$_tmp = $this->magic_modifier("round",$_tmp,"2,3");$_tmp = $this->magic_modifier("default",$_tmp,"0.00");echo $_tmp;unset($_tmp); ?></font></p>
		<? unset($_magic_vars);unset($data); ?>
	    <? $data = array('var'=>'Devar','user_id'=>$this->magic_vars['_G']['user_id']);  include_once(ROOT_PATH.'modules/borrow/borrow.class.php');$this->magic_vars['Devar'] = borrowClass::GetBorrowCount($data);if(!is_array($this->magic_vars['Devar'])){ $this->magic_vars['Devar']=array();}?>
        <p>最近待收金额：<font color="#ff6600">￥<? if (!isset($this->magic_vars['Devar']['recover_new_account'])) $this->magic_vars['Devar']['recover_new_account'] = '';$_tmp = $this->magic_vars['Devar']['recover_new_account'];$_tmp = $this->magic_modifier("default",$_tmp,"0.00");echo $_tmp;unset($_tmp); ?></font></p>
		 <p>最近待收日期：<font color="#ff6600"><? if (!isset($this->magic_vars['Devar']['recover_new_time'])) $this->magic_vars['Devar']['recover_new_time'] = '';$_tmp = $this->magic_vars['Devar']['recover_new_time'];$_tmp = $this->magic_modifier("date_format",$_tmp,"Y-m-d");$_tmp = $this->magic_modifier("default",$_tmp,"-");echo $_tmp;unset($_tmp); ?></font></p>
        <? unset($_magic_vars);unset($data); ?>
          <p class="reg"><a href="/?user">进入我的账户</a></p>
        </div>
        <? endif; ?>
      <div class="opacity" style="opacity: 0.5; "></div>
    </div>
  </div>
</div>
<div class="banner-show" ></div>
<div class="bodyer clearfix" >

 <? $data = array('var'=>'uservar');  include_once(ROOT_PATH.'modules/borrow/borrow.class.php');$this->magic_vars['uservar'] = borrowClass::Getuser_zong($data);if(!is_array($this->magic_vars['uservar'])){ $this->magic_vars['uservar']=array();}?>
  <div class="statistics"><span><img src="<? if (!isset($this->magic_vars['tempdir'])) $this->magic_vars['tempdir'] = ''; echo $this->magic_vars['tempdir']; ?>/longbao/images/Statistics.jpg" width="16" height="15" /> 网站数据统计:</span><span>放款总额：<em><? if (!isset($this->magic_vars['uservar']['borrow_all'])) $this->magic_vars['uservar']['borrow_all'] = ''; echo $this->magic_vars['uservar']['borrow_all']; ?></em>元</span><span>总待回收金额：<em><? if (!isset($this->magic_vars['uservar']['borrow_repay_late_not'])) $this->magic_vars['uservar']['borrow_repay_late_not'] = ''; echo $this->magic_vars['uservar']['borrow_repay_late_not']; ?></em>元</span><span>投资已赚取收益：<em><? if (!isset($this->magic_vars['uservar']['Total_revenue'])) $this->magic_vars['uservar']['Total_revenue'] = ''; echo $this->magic_vars['uservar']['Total_revenue']; ?></em>元</span></div>
 <? unset($_magic_vars);unset($data); ?> 
  
  <div class="index-adv"><img src="<? if (!isset($this->magic_vars['tempdir'])) $this->magic_vars['tempdir'] = ''; echo $this->magic_vars['tempdir']; ?>/longbao/images/adv.jpg" width="980" height="90" /></div>
  <div class="index_text">
    <ul>
      <li><span>关于我们</span><a href="/about/index.html">了解我们</a></li>
      <li class="text_aq"><span>安全保障</span><a href="/aqbz/index.html">100%本息担保</a></li>
      <li class="text_help"><span>帮助中心</span><a href="/help/index.html">解决您所遇到的问题</a></li>
      <li class="text_notice"> <span>网站公告</span> 
      
      <? $this->magic_vars['query_type']='GetList';$data = array('var'=>'var','limit'=>'3','type_id'=>'6','flag'=>'index');$default = '';  require_once(ROOT_PATH.'modules/articles/articles.class.php');$this->magic_vars['magic_result'] = articlesClass::GetList($data);if(!isset($this->magic_vars['magic_result'])) $this->magic_vars['magic_result']= array(); $_from = $this->magic_vars['magic_result']; if (!is_array($_from) && !is_object($_from)) {$_from =array(); } if (count($_from)>0):
;    foreach ($_from as $this->magic_vars['key'] => $this->magic_vars['var']):
?>
         <a href="/notice/a<? if (!isset($this->magic_vars['var']['id'])) $this->magic_vars['var']['id'] = ''; echo $this->magic_vars['var']['id']; ?>.html" target="_blank" title="<? if (!isset($this->magic_vars['var']['name'])) $this->magic_vars['var']['name'] = ''; echo $this->magic_vars['var']['name']; ?>"><? if (!isset($this->magic_vars['var']['name'])) $this->magic_vars['var']['name'] = '';$_tmp = $this->magic_vars['var']['name'];$_tmp = $this->magic_modifier("truncate",$_tmp,"14");echo $_tmp;unset($_tmp); ?>...</a>
	 <? endforeach;else:echo $default; endif; unset($_from);unset($_magic_vars); ?>
      
      </li>
    </ul>
  </div>
  <dl class="index-title">
    <dt class="index-titleBg"><img src="<? if (!isset($this->magic_vars['tempdir'])) $this->magic_vars['tempdir'] = ''; echo $this->magic_vars['tempdir']; ?>/longbao/images/icon_invest.png" align="absmiddle" width="20" height="25"> 正在借款的项目</dt>
    <dd><a href="/invest/index.html">查看更多</a></dd>
  </dl>
  <ul class="invest_title">
    <li style="width:100px;" class="title_line">图片</li>
    <li style="width:210px;" class="title_line">标题/借款者/等级</li>
    <li style="width:160px;" class="title_line">借款金额/年利率</li>
    <li style="width:174px;" class="title_line">进度/剩余时间</li>
    <li style="width:174px;" class="title_line">期限/还款方式</li>
    <li style="width:160px;">状态</li>
  </ul>
  <div class="invest_list">
    <ul>
     <? $this->magic_vars['query_type']='GetList';$data = array('var'=>'var','order'=>'index','limit'=>'7','is_flow'=>'2','query_type'=>'tender_now');$default = '';  require_once(ROOT_PATH.'modules/borrow/borrow.class.php');$this->magic_vars['magic_result'] = borrowClass::GetList($data);if(!isset($this->magic_vars['magic_result'])) $this->magic_vars['magic_result']= array(); $_from = $this->magic_vars['magic_result']; if (!is_array($_from) && !is_object($_from)) {$_from =array(); } if (count($_from)>0):
;    foreach ($_from as $this->magic_vars['key'] => $this->magic_vars['var']):
?>
      <li>
        <table width="100%" border="0">
          <tr>
            <td rowspan="3" width="100"><div class="Recommend_mg2"><img src="<? if (!isset($this->magic_vars['var']['user_id'])) $this->magic_vars['var']['user_id'] = '';$_tmp = $this->magic_vars['var']['user_id'];$_tmp = $this->magic_modifier("avatar",$_tmp,"");echo $_tmp;unset($_tmp); ?>" width="75" height="75" /></div></td>
            <td colspan="3"><h5><a href="/invest/full_success/a<? if (!isset($this->magic_vars['var']['borrow_nid'])) $this->magic_vars['var']['borrow_nid'] = ''; echo $this->magic_vars['var']['borrow_nid']; ?>.html" title="<? if (!isset($this->magic_vars['var']['name'])) $this->magic_vars['var']['name'] = ''; echo $this->magic_vars['var']['name']; ?>"><? if (!isset($this->magic_vars['var']['name'])) $this->magic_vars['var']['name'] = ''; echo $this->magic_vars['var']['name']; ?></a> <? if (!isset($this->magic_vars['var']['is_jin'])) $this->magic_vars['var']['is_jin']='';if (!isset($this->magic_vars['var']['is_flow'])) $this->magic_vars['var']['is_flow']='';if (!isset($this->magic_vars['var']['is_Seconds'])) $this->magic_vars['var']['is_Seconds']='';if (!isset($this->magic_vars['var']['vouchstatus'])) $this->magic_vars['var']['vouchstatus']='';if (!isset($this->magic_vars['var']['fast_status'])) $this->magic_vars['var']['fast_status']=''; ;if (  $this->magic_vars['var']['is_jin']!=1 &&  $this->magic_vars['var']['is_flow']!=1 &&  $this->magic_vars['var']['is_Seconds']!=1 &&  $this->magic_vars['var']['vouchstatus']!=1  &&  $this->magic_vars['var']['fast_status']!=1): ?><img src="<? if (!isset($this->magic_vars['tempdir'])) $this->magic_vars['tempdir'] = ''; echo $this->magic_vars['tempdir']; ?>/images/xin.jpg"   /><? endif; ?><? if (!isset($this->magic_vars['var']['is_jin'])) $this->magic_vars['var']['is_jin']=''; ;if (  $this->magic_vars['var']['is_jin']==1): ?><img src="<? if (!isset($this->magic_vars['tempdir'])) $this->magic_vars['tempdir'] = ''; echo $this->magic_vars['tempdir']; ?>/images/jin.gif"   /><? endif; ?><? if (!isset($this->magic_vars['var']['is_flow'])) $this->magic_vars['var']['is_flow']=''; ;if (  $this->magic_vars['var']['is_flow']==1): ?><img src="<? if (!isset($this->magic_vars['tempdir'])) $this->magic_vars['tempdir'] = ''; echo $this->magic_vars['tempdir']; ?>/images/flow.gif"   /><? endif; ?><? if (!isset($this->magic_vars['var']['is_Seconds'])) $this->magic_vars['var']['is_Seconds']=''; ;if (  $this->magic_vars['var']['is_Seconds']==1): ?><img src="<? if (!isset($this->magic_vars['tempdir'])) $this->magic_vars['tempdir'] = ''; echo $this->magic_vars['tempdir']; ?>/images/mb.gif"   /><? endif; ?><? if (!isset($this->magic_vars['var']['isDXB'])) $this->magic_vars['var']['isDXB']=''; ;if (  $this->magic_vars['var']['isDXB']==1): ?>&nbsp;<img src="<? if (!isset($this->magic_vars['tempdir'])) $this->magic_vars['tempdir'] = ''; echo $this->magic_vars['tempdir']; ?>/images/lock.gif"   /><? endif; ?><? if (!isset($this->magic_vars['var']['vouchstatus'])) $this->magic_vars['var']['vouchstatus']=''; ;if (  $this->magic_vars['var']['vouchstatus']==1): ?> &nbsp;<img src="<? if (!isset($this->magic_vars['tempdir'])) $this->magic_vars['tempdir'] = ''; echo $this->magic_vars['tempdir']; ?>/images/ico_dbao.gif"  ><? endif; ?><? if (!isset($this->magic_vars['var']['fast_status'])) $this->magic_vars['var']['fast_status']=''; ;if (  $this->magic_vars['var']['fast_status']==1): ?>&nbsp;<img src="<? if (!isset($this->magic_vars['tempdir'])) $this->magic_vars['tempdir'] = ''; echo $this->magic_vars['tempdir']; ?>/images/ico_ks.gif" ><? endif; ?><? if (!isset($this->magic_vars['var']['award_status'])) $this->magic_vars['var']['award_status']=''; ;if (  $this->magic_vars['var']['award_status']>0): ?>&nbsp;<img src="<? if (!isset($this->magic_vars['tempdir'])) $this->magic_vars['tempdir'] = ''; echo $this->magic_vars['tempdir']; ?>/images/jiangli.gif"   /><? endif; ?><? if (!isset($this->magic_vars['var']['recommend'])) $this->magic_vars['var']['recommend']=''; ;if (  $this->magic_vars['var']['recommend']==1): ?>&nbsp;<img src="<? if (!isset($this->magic_vars['tempdir'])) $this->magic_vars['tempdir'] = ''; echo $this->magic_vars['tempdir']; ?>/images/tuijian.jpg"   /><? endif; ?></h5></td>
          </tr>
          <tr>
            <td width="210">发布者：<strong><? if (!isset($this->magic_vars['var']['username'])) $this->magic_vars['var']['username'] = ''; echo $this->magic_vars['var']['username']; ?></strong></td>
            <td width="180">借款金额：<strong>￥<? if (!isset($this->magic_vars['var']['account'])) $this->magic_vars['var']['account'] = ''; echo $this->magic_vars['var']['account']; ?></strong>元</td>
            <td width="180">剩余时间：<? $data = array('var'=>'var_borrow','borrow_nid'=>$this->magic_vars['var']['borrow_nid'],'hits'=>'auto');  include_once(ROOT_PATH.'modules/borrow/borrow.class.php');$this->magic_vars['var_borrow'] = borrowClass::GetDetail($data);if(!is_array($this->magic_vars['var_borrow'])){ $this->magic_vars['var_borrow']=array();}?>
					<? if (!isset($this->magic_vars['var_borrow']['borrow']['status'])) $this->magic_vars['var_borrow']['borrow']['status']=''; ;if (  $this->magic_vars['var_borrow']['borrow']['status']==0): ?>审核中<? if (!isset($this->magic_vars['var_borrow']['borrow']['status'])) $this->magic_vars['var_borrow']['borrow']['status']=''; ;elseif (  $this->magic_vars['var_borrow']['borrow']['status']==1): ?><span name="endtime"><? if (!isset($this->magic_vars['var_borrow']['borrow']['borrow_other_time'])) $this->magic_vars['var_borrow']['borrow']['borrow_other_time'] = ''; echo $this->magic_vars['var_borrow']['borrow']['borrow_other_time']; ?></span><? if (!isset($this->magic_vars['var_borrow']['borrow']['status'])) $this->magic_vars['var_borrow']['borrow']['status']=''; ;elseif (  $this->magic_vars['var_borrow']['borrow']['status']==2): ?>审核失败<? if (!isset($this->magic_vars['var_borrow']['borrow']['status'])) $this->magic_vars['var_borrow']['borrow']['status']='';if (!isset($this->magic_vars['var_borrow']['borrow']['repay_account_wait'])) $this->magic_vars['var_borrow']['borrow']['repay_account_wait']=''; ;elseif (  $this->magic_vars['var_borrow']['borrow']['status']==3 &&  $this->magic_vars['var_borrow']['borrow']['repay_account_wait'] == 0): ?>已还完<? if (!isset($this->magic_vars['var_borrow']['borrow']['status'])) $this->magic_vars['var_borrow']['borrow']['status']='';if (!isset($this->magic_vars['var_borrow']['borrow']['repay_account_wait'])) $this->magic_vars['var_borrow']['borrow']['repay_account_wait']=''; ;elseif (  $this->magic_vars['var_borrow']['borrow']['status']==3 &&  $this->magic_vars['var_borrow']['borrow']['repay_account_wait'] != 0): ?>还款中<? if (!isset($this->magic_vars['var_borrow']['borrow']['status'])) $this->magic_vars['var_borrow']['borrow']['status']=''; ;elseif (  $this->magic_vars['var_borrow']['borrow']['status']==5): ?>流标<? else: ?>未知状态<? endif; ?>
					<? unset($_magic_vars);unset($data); ?></td>
            <td width="190">借款期限：<? if (!isset($this->magic_vars['var']['borrow_period'])) $this->magic_vars['var']['borrow_period']=''; ;if (  $this->magic_vars['var']['borrow_period'] == 0.03): ?>1天
							<? if (!isset($this->magic_vars['var']['borrow_period'])) $this->magic_vars['var']['borrow_period']=''; ;elseif (  $this->magic_vars['var']['borrow_period'] == 0.06): ?>2天
							<? if (!isset($this->magic_vars['var']['borrow_period'])) $this->magic_vars['var']['borrow_period']=''; ;elseif (  $this->magic_vars['var']['borrow_period'] == 0.10): ?>3天
							<? if (!isset($this->magic_vars['var']['borrow_period'])) $this->magic_vars['var']['borrow_period']=''; ;elseif (  $this->magic_vars['var']['borrow_period'] == 0.13): ?>4天
							<? if (!isset($this->magic_vars['var']['borrow_period'])) $this->magic_vars['var']['borrow_period']=''; ;elseif (  $this->magic_vars['var']['borrow_period'] == 0.16): ?>5天
							<? if (!isset($this->magic_vars['var']['borrow_period'])) $this->magic_vars['var']['borrow_period']=''; ;elseif (  $this->magic_vars['var']['borrow_period'] == 0.20): ?>6天
							<? if (!isset($this->magic_vars['var']['borrow_period'])) $this->magic_vars['var']['borrow_period']=''; ;elseif (  $this->magic_vars['var']['borrow_period'] == 0.23): ?>7天
							<? if (!isset($this->magic_vars['var']['borrow_period'])) $this->magic_vars['var']['borrow_period']=''; ;elseif (  $this->magic_vars['var']['borrow_period'] == 0.26): ?>8天
							<? if (!isset($this->magic_vars['var']['borrow_period'])) $this->magic_vars['var']['borrow_period']=''; ;elseif (  $this->magic_vars['var']['borrow_period'] == 0.30): ?>9天
							<? if (!isset($this->magic_vars['var']['borrow_period'])) $this->magic_vars['var']['borrow_period']=''; ;elseif (  $this->magic_vars['var']['borrow_period'] == 0.33): ?>10天
							<? if (!isset($this->magic_vars['var']['borrow_period'])) $this->magic_vars['var']['borrow_period']=''; ;elseif (  $this->magic_vars['var']['borrow_period'] == 0.36): ?>11天
							<? if (!isset($this->magic_vars['var']['borrow_period'])) $this->magic_vars['var']['borrow_period']=''; ;elseif (  $this->magic_vars['var']['borrow_period'] == 0.40): ?>12天
							<? if (!isset($this->magic_vars['var']['borrow_period'])) $this->magic_vars['var']['borrow_period']=''; ;elseif (  $this->magic_vars['var']['borrow_period'] == 0.43): ?>13天
							<? if (!isset($this->magic_vars['var']['borrow_period'])) $this->magic_vars['var']['borrow_period']=''; ;elseif (  $this->magic_vars['var']['borrow_period'] == 0.46): ?>14天
							<? if (!isset($this->magic_vars['var']['borrow_period'])) $this->magic_vars['var']['borrow_period']=''; ;elseif (  $this->magic_vars['var']['borrow_period'] == 0.50): ?>15天
							<? if (!isset($this->magic_vars['var']['borrow_period'])) $this->magic_vars['var']['borrow_period']=''; ;elseif (  $this->magic_vars['var']['borrow_period'] == 0.53): ?>16天
							<? if (!isset($this->magic_vars['var']['borrow_period'])) $this->magic_vars['var']['borrow_period']=''; ;elseif (  $this->magic_vars['var']['borrow_period'] == 0.56): ?>17天
							<? if (!isset($this->magic_vars['var']['borrow_period'])) $this->magic_vars['var']['borrow_period']=''; ;elseif (  $this->magic_vars['var']['borrow_period'] == 0.60): ?>18天
							<? if (!isset($this->magic_vars['var']['borrow_period'])) $this->magic_vars['var']['borrow_period']=''; ;elseif (  $this->magic_vars['var']['borrow_period'] == 0.63): ?>19天
							<? if (!isset($this->magic_vars['var']['borrow_period'])) $this->magic_vars['var']['borrow_period']=''; ;elseif (  $this->magic_vars['var']['borrow_period'] == 0.66): ?>20天
							<? if (!isset($this->magic_vars['var']['borrow_period'])) $this->magic_vars['var']['borrow_period']=''; ;elseif (  $this->magic_vars['var']['borrow_period'] == 0.70): ?>21天
							<? if (!isset($this->magic_vars['var']['borrow_period'])) $this->magic_vars['var']['borrow_period']=''; ;elseif (  $this->magic_vars['var']['borrow_period'] == 0.73): ?>22天
							<? if (!isset($this->magic_vars['var']['borrow_period'])) $this->magic_vars['var']['borrow_period']=''; ;elseif (  $this->magic_vars['var']['borrow_period'] == 0.76): ?>23天
							<? if (!isset($this->magic_vars['var']['borrow_period'])) $this->magic_vars['var']['borrow_period']=''; ;elseif (  $this->magic_vars['var']['borrow_period'] == 0.80): ?>24天
							<? if (!isset($this->magic_vars['var']['borrow_period'])) $this->magic_vars['var']['borrow_period']=''; ;elseif (  $this->magic_vars['var']['borrow_period'] == 0.83): ?>25天
							<? if (!isset($this->magic_vars['var']['borrow_period'])) $this->magic_vars['var']['borrow_period']=''; ;elseif (  $this->magic_vars['var']['borrow_period'] == 0.86): ?>26天
							<? if (!isset($this->magic_vars['var']['borrow_period'])) $this->magic_vars['var']['borrow_period']=''; ;elseif (  $this->magic_vars['var']['borrow_period'] == 0.90): ?>27天
							<? if (!isset($this->magic_vars['var']['borrow_period'])) $this->magic_vars['var']['borrow_period']=''; ;elseif (  $this->magic_vars['var']['borrow_period'] == 0.93): ?>28天
							<? if (!isset($this->magic_vars['var']['borrow_period'])) $this->magic_vars['var']['borrow_period']=''; ;elseif (  $this->magic_vars['var']['borrow_period'] == 0.96): ?>29天
							<? if (!isset($this->magic_vars['var']['borrow_period'])) $this->magic_vars['var']['borrow_period']=''; ;elseif (  $this->magic_vars['var']['borrow_period'] == 0.10): ?>30天
							<? if (!isset($this->magic_vars['var']['borrow_period'])) $this->magic_vars['var']['borrow_period']='';if (!isset($this->magic_vars['var']['borrow_period'])) $this->magic_vars['var']['borrow_period']=''; ;elseif (  $this->magic_vars['var']['borrow_period'] >= 1 &&  $this->magic_vars['var']['borrow_period'] < 10): ?><? if (!isset($this->magic_vars['var']['borrow_period'])) $this->magic_vars['var']['borrow_period'] = '';$_tmp = $this->magic_vars['var']['borrow_period'];$_tmp = $this->magic_modifier("truncate",$_tmp,"1");echo $_tmp;unset($_tmp); ?>个月
							<? else: ?><? if (!isset($this->magic_vars['var']['borrow_period'])) $this->magic_vars['var']['borrow_period'] = '';$_tmp = $this->magic_vars['var']['borrow_period'];$_tmp = $this->magic_modifier("truncate",$_tmp,"2");echo $_tmp;unset($_tmp); ?>个月
							<? endif; ?></td>
            <td rowspan="2">
            
                                <a href="/invest/full_success/a<? if (!isset($this->magic_vars['var']['borrow_nid'])) $this->magic_vars['var']['borrow_nid'] = ''; echo $this->magic_vars['var']['borrow_nid']; ?>.html">
                                   <? if (!isset($this->magic_vars['var']['status'])) $this->magic_vars['var']['status']=''; ;if (  $this->magic_vars['var']['status']==1): ?>
				                     <? if (!isset($this->magic_vars['var']['borrow_account_wait'])) $this->magic_vars['var']['borrow_account_wait']=''; ;if (  $this->magic_vars['var']['borrow_account_wait']==0): ?> 
                                      <img src="<? if (!isset($this->magic_vars['tempdir'])) $this->magic_vars['tempdir'] = ''; echo $this->magic_vars['tempdir']; ?>/images/list_094.jpg" width="78" height="33" />
                                     <? else: ?>
                                     <img src="<? if (!isset($this->magic_vars['tempdir'])) $this->magic_vars['tempdir'] = ''; echo $this->magic_vars['tempdir']; ?>/images/list_091.jpg" width="78" height="33" />
                                     <? endif; ?>
                                   <? if (!isset($this->magic_vars['var']['status'])) $this->magic_vars['var']['status']=''; ;elseif (  $this->magic_vars['var']['status']==3): ?>
                                       <? if (!isset($this->magic_vars['var']['repay_account_wait'])) $this->magic_vars['var']['repay_account_wait']=''; ;if (  $this->magic_vars['var']['repay_account_wait']==0): ?>
                                        <img src="<? if (!isset($this->magic_vars['tempdir'])) $this->magic_vars['tempdir'] = ''; echo $this->magic_vars['tempdir']; ?>/images/list_092.jpg" width="78" height="33" />
                                       <? else: ?>
                                       <img src="<? if (!isset($this->magic_vars['tempdir'])) $this->magic_vars['tempdir'] = ''; echo $this->magic_vars['tempdir']; ?>/images/list_09.jpg" width="78" height="33" />
                                       <? endif; ?>
                                    <? else: ?>
                                        <? if (!isset($this->magic_vars['var']['status'])) $this->magic_vars['var']['status']=''; ;if (  $this->magic_vars['var']['status']==5): ?>
                                          <img src="<? if (!isset($this->magic_vars['tempdir'])) $this->magic_vars['tempdir'] = ''; echo $this->magic_vars['tempdir']; ?>/images/list_095.jpg" width="78" height="33" />
                                        <? else: ?> 
                                           <img src="<? if (!isset($this->magic_vars['tempdir'])) $this->magic_vars['tempdir'] = ''; echo $this->magic_vars['tempdir']; ?>/images/list_093.jpg" width="78" height="33" />
                                        <? endif; ?> 
                                   <? endif; ?>
                                    </a>
            </td>
          </tr>
          <tr>
            <td width="200">信用等级：<? if (!isset($this->magic_vars['var']['credit']['approve_credit'])) $this->magic_vars['var']['credit']['approve_credit'] = '';$_tmp = $this->magic_vars['var']['credit']['approve_credit'];$_tmp = $this->magic_modifier("credit",$_tmp,"credit");echo $_tmp;unset($_tmp); ?></td>
            <td>年利率：<strong><? if (!isset($this->magic_vars['var']['borrow_apr'])) $this->magic_vars['var']['borrow_apr'] = ''; echo $this->magic_vars['var']['borrow_apr']; ?>%</strong></td>
            <td><span class="jdt"><i  style="width: <? if (!isset($this->magic_vars['var']['borrow_account_scale'])) $this->magic_vars['var']['borrow_account_scale'] = ''; echo $this->magic_vars['var']['borrow_account_scale']; ?>%;"></i></span> <? if (!isset($this->magic_vars['var']['borrow_account_scale'])) $this->magic_vars['var']['borrow_account_scale'] = ''; echo $this->magic_vars['var']['borrow_account_scale']; ?>%</td>
            <td>赎回方式： <? if (!isset($this->magic_vars['var']['borrow_style'])) $this->magic_vars['var']['borrow_style'] = '';$_tmp = $this->magic_vars['var']['borrow_style'];$_tmp = $this->magic_modifier("linkages",$_tmp,"borrow_style");echo $_tmp;unset($_tmp); ?></td>
          </tr>
        </table>
      </li>
     <? endforeach;else:echo $default; endif; unset($_from);unset($_magic_vars); ?>
      
      
      
      
      <!--<div class="pagination pagination-centered">
        <ul>
          <li><a href="#">上一页</a></li>
          <li><a href="#">1</a></li>
          <li class="active"><a href="#">2</a></li>
          <li><a href="#">3</a></li>
          <li><a href="#">4</a></li>
          <li><a href="#">5</a></li>
          <li><a href="#">6</a></li>
          <li><a href="#">7</a></li>
          <li><a href="#">下一页</a></li>
        </ul>
      </div>-->
    </ul>
  </div>
  <dl class="index-link box980">
    <dt>友情连接</dt>
    <dd>
      <ul>
        <ul>
            <? $this->magic_vars['query_type']='GetList';$data = array('limit'=>'20','var'=>'_var');$default = '';  require_once(ROOT_PATH.'modules/links/links.class.php');$this->magic_vars['magic_result'] = linksClass::GetList($data);if(!isset($this->magic_vars['magic_result'])) $this->magic_vars['magic_result']= array(); $_from = $this->magic_vars['magic_result']; if (!is_array($_from) && !is_object($_from)) {$_from =array(); } if (count($_from)>0):
;    foreach ($_from as $this->magic_vars['key'] => $this->magic_vars['_var']):
?>
         <li style="width:auto"><a href="<? if (!isset($this->magic_vars['_var']['url'])) $this->magic_vars['_var']['url'] = ''; echo $this->magic_vars['_var']['url']; ?>" target="_blank"><? if (!isset($this->magic_vars['_var']['webname'])) $this->magic_vars['_var']['webname'] = ''; echo $this->magic_vars['_var']['webname']; ?></a></li>
         <? endforeach;else:echo $default; endif; unset($_from);unset($_magic_vars); ?>
        </ul>
      </ul>
    </dd>
  </dl>
</div>
<? $this->magic_include(array('file' => "footer.html", 'vars' => array()));?>