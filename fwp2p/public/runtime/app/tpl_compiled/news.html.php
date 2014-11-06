<?php echo $this->fetch('inc/header.html'); ?> 
<?php
$this->_var['dpagecss'][] = $this->_var['TMPL_REAL']."/css/news.css";
$this->_var['dpagecss'][] = $this->_var['TMPL_REAL']."/css/deal_log.css";
$this->_var['dpagejs'][] = $this->_var['TMPL_REAL']."/js/news.js";
$this->_var['dcpagejs'][] = $this->_var['TMPL_REAL']."/js/news.js";
$this->_var['dpagejs'][] = $this->_var['TMPL_REAL']."/js/discover.js";
$this->_var['dcpagejs'][] = $this->_var['TMPL_REAL']."/js/discover.js";
?>
<link rel="stylesheet" type="text/css" href="<?php 
$k = array (
  'name' => 'parse_css',
  'v' => $this->_var['dpagecss'],
);
echo $k['name']($k['v']);
?>" />
<script type="text/javascript" src="<?php 
$k = array (
  'name' => 'parse_script',
  'v' => $this->_var['dpagejs'],
  'c' => $this->_var['dcpagejs'],
);
echo $k['name']($k['v'],$k['c']);
?>"></script>
<div class="blank"></div>
<div class="shadow_bg">
	<div class="wrap white_box">		
		<?php echo $this->fetch('inc/news_update_header.html'); ?>	
		<div class="news_list_box">	
		<div class="news_left">	
		<div class="blank"></div>
		<div class="blank"></div>	
			<div id="pin_box">		
			<?php echo $this->fetch('inc/news_item.html'); ?>
			</div>
			<div class="ajax_loading_log" id="pin_loading" rel="<?php echo $this->_var['ajaxurl']; ?>">加载更多动态</div>
			<div class="pages"><?php echo $this->_var['pages']; ?></div>
		</div><!--end left-->
		<div class="news_right">
			<div class="blank"></div>
			<div class="blank"></div>
			<div class="news_right_title">你可能会感兴趣的项目 <a href="javascript:void(0);" id="chang_rand" rel="<?php
echo parse_url_tag("u:ajax#randdeal|"."".""); 
?>" class="linkgreen">换一换</a></div>
			<div class="blank"></div>
			<div id="rand_deal">
			<?php echo $this->fetch('inc/rand_deals.html'); ?>
			</div>
			<div class="blank"></div>
			<div class="blank"></div>
			<div class="blank"></div>
			<div class="news_right_title">热门推荐</div>
			<div class="blank"></div>
			<a href="<?php
echo parse_url_tag("u:index|"."".""); 
?>" class="linkgreen">推荐项目</a>
			<div class="blank"></div>
			<a href="<?php
echo parse_url_tag("u:deals|"."r=new".""); 
?>" class="linkgreen">最新上线</a>
			<div class="blank"></div>
			<a href="<?php
echo parse_url_tag("u:deals|"."r=nend".""); 
?>" class="linkgreen">即将结束</a>
			<div class="blank"></div>
			<div class="blank"></div>
			<div class="blank"></div>
			<div class="news_right_title">更多类别</div>
			<div class="blank"></div>
			<?php $_from = $this->_var['cate_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'cate_item');if (count($_from)):
    foreach ($_from AS $this->_var['cate_item']):
?>
			<a href="<?php
echo parse_url_tag("u:deals|"."id=".$this->_var['cate_item']['id']."".""); 
?>" class="linkgreen"><?php echo $this->_var['cate_item']['name']; ?></a>
			<div class="blank5"></div>
			<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
			
		</div><!--end right-->		
		<div class="blank"></div>	
		</div>	
	</div>
</div>
<div class="blank"></div>
<?php echo $this->fetch('inc/footer.html'); ?> 