<?php echo $this->fetch('inc/header.html'); ?> 
<?php
$this->_var['dpagecss'][] = $this->_var['TMPL_REAL']."/css/index.css";
$this->_var['dpagejs'][] = $this->_var['TMPL_REAL']."/js/index.js";
$this->_var['dcpagejs'][] = $this->_var['TMPL_REAL']."/js/index.js";
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
<div class="wrap">
	
	<div id="index_images" class="index_images">		
			<div class="roll_box">
			<?php $_from = $this->_var['image_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'image_item');if (count($_from)):
    foreach ($_from AS $this->_var['image_item']):
?>
			<a href="<?php echo $this->_var['image_item']['url']; ?>" title="<?php echo $this->_var['image_item']['title']; ?>">
				<img src="<?php 
$k = array (
  'name' => 'get_spec_image',
  'v' => $this->_var['image_item']['image'],
  'w' => '960',
  'h' => '280',
  'g' => '1',
);
echo $k['name']($k['v'],$k['w'],$k['h'],$k['g']);
?>"  alt="<?php echo $this->_var['image_item']['title']; ?>" />
			</a>
			<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
			</div>			
	</div>
	
	<div class="f_l">
		<ul class="tab-nav">
			<li class="current"><a href="<?php
echo parse_url_tag("u:index|"."".""); 
?>">推荐项目</a></li>
			<li><a href="<?php
echo parse_url_tag("u:deals|"."r=new".""); 
?>">最新上线</a></li>
			<li><a href="<?php
echo parse_url_tag("u:deals|"."r=nend".""); 
?>">即将结束</a></li>
			<li><a href="<?php
echo parse_url_tag("u:deals|"."r=classic".""); 
?>">经典项目</a></li>
		</ul>
	</div>
	<div class="f_r">
		<ul class="tab-nav">
			<?php $_from = $this->_var['cate_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'cate_item');if (count($_from)):
    foreach ($_from AS $this->_var['cate_item']):
?>
			<li><a href="<?php
echo parse_url_tag("u:deals|"."id=".$this->_var['cate_item']['id']."".""); 
?>" title="<?php echo $this->_var['cate_item']['name']; ?>"><?php echo $this->_var['cate_item']['name']; ?></a></li>
			<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
		</ul>
	</div>
	<div class="blank"></div>
	<div class="blank"></div>
	<div class="blank"></div>
	<div id="pin_box">
	<?php echo $this->fetch('inc/deal_list.html'); ?>
	</div>	
	<div class="blank"></div>
	<div id="pin_loading" rel="<?php
echo parse_url_tag("u:ajax#index|"."p=".$this->_var['current_page']."".""); 
?>">正在努力加载</div>	
	
</div>
<?php echo $this->fetch('inc/footer.html'); ?> 