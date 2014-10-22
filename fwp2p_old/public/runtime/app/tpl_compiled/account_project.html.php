<?php echo $this->fetch('inc/header.html'); ?> 
<?php
$this->_var['dpagejs'][] = $this->_var['TMPL_REAL']."/js/deal_list.js";
$this->_var['dcpagejs'][] = $this->_var['TMPL_REAL']."/js/deal_list.js";
$this->_var['dpagecss'][] = $this->_var['TMPL_REAL']."/css/account.css";
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
	<div class="wrap white_box"">
		<div class="page_title">
			我的项目
		</div>
		<div class="switch_nav">
			<ul>
				<li><a href="<?php
echo parse_url_tag("u:account#index|"."".""); 
?>">支持的项目</a></li>
				<li class="current"><a href="<?php
echo parse_url_tag("u:account#project|"."".""); 
?>">我的项目</a></li>
				<li><a href="<?php
echo parse_url_tag("u:account#focus|"."".""); 
?>">关注的项目</a></li>
				<li><a href="<?php
echo parse_url_tag("u:account#credit|"."".""); 
?>">收支明细</a></li>
				
			</ul>
		</div>
		
		<div class="blank"></div>		
		<?php echo $this->fetch('inc/money_box.html'); ?> 		

		<div class="full">
		<?php if ($this->_var['deal_list']): ?>
		<table class="data-table">
			<tr>
				<th>项目名称</th>
				<th width="50">状态</th>
				<th width="200">操作</th>
			</tr>
			<?php $_from = $this->_var['deal_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'deal_item');if (count($_from)):
    foreach ($_from AS $this->_var['deal_item']):
?>
			<tr>
				<td class="deal_name">
					<div><a href="<?php
echo parse_url_tag("u:deal#show|"."id=".$this->_var['deal_item']['id']."".""); 
?>" target="_blank" title="<?php echo $this->_var['deal_item']['name']; ?>"><img src="<?php 
$k = array (
  'name' => 'get_spec_image',
  'v' => $this->_var['deal_item']['image'],
  'w' => '50',
  'h' => '50',
  'g' => '1',
);
echo $k['name']($k['v'],$k['w'],$k['h'],$k['g']);
?>"  alt="<?php echo $this->_var['deal_item']['name']; ?>"/></a></div>	
					<div><a href="<?php
echo parse_url_tag("u:deal#show|"."id=".$this->_var['deal_item']['id']."".""); 
?>" target="_blank" title="<?php echo $this->_var['deal_item']['name']; ?>"><?php 
$k = array (
  'name' => 'msubstr',
  'v' => $this->_var['deal_item']['name'],
  'b' => '0',
  'e' => '25',
);
echo $k['name']($k['v'],$k['b'],$k['e']);
?></a></div>	
				</td>
				<td>
					<?php if ($this->_var['deal_item']['is_effect'] == 0): ?>
					准备中
					<?php else: ?>
						<?php if ($this->_var['deal_item']['is_success'] == 1): ?>
							<?php if ($this->_var['deal_item']['begin_time'] > $this->_var['now']): ?>未开始<?php endif; ?>
							<?php if ($this->_var['deal_item']['end_time'] < $this->_var['now'] && $this->_var['deal_item']['end_time'] != 0): ?>已成功<?php endif; ?>
							<?php if ($this->_var['deal_item']['begin_time'] < $this->_var['now'] && ( $this->_var['deal_item']['end_time'] > $this->_var['now'] || $this->_var['deal_item']['end_time'] == 0 )): ?>已成功<?php endif; ?>
						<?php else: ?>
							<?php if ($this->_var['deal_item']['begin_time'] > $this->_var['now']): ?>未开始<?php endif; ?>
							<?php if ($this->_var['deal_item']['end_time'] < $this->_var['now'] && $this->_var['deal_item']['end_time'] != 0): ?>未成功<?php endif; ?>
							<?php if ($this->_var['deal_item']['begin_time'] < $this->_var['now'] && ( $this->_var['deal_item']['end_time'] > $this->_var['now'] || $this->_var['deal_item']['end_time'] == 0 )): ?>进行中<?php endif; ?>
						<?php endif; ?>
					<?php endif; ?>
				</td>
				<td>
					<?php if ($this->_var['deal_item']['is_effect'] == 0): ?>
						<a href="<?php
echo parse_url_tag("u:project#edit|"."id=".$this->_var['deal_item']['id']."".""); 
?>">编辑</a>
						<a href="<?php
echo parse_url_tag("u:project#del|"."id=".$this->_var['deal_item']['id']."".""); 
?>" class="del_deal">删除</a>
					<?php else: ?>
						<a href="<?php
echo parse_url_tag("u:deal#update|"."id=".$this->_var['deal_item']['id']."".""); 
?>">项目日志</a>
						<?php if ($this->_var['deal_item']['is_success'] == 1): ?>
							<a href="<?php
echo parse_url_tag("u:account#support|"."id=".$this->_var['deal_item']['id']."".""); 
?>">支持记录</a>
							<a href="<?php
echo parse_url_tag("u:account#paid|"."id=".$this->_var['deal_item']['id']."".""); 
?>">放款记录</a>
																
						<?php endif; ?>
					<?php endif; ?>
				</td>
			</tr>
			<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
		</table>
		
		<?php else: ?>
		<div class="empty_tip">
			从过创建过任何项目 <a href="<?php
echo parse_url_tag("u:project#add|"."".""); 
?>" class="linkgreen">立即创建项目</a>
		</div>
		<?php endif; ?>
		
		
		</div>
		<div class="blank"></div>
		<div class="pages"><?php echo $this->_var['pages']; ?></div>
		<div class="blank"></div>
		
	</div>
</div>
<div class="blank"></div>
<?php echo $this->fetch('inc/footer.html'); ?> 