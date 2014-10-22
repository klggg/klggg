<?php echo $this->fetch('inc/header.html'); ?> 
<?php

$this->_var['dpagecss'][] = $this->_var['TMPL_REAL']."/css/account.css";
?>
<link rel="stylesheet" type="text/css" href="<?php 
$k = array (
  'name' => 'parse_css',
  'v' => $this->_var['dpagecss'],
);
echo $k['name']($k['v']);
?>" />

<div class="blank"></div>

<div class="shadow_bg">
	<div class="wrap white_box"">
		<div class="page_title">
			收支明细
		</div>
		<div class="switch_nav">
			<ul>
				<li><a href="<?php
echo parse_url_tag("u:account#index|"."".""); 
?>">支持的项目</a></li>
				<li><a href="<?php
echo parse_url_tag("u:account#project|"."".""); 
?>">我的项目</a></li>
				<li><a href="<?php
echo parse_url_tag("u:account#focus|"."".""); 
?>">关注的项目</a></li>
				<li class="current"><a href="<?php
echo parse_url_tag("u:account#credit|"."".""); 
?>">收支明细</a></li>
				
			</ul>
		</div>
		
		<div class="blank"></div>
		
		<?php echo $this->fetch('inc/money_box.html'); ?> 
		
		<div class="full">
		<?php if ($this->_var['log_list']): ?>
		<table class="data-table">
			<tr>
				<th>日志内容</th>
				<th>类型</th>
				<th width="120">金额</th>
				<th width="120">时间</th>

			</tr>
			<?php $_from = $this->_var['log_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'log_item');if (count($_from)):
    foreach ($_from AS $this->_var['log_item']):
?>
			<tr>
				<td class="deal_name"><?php echo $this->_var['log_item']['log_info']; ?></td>
				<td><?php if ($this->_var['log_item']['money'] > 0): ?>增加<?php else: ?>减少<?php endif; ?></td>
				<td>
					<?php 
						echo format_price(abs($this->_var['log_item']['money']));
					?>
				</td>
				<td><?php 
$k = array (
  'name' => 'to_date',
  'v' => $this->_var['log_item']['log_time'],
);
echo $k['name']($k['v']);
?></td>
			</tr>
			<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
		</table>
		
		<?php else: ?>
		<div class="empty_tip">
			还没有资金记录
		</div>
		<?php endif; ?>
		
		</div>
		<div class="blank"></div>
		<div class="pages"><?php echo $this->_var['pages']; ?></div>
		<div class="blank"></div>
		
		<div class="blank"></div>
		
	</div>
</div>
<div class="blank"></div>
<?php echo $this->fetch('inc/footer.html'); ?> 