<?php echo $this->fetch('inc/header.html'); ?> 
<?php
$this->_var['dpagejs'][] = $this->_var['TMPL_REAL']."/js/focus_list.js";
$this->_var['dcpagejs'][] = $this->_var['TMPL_REAL']."/js/focus_list.js";
$this->_var['dpagecss'][] = $this->_var['TMPL_REAL']."/css/account.css";
$this->_var['dpagecss'][] = $this->_var['TMPL_REAL']."/css/focus.css";
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
			关注的项目
		</div>
		<div class="switch_nav">
			<ul>
				<li><a href="<?php
echo parse_url_tag("u:account#index|"."".""); 
?>">支持的项目</a></li>
				<li><a href="<?php
echo parse_url_tag("u:account#project|"."".""); 
?>">我的项目</a></li>
				<li class="current"><a href="<?php
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
		
		<div class="f_l">
		<ul class="tab-nav">
			<li <?php if ($this->_var['f'] == 0): ?>class="current"<?php endif; ?>><a href="<?php
echo parse_url_tag("u:account#focus|"."s=".$this->_var['s']."&f=0".""); 
?>">全部</a></li>
			<li <?php if ($this->_var['f'] == 1): ?>class="current"<?php endif; ?>><a href="<?php
echo parse_url_tag("u:account#focus|"."s=".$this->_var['s']."&f=1".""); 
?>">进行中</a></li>
			<li <?php if ($this->_var['f'] == 2): ?>class="current"<?php endif; ?>><a href="<?php
echo parse_url_tag("u:account#focus|"."s=".$this->_var['s']."&f=2".""); 
?>">成功的</a></li>
			<li <?php if ($this->_var['f'] == 3): ?>class="current"<?php endif; ?>><a href="<?php
echo parse_url_tag("u:account#focus|"."s=".$this->_var['s']."&f=3".""); 
?>">失败的</a></li>
		</ul>
		</div>
		<div class="blank"></div>
			
		<?php if ($this->_var['deal_list']): ?>
		<table class="data-table focus-table">
			<tr>
				<th>项目名称</th>
				<th width="100"><a href="<?php
echo parse_url_tag("u:account#focus|"."s=3&f=".$this->_var['f']."".""); 
?>" <?php if ($this->_var['s'] == 3): ?>class="current"<?php endif; ?> >获得支持</a></th>
				<th width="60"><a href="<?php
echo parse_url_tag("u:account#focus|"."s=1&f=".$this->_var['f']."".""); 
?>" <?php if ($this->_var['s'] == 1): ?>class="current"<?php endif; ?> >支持人数</a></th>
				<th width="60"><a href="<?php
echo parse_url_tag("u:account#focus|"."s=2&f=".$this->_var['f']."".""); 
?>" <?php if ($this->_var['s'] == 2): ?>class="current"<?php endif; ?> >达成目标</a></th>
				<th width="60"><a href="<?php
echo parse_url_tag("u:account#focus|"."s=0&f=".$this->_var['f']."".""); 
?>" <?php if ($this->_var['s'] == 0): ?>class="current"<?php endif; ?> >剩余时间</a></th>
				<th width="60">操作</th>
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
?>"  alt="<?php echo $this->_var['order_item']['deal_name']; ?>"/></a></div>	
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
					<?php 
$k = array (
  'name' => 'format_price',
  'v' => $this->_var['deal_item']['support_amount'],
);
echo $k['name']($k['v']);
?>
				</td>
				<td>
					<?php echo $this->_var['deal_item']['support_count']; ?>
				</td>
				<td>			
					<?php echo $this->_var['deal_item']['percent']; ?>%
				</td>
				<td>		
					<?php if ($this->_var['deal_item']['begin_time'] > $this->_var['now']): ?>未开始<?php endif; ?>
					<?php if ($this->_var['deal_item']['end_time'] < $this->_var['now'] && $this->_var['deal_item']['end_time'] != 0): ?>已结束<?php endif; ?>
					<?php if ($this->_var['deal_item']['begin_time'] < $this->_var['now'] && ( $this->_var['deal_item']['end_time'] > $this->_var['now'] || $this->_var['deal_item']['end_time'] == 0 )): ?>
					<?php echo $this->_var['deal_item']['remain_days']; ?>天
					<?php endif; ?>						
				</td>
				<td>
					<a href="<?php
echo parse_url_tag("u:account#del_focus|"."id=".$this->_var['deal_item']['fid']."".""); 
?>">取消关注</a>
				</td>
			</tr>
			<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
		</table>
		<?php else: ?>
		<div class="empty_tip">
			没有相关的记录
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