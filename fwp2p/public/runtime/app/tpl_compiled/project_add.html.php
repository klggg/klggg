<?php echo $this->fetch('inc/header.html'); ?> 
<script type="text/javascript">
	var ROOT = '<?php echo $this->_var['APP_ROOT']; ?>/keupload.php';
</script>
<?php
$this->_var['dpagejs'][] = $this->_var['TMPL_REAL']."/js/deal_publish.js";
$this->_var['dcpagejs'][] = $this->_var['TMPL_REAL']."/js/deal_publish.js";
$this->_var['dpagejs'][] = $this->_var['TMPL_REAL']."/js/upload_deal_image.js";
$this->_var['dcpagejs'][] = $this->_var['TMPL_REAL']."/js/upload_deal_image.js";
$this->_var['dpagejs'][] = $this->_var['TMPL_REAL']."/js/ajaxupload.js";
$this->_var['dpagejs'][] = $this->_var['TMPL_REAL']."/js/switch_city.js";
$this->_var['dcpagejs'][] = $this->_var['TMPL_REAL']."/js/switch_city.js";
$this->_var['dpagejs'][] = APP_ROOT_PATH."/system/region.js";
$this->_var['dcpagejs'][] = APP_ROOT_PATH."/system/region.js";
?>
<script type="text/javascript" src="<?php 
$k = array (
  'name' => 'parse_script',
  'v' => $this->_var['dpagejs'],
  'c' => $this->_var['dcpagejs'],
);
echo $k['name']($k['v'],$k['c']);
?>"></script>
<script type='text/javascript' src='<?php echo $this->_var['APP_ROOT']; ?>/admin/public/kindeditor/kindeditor.js'></script>
<div class="blank"></div>

<div class="shadow_bg">
	<div class="wrap white_box">

			<div class="page_title">
			发起项目
			</div>
			<div class="switch_nav">
				<ul>
					<li class="current"><a href="#">项目介绍</a></li>					
				</ul>
			</div>
			
			<div class="public_left">
				<form id="project_form" action="<?php
echo parse_url_tag("u:project#save|"."".""); 
?>" method="post">									
				<div class="form_row">
					<div class="blank15"></div>
					<label class="title w100">项目分类:</label>
					<div class="f_l cate_list">
						<?php $_from = $this->_var['cate_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'cate_item');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['cate_item']):
?>
						<span rel="<?php echo $this->_var['cate_item']['id']; ?>"><?php echo $this->_var['cate_item']['name']; ?></span>
						<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
						<input type="hidden" name="cate_id" value="" />
					</div>
					<div class="blank15"></div>
				</div>
				<div class="form_row">
					<label class="title w100">项目名称:</label>
					<input type="text" value="" class="textbox" name="name" />
					<div class="blank1"></div>
					<div class="form_tip">不超过25个字</div>
					<div class="blank15"></div>
				</div>

				<div class="form_row">
					<label class="title w100">发起地点:</label>
					<div class="select_box">
					<select name="province">				
					<option value="" rel="0">请选择省份</option>			
					<?php $_from = $this->_var['region_lv2']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'region');if (count($_from)):
    foreach ($_from AS $this->_var['region']):
?>
						<option value="<?php echo $this->_var['region']['name']; ?>" rel="<?php echo $this->_var['region']['id']; ?>" <?php if ($this->_var['region']['selected']): ?>selected="selected"<?php endif; ?>><?php echo $this->_var['region']['name']; ?></option>
					<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
					</select>
					
					<select name="city">				
					<option value="" rel="0">请选择城市</option>
					<?php $_from = $this->_var['region_lv3']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'region');if (count($_from)):
    foreach ($_from AS $this->_var['region']):
?>
						<option value="<?php echo $this->_var['region']['name']; ?>" rel="<?php echo $this->_var['region']['id']; ?>" <?php if ($this->_var['region']['selected']): ?>selected="selected"<?php endif; ?>><?php echo $this->_var['region']['name']; ?></option>
					<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
					</select>
					</div>
					<div class="blank15"></div>
				</div>
				<div class="form_row">
					<label class="title w100">简要说明:</label>
					<textarea name="brief" class="textarea"></textarea>
					<div class="blank1"></div>
					<div class="form_tip">不超过75个字，简要描述一下你的项目</div>
					<div class="blank15"></div>
				</div>
				
				<div class="form_row">
					<label class="title w100">封面图片:</label>
					<div class="f_l">
						<label class="fileupload" onclick="upd_file(this,'image_file');">
						<input type="file" class="filebox" name="image_file" id="image_file"/>						
						</label>
						<label class="fileuploading hide" ></label>
						
					</div>
					<div class="blank15"></div>
				</div>
				<div class="form_row">
					<label class="title w100">视频地址:</label>
					<input type="text" value="" class="textbox"  name="vedio" />
					<div class="blank1"></div>
					<div class="form_tip">我们非常建议你提交一段几分钟的宣传视频。 支持土豆，优酷，酷六。</div>
					<div class="blank15"></div>
				</div>
				<div class="form_row">
					<label class="title w100">详细说明:</label>
					<div class="ke_form f_l">
					<?php 
$k = array (
  'name' => 'show_ke_form',
  'text_name' => 'descript',
  'width' => '470',
  'height' => '300',
  'ctn' => '',
);
echo $k['name']($k['text_name'],$k['width'],$k['height'],$k['ctn']);
?>		
					</div>
					<div class="blank15"></div>
				</div>
				<div class="form_row">
					<label class="title w100">目标金额:</label>
					<input type="text" value="" class="textbox" name="limit_price" style="width:100px;" /> <label class="tip_box">元</label>
					<div class="blank15"></div>
				</div>
				<div class="form_row">
					<label class="title w100">上线天数:</label>
					<input type="text" value="" class="textbox" name="deal_days" style="width:100px;" /> <label class="tip_box">天</label>
					<div class="blank15"></div>
				</div>
				<div class="form_row">
					<label class="title w100">常见问题:<br /> <a href="javascript:void(0);" id="add_faq" class="linkgreen">添加</a></label>
					<div style="float:left; width:500px;" id="faq_list">
						<?php echo $this->fetch('inc/deal_faq_item.html'); ?>					
					</div>
					<div class="blank15"></div>
				</div>
				<div class="submit_btn_row">
					<input type="hidden" name="image" value="<?php echo $this->_var['deal_image']['url']; ?>" />
					<input type="hidden" name="savenext" value="0" />
					<div class="ui-button gray" rel="gray" id="savenow">
						<div>
							<span>先保存一下</span>
						</div>
					</div>
					<div class="ui-button green" rel="green" id="savenext" style="margin-left:5px;">
						<div>
							<span>下一步</span>
						</div>
					</div>
					<input type="hidden" value="1" name="ajax" />
					<input type="hidden" name="id" value="0" />
					<div class="blank15"></div>
				</div>
				
			</form>
				
			</div>
			
			<div class="public_right">
				<div class="deal_preview_title">编辑预览</div>
				<div class="blank"></div>
				<div class="deal_item_box">
					<div class="deal_content_box">
					<img id="image" src="<?php if ($this->_var['deal_image']['thumb_url'] == ''): ?><?php echo $this->_var['TMPL']; ?>/images/empty_thumb.gif<?php else: ?><?php echo $this->_var['deal_image']['thumb_url']; ?><?php endif; ?>" />
					<div class="blank"></div>
					<a href="#" class="deal_title" id="deal_title">项目的名称</a>
					<div class="blank"></div>
					<?php echo $this->_var['user_info']['user_name']; ?>&nbsp;&nbsp;(<span id="province">省份</span><span id="city">城市</span>)
					<div class="blank"></div>
					<div id="deal_brief">简要说明</div>
					</div>
					<div class="deal_item_dash"></div>
					<div class="deal_content_box">
						<div class="ui-progress">
							<span style="width:100%;"></span>
						</div>
						<div class="blank"></div>
						<div class="div3"><span class="num">100%</span><span class="til">达到</span></div>
						<div class="div3"><span class="num" ><font id="price">0</font>元</span><span class="til">金额</span></div>
						<div class="div3"><span class="num"><font id="deal_days">0</font>天</span><span class="til">剩余时间</span></div>
						<div class="blank1"></div>
					</div>
				</div>
				
				
				
			</div>
			<div class="blank"></div>
			
	
	</div>
</div>

<div class="blank"></div>
<?php echo $this->fetch('inc/footer.html'); ?> 


