<div class="faq_item">
<input type="text" value="<?php if ($this->_var['faq_item']['question'] != ''): ?><?php echo $this->_var['faq_item']['question']; ?><?php else: ?>请输入问题<?php endif; ?>" class="textbox" name="question[]" style="width:400px;" />
<span style="float:left; padding-left:10px; line-height:28px; "><a href="javascript:void(0);" onclick='del_faq(this);' class="linkgreen">删除</a></span>
<div class="blank5"></div>
<textarea name="answer[]" class="textarea"><?php if ($this->_var['faq_item']['answer'] != ''): ?><?php echo $this->_var['faq_item']['answer']; ?><?php else: ?>请输入答案<?php endif; ?></textarea>
<div class="blank"></div>
</div>	