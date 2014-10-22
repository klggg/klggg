<?php $this->pageTitle=Yii::app()->name; ?>

<?php

	$userInfo = Administrator::getUserInfo();
    
?>
hi <?=$userInfo['user_name']?> 
<h1>欢迎进入<i> <?php echo CHtml::encode(Yii::app()->name); ?></i></h1>
<br/>


