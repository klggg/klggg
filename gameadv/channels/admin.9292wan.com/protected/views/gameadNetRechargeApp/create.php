<?php
$this->breadcrumbs=array(
	'上网银直充的游戏'=>array('index'),
	'创建',
);

$this->menu=array(
	array('label'=>'列表 ', 'url'=>array('index')),
);
?>

<h1>创建</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>