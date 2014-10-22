 <?php
$this->breadcrumbs=array(
	'应用来源',
);

$this->menu=array(
	array('label'=>'创建', 'url'=>array('create')),
);
?>

<h1>应用来源</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
