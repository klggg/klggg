<?php
/* @var $this Zk8SubjectController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Zk8 Subjects',
);

$this->menu=array(
	array('label'=>'Create Zk8Subject', 'url'=>array('create')),
	array('label'=>'Manage Zk8Subject', 'url'=>array('admin')),
);
?>

<h1>Zk8 Subjects</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
