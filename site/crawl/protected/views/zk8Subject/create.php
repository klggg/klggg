<?php
/* @var $this Zk8SubjectController */
/* @var $model Zk8Subject */

$this->breadcrumbs=array(
	'Zk8 Subjects'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Zk8Subject', 'url'=>array('index')),
	array('label'=>'Manage Zk8Subject', 'url'=>array('admin')),
);
?>

<h1>Create Zk8Subject</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>