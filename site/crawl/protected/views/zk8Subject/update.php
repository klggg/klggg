<?php
/* @var $this Zk8SubjectController */
/* @var $model Zk8Subject */

$this->breadcrumbs=array(
	'Zk8 Subjects'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Zk8Subject', 'url'=>array('index')),
	array('label'=>'Create Zk8Subject', 'url'=>array('create')),
	array('label'=>'View Zk8Subject', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Zk8Subject', 'url'=>array('admin')),
	array('label'=>'查看该题', 'url'=>array('showHtml','id'=>$model->id)),
	array('label'=>'查看课程', 'url'=>array('chapterList','id'=>$model->id)),
);
?>

<h1>Update Zk8Subject <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>