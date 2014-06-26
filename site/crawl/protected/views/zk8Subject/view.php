<?php
/* @var $this Zk8SubjectController */
/* @var $model Zk8Subject */

$this->breadcrumbs=array(
	'Zk8 Subjects'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Zk8Subject', 'url'=>array('index')),
	array('label'=>'Create Zk8Subject', 'url'=>array('create')),
	array('label'=>'Update Zk8Subject', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Zk8Subject', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Zk8Subject', 'url'=>array('admin')),
	array('label'=>'查看该题', 'url'=>array('showHtml','id'=>$model->id)),
	array('label'=>'查看课程', 'url'=>array('chapterList','id'=>$model->course_id)),
);
?>
                    
<h1>View Zk8Subject #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'course_id',
		'subject_id',
		'page_numb',
		'chapter',
		'question',
		'answer',
		'hint',
		'resolve',
		'status',
		'category',
		'create_time',
		'update_time',
		'user',
		'from_url',
		'mark',
	),
)); ?>
