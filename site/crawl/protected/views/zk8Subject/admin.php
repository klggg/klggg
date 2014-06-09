<?php
/* @var $this Zk8SubjectController */
/* @var $model Zk8Subject */

$this->breadcrumbs=array(
	'Zk8 Subjects'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Zk8Subject', 'url'=>array('index')),
	array('label'=>'Create Zk8Subject', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#zk8-subject-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Zk8 Subjects</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'zk8-subject-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'course_id',
		'subject_id',
		'page_numb',
		'chapter',
		'question',
		/*
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
		'zk8_subjectcol',
		*/
		array(
			'class'=>'CButtonColumn',
               'template'=>'{view}  {update}  {delete} {showHtml} {chapterList}',
               'buttons'=>array(
                    'showHtml' => array(
                         'label'=>'查看该题 ',
                         'url'=>' Yii::app()->createUrl("zk8Subject/showHtml", array("id" => $data->id)) ',
                         'visible'=>'1',
                    )
                    ,'chapterList' => array(
                         'label'=>'查看课程',
                         'url'=>' Yii::app()->createUrl("zk8Subject/chapterList", array("id" => $data->id)) ',
                         'visible'=>'1',
                    )                    
                    
                   )

			
		),
	),
)); ?>
