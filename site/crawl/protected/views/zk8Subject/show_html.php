<?php
/* @var $this Zk8SubjectController */
/* @var $model Zk8Subject */

$this->breadcrumbs=array(
	'Zk8 Subjects'=>array('index'),
	$model->id,
);

//$search_str = "/media/ggg/bak1/git/github_klggg/site/crawl/protected/commands/../runtime/crawl/zk8/png/";
//$replace_str = "/resolve_png/";

$search_str = "src='";
$replace_str = "src='/zk8/";

$model->setWebPath($model);

//$model->question = $model->getWebPath($model->question);
//$model->answer = $model->getWebPath($model->answer);
//$model->hint = $model->getWebPath($model->resolve);
//$model->resolve = $model->getWebPath($model->resolve);

//<img src="/media/ggg/bak1/git/github_klggg/site/crawl/protected/commands/../runtime/crawl/zk8/png/4a/4ab0c7ed99b4af8cc7c5734943b282eb.png" alt="">



?>

<h3 ><?=$model->chapter?></h3>

<h4>问题： <?=$model->question?></h4>

<p><strong>答案：</strong><?=$model->answer?></p>
<p><strong>窍门：</strong><?=$model->hint?></p>
<p><strong>解析：</strong><?=$model->resolve?></p>


<?php

 /*$this->widget('zii.widgets.CDetailView', array(
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
)); 
*/

?>
