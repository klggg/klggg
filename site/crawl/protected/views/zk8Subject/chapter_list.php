<?php
/* @var $this Zk8SubjectController */
/* @var $model Zk8Subject */

$this->breadcrumbs=array(
	'Zk8 Subjects'=>array('index'),
	$model->id,
);

$courses = Zk8Subject::$fieldListMap['courses'];
if(isset($courses[$model->course_id])){
	echo '<h2 align="center">'.$courses[$model->course_id].'</h2>';
}


?>


<?php
$tmp_i = 0;
$prev_chapter = '';
foreach ( $records as  $record ) {

$model->setWebPath($record);


//<img src="/media/ggg/bak1/git/github_klggg/site/crawl/protected/commands/../runtime/crawl/zk8/png/4a/4ab0c7ed99b4af8cc7c5734943b282eb.png" alt="">

if($prev_chapter != $record->chapter)
{
	echo '<h3>'.$record->chapter.'</h3>';
	$prev_chapter = $record->chapter;
}
       
?>
<h4><?php echo $tmp_i+1 ?> 问题： <?=$record->question?></h4>

<p><strong>答案：</strong><?=$record->answer?></p>

<?php
	if(!empty($record->hint))
	{
		echo "<p><strong>窍门：</strong>{$record->hint}</p>";
	}
	if(!empty($record->resolve))
	{
		echo "<p><strong>解析：</strong>{$record->resolve}</p>";
	}
$tmp_i++;
echo '<hr />';
}
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
