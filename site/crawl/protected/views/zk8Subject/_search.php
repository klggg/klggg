<?php
/* @var $this Zk8SubjectController */
/* @var $model Zk8Subject */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'course_id'); ?>
		<?php echo $form->textField($model,'course_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'subject_id'); ?>
		<?php echo $form->textField($model,'subject_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'page_numb'); ?>
		<?php echo $form->textField($model,'page_numb'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'chapter'); ?>
		<?php echo $form->textField($model,'chapter',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'question'); ?>
		<?php echo $form->textField($model,'question',array('size'=>60,'maxlength'=>1000)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'answer'); ?>
		<?php echo $form->textArea($model,'answer',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'hint'); ?>
		<?php echo $form->textArea($model,'hint',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'resolve'); ?>
		<?php echo $form->textArea($model,'resolve',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'status'); ?>
		<?php echo $form->textField($model,'status'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'category'); ?>
		<?php echo $form->textField($model,'category'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'create_time'); ?>
		<?php echo $form->textField($model,'create_time',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'update_time'); ?>
		<?php echo $form->textField($model,'update_time',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'user'); ?>
		<?php echo $form->textField($model,'user',array('size'=>60,'maxlength'=>60)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'from_url'); ?>
		<?php echo $form->textField($model,'from_url',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'mark'); ?>
		<?php echo $form->textField($model,'mark',array('size'=>50,'maxlength'=>50)); ?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->