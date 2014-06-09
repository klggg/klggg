<?php
/* @var $this Zk8SubjectController */
/* @var $model Zk8Subject */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'zk8-subject-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'course_id'); ?>
		<?php echo $form->textField($model,'course_id'); ?>
		<?php echo $form->error($model,'course_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'subject_id'); ?>
		<?php echo $form->textField($model,'subject_id'); ?>
		<?php echo $form->error($model,'subject_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'page_numb'); ?>
		<?php echo $form->textField($model,'page_numb'); ?>
		<?php echo $form->error($model,'page_numb'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'chapter'); ?>
		<?php echo $form->textField($model,'chapter',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'chapter'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'question'); ?>
		<?php echo $form->textField($model,'question',array('size'=>60,'maxlength'=>1000)); ?>
		<?php echo $form->error($model,'question'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'answer'); ?>
		<?php echo $form->textArea($model,'answer',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'answer'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'hint'); ?>
		<?php echo $form->textArea($model,'hint',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'hint'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'resolve'); ?>
		<?php echo $form->textArea($model,'resolve',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'resolve'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->textField($model,'status'); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'category'); ?>
		<?php echo $form->textField($model,'category'); ?>
		<?php echo $form->error($model,'category'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'create_time'); ?>
		<?php echo $form->textField($model,'create_time',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'create_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'update_time'); ?>
		<?php echo $form->textField($model,'update_time',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'update_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'user'); ?>
		<?php echo $form->textField($model,'user',array('size'=>60,'maxlength'=>60)); ?>
		<?php echo $form->error($model,'user'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'from_url'); ?>
		<?php echo $form->textField($model,'from_url',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'from_url'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'mark'); ?>
		<?php echo $form->textField($model,'mark',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'mark'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'zk8_subjectcol'); ?>
		<?php echo $form->textField($model,'zk8_subjectcol',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'zk8_subjectcol'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->