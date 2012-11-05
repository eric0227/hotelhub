<?php
/* @var $this OrderStateController */
/* @var $model OrderState */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'order-state-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'invoice'); ?>
		<?php echo $form->textField($model,'invoice'); ?>
		<?php echo $form->error($model,'invoice'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'send_email'); ?>
		<?php echo $form->textField($model,'send_email'); ?>
		<?php echo $form->error($model,'send_email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'color'); ?>
		<?php echo $form->textField($model,'color',array('size'=>32,'maxlength'=>32)); ?>
		<?php echo $form->error($model,'color'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'unremovable'); ?>
		<?php echo $form->textField($model,'unremovable'); ?>
		<?php echo $form->error($model,'unremovable'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'hidden'); ?>
		<?php echo $form->textField($model,'hidden'); ?>
		<?php echo $form->error($model,'hidden'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'logable'); ?>
		<?php echo $form->textField($model,'logable'); ?>
		<?php echo $form->error($model,'logable'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'delivery'); ?>
		<?php echo $form->textField($model,'delivery'); ?>
		<?php echo $form->error($model,'delivery'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>64)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'template'); ?>
		<?php echo $form->textField($model,'template',array('size'=>60,'maxlength'=>64)); ?>
		<?php echo $form->error($model,'template'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->