<?php
/* @var $this LangController */
/* @var $model Lang */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'lang-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>32,'maxlength'=>32)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'active'); ?>
		<?php echo $form->textField($model,'active'); ?>
		<?php echo $form->error($model,'active'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'iso_code'); ?>
		<?php echo $form->textField($model,'iso_code',array('size'=>2,'maxlength'=>2)); ?>
		<?php echo $form->error($model,'iso_code'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'language_code'); ?>
		<?php echo $form->textField($model,'language_code',array('size'=>5,'maxlength'=>5)); ?>
		<?php echo $form->error($model,'language_code'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'date_format_lite'); ?>
		<?php echo $form->textField($model,'date_format_lite',array('size'=>32,'maxlength'=>32)); ?>
		<?php echo $form->error($model,'date_format_lite'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'date_format_full'); ?>
		<?php echo $form->textField($model,'date_format_full',array('size'=>32,'maxlength'=>32)); ?>
		<?php echo $form->error($model,'date_format_full'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'is_rtl'); ?>
		<?php echo $form->textField($model,'is_rtl'); ?>
		<?php echo $form->error($model,'is_rtl'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->