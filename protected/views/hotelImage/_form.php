<?php
/* @var $this HotelImageController */
/* @var $model HotelImage */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'hotel-image-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'id_image'); ?>
		<?php echo $form->textField($model,'id_image',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'id_image'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_hotel'); ?>
		<?php echo $form->textField($model,'id_hotel',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'id_hotel'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'position'); ?>
		<?php echo $form->textField($model,'position'); ?>
		<?php echo $form->error($model,'position'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cover'); ?>
		<?php echo $form->textField($model,'cover'); ?>
		<?php echo $form->error($model,'cover'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->