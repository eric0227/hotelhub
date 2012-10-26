<?php
/* @var $this ProductImageController */
/* @var $model ProductImage */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'product-image-form',
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
		<?php echo $form->labelEx($model,'id_product'); ?>
		<?php echo $form->textField($model,'id_product',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'id_product'); ?>
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