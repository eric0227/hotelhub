<?php
/* @var $this AttributeController */
/* @var $model Attribute */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'attribute-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'id_attribute_group'); ?>
		<?php 
			//echo $form->textField($model,'id_attribute_group',array('size'=>10,'maxlength'=>10));
			echo $form->dropDownList($model,'id_attribute_group', AttributeGroup::items());
		?>
		<?php echo $form->error($model,'id_attribute_group'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'attr_type'); ?>
		<?php 
			// echo $form->textArea($model,'attr_type',array('rows'=>6, 'cols'=>50));
			echo $form->dropDownList($model,'attr_type', Attribute::$TYPE);
		?>
		<?php echo $form->error($model,'attr_type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'active'); ?>
		<?php echo $form->textField($model,'active'); ?>
		<?php echo $form->error($model,'active'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'position'); ?>
		<?php echo $form->textField($model,'position'); ?>
		<?php echo $form->error($model,'position'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->