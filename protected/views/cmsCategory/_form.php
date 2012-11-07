<?php
/* @var $this CmsCategoryController */
/* @var $model CmsCategory */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'cms-category-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'id_parent'); ?>
		<?php echo $form->textField($model,'id_parent',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'id_parent'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'level_depth'); ?>
		<?php echo $form->textField($model,'level_depth'); ?>
		<?php echo $form->error($model,'level_depth'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'active'); ?>
		<?php echo $form->textField($model,'active'); ?>
		<?php echo $form->error($model,'active'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'date_add'); ?>
		<?php echo $form->textField($model,'date_add'); ?>
		<?php echo $form->error($model,'date_add'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'date_upd'); ?>
		<?php echo $form->textField($model,'date_upd'); ?>
		<?php echo $form->error($model,'date_upd'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'position'); ?>
		<?php echo $form->textField($model,'position',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'position'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->