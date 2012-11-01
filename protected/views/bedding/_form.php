<?php
/* @var $this BeddingController */
/* @var $model Bedding */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'bedding-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'id_room'); ?>
		<?php 
			// echo $form->textField($model,'id_room',array('size'=>10,'maxlength'=>10)); 
			echo $form->dropDownList($model, 'id_room', Room::items());
		?>
		<?php echo $form->error($model,'id_room'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'gest_num'); ?>
		<?php echo $form->textField($model,'gest_num',array('size'=>2,'maxlength'=>2)); ?>
		<?php echo $form->error($model,'gest_num'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'single_num'); ?>
		<?php echo $form->textField($model,'single_num',array('size'=>2,'maxlength'=>2)); ?>
		<?php echo $form->error($model,'single_num'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'double_num'); ?>
		<?php echo $form->textField($model,'double_num',array('size'=>2,'maxlength'=>2)); ?>
		<?php echo $form->error($model,'double_num'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'beddig_desc'); ?>
		<?php echo $form->textField($model,'beddig_desc',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'beddig_desc'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'additional_cost'); ?>
		<?php echo $form->textField($model,'additional_cost',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'additional_cost'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cots_available'); ?>
		<?php echo $form->textField($model,'cots_available',array('size'=>2,'maxlength'=>2)); ?>
		<?php echo $form->error($model,'cots_available'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->