<?php
/* @var $this OrderHistoryController */
/* @var $model OrderHistory */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'order-history-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

<?php /* ?>
	<div class="row">
		<?php echo $form->labelEx($model,'id_user'); ?>
		<?php echo $form->textField($model,'id_user',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'id_user'); ?>
	</div>
<?php */ ?>

	<div class="row">
		<?php echo $form->labelEx($model,'id_order'); ?>
		<?php 
			//echo $form->textField($model,'id_order',array('size'=>10,'maxlength'=>10)); 
			echo $form->dropDownList($model, 'id_order', Order::items());
		?>
		<?php echo $form->error($model,'id_order'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_order_state'); ?>
		<?php 
			// echo $form->textField($model,'id_order_state',array('size'=>10,'maxlength'=>10));
			echo $form->dropDownList($model, 'id_order_state', OrderState::items());
		?>
		<?php echo $form->error($model,'id_order_state'); ?>
	</div>
	
<?php /* ?>
	<div class="row">
		<?php echo $form->labelEx($model,'date_add'); ?>
		<?php echo $form->textField($model,'date_add'); ?>
		<?php echo $form->error($model,'date_add'); ?>
	</div>
<?php */ ?>

	<div class="row">
		<?php echo $form->labelEx($model,'comment'); ?>
		<?php echo $form->textField($model,'comment',array('size'=>60,'maxlength'=>300)); ?>
		<?php echo $form->error($model,'comment'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->