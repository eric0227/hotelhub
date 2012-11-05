<?php
/* @var $this CartController */
/* @var $model Cart */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'cart-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php 
		echo $form->dropDownList($model, 'id_user', User::items(User::CUSTOMER));
		echo CHtml::submitButton('Search');
		echo $form->error($model,'id_user');
	?>
	
	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'id_address_delivery'); ?>
		<?php echo $form->textField($model,'id_address_delivery',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'id_address_delivery'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_address_invoice'); ?>
		<?php echo $form->textField($model,'id_address_invoice',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'id_address_invoice'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_currency'); ?>
		<?php 
			//echo $form->textField($model,'id_currency',array('size'=>10,'maxlength'=>10)); 
			echo $form->dropDownList($model, 'id_currency', Currency::items());
		?>
		<?php echo $form->error($model,'id_currency'); ?>
	</div>

	

	<div class="row">
		<?php echo $form->labelEx($model,'secure_key'); ?>
		<?php echo $form->textField($model,'secure_key',array('size'=>32,'maxlength'=>32)); ?>
		<?php echo $form->error($model,'secure_key'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'recyclable'); ?>
		<?php echo $form->textField($model,'recyclable'); ?>
		<?php echo $form->error($model,'recyclable'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'gift'); ?>
		<?php echo $form->textField($model,'gift'); ?>
		<?php echo $form->error($model,'gift'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'gift_message'); ?>
		<?php echo $form->textArea($model,'gift_message',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'gift_message'); ?>
	</div>

<?php /*?>
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
<?php */ ?>
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->