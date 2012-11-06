<?php
/* @var $this OrderController */
/* @var $model Order */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'order-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>
	
	<div class="row">
	<?php echo $form->labelEx($model,'id_cart'); ?>
	<?php 
		// echo $form->textField($model,'id_cart',array('size'=>10,'maxlength'=>10)); 
		
		$cartModels = Cart::model()->findAll('on_order=:on_order', array('on_order'=>'0'));
		$cartItems = CHtml::listData($cartModels, 'id_cart', 'id_cart');
		echo $form->dropDownList($model, 'id_cart', $cartItems);
		echo CHtml::submitButton('Process');
	?>
	<?php echo $form->error($model,'id_cart'); ?>
	</div>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'id_lang'); ?>
		<?php echo $form->textField($model,'id_lang',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'id_lang'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_user'); ?>
		<?php echo $form->textField($model,'id_user',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'id_user'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_currency'); ?>
		<?php echo $form->textField($model,'id_currency',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'id_currency'); ?>
	</div>

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
		<?php echo $form->labelEx($model,'secure_key'); ?>
		<?php echo $form->textField($model,'secure_key',array('size'=>32,'maxlength'=>32)); ?>
		<?php echo $form->error($model,'secure_key'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'payment'); ?>
		<?php echo $form->textField($model,'payment',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'payment'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'conversion_rate'); ?>
		<?php echo $form->textField($model,'conversion_rate',array('size'=>13,'maxlength'=>13)); ?>
		<?php echo $form->error($model,'conversion_rate'); ?>
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

	<div class="row">
		<?php echo $form->labelEx($model,'total_price'); ?>
		<?php echo $form->textField($model,'total_price',array('size'=>17,'maxlength'=>17)); ?>
		<?php echo $form->error($model,'total_price'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'total_agent_price'); ?>
		<?php echo $form->textField($model,'total_agent_price',array('size'=>17,'maxlength'=>17)); ?>
		<?php echo $form->error($model,'total_agent_price'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'total_discount'); ?>
		<?php echo $form->textField($model,'total_discount',array('size'=>17,'maxlength'=>17)); ?>
		<?php echo $form->error($model,'total_discount'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'total_paid'); ?>
		<?php echo $form->textField($model,'total_paid',array('size'=>17,'maxlength'=>17)); ?>
		<?php echo $form->error($model,'total_paid'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'invoice_number'); ?>
		<?php echo $form->textField($model,'invoice_number',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'invoice_number'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'delivery_number'); ?>
		<?php echo $form->textField($model,'delivery_number',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'delivery_number'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'invoice_date'); ?>
		<?php echo $form->textField($model,'invoice_date'); ?>
		<?php echo $form->error($model,'invoice_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'delivery_date'); ?>
		<?php echo $form->textField($model,'delivery_date'); ?>
		<?php echo $form->error($model,'delivery_date'); ?>
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

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->