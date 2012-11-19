<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'order-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>
	
	<div>
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

	<?php echo $form->textFieldRow($model,'id_lang',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'id_user',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'id_currency',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'id_address_delivery',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'id_address_invoice',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'secure_key',array('class'=>'span5','maxlength'=>32)); ?>

	<?php echo $form->textFieldRow($model,'payment',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'conversion_rate',array('class'=>'span5','maxlength'=>13)); ?>

	<?php echo $form->textFieldRow($model,'gift',array('class'=>'span5')); ?>

	<?php echo $form->textAreaRow($model,'gift_message',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textFieldRow($model,'total_price',array('class'=>'span5','maxlength'=>17)); ?>

	<?php echo $form->textFieldRow($model,'total_agent_price',array('class'=>'span5','maxlength'=>17)); ?>

	<?php echo $form->textFieldRow($model,'total_discount',array('class'=>'span5','maxlength'=>17)); ?>

	<?php echo $form->textFieldRow($model,'total_paid',array('class'=>'span5','maxlength'=>17)); ?>

	<?php echo $form->textFieldRow($model,'invoice_number',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'delivery_number',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'invoice_date',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'delivery_date',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'date_add',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'date_upd',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'on_agent',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
