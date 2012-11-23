<?php
/* @var $this OrderItemController */
/* @var $model OrderItem */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'order-item-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'id_order'); ?>
		<?php echo $form->textField($model,'id_order',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'id_order'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_service'); ?>
		<?php echo $form->textField($model,'id_service',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'id_service'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_supplier'); ?>
		<?php echo $form->textField($model,'id_supplier',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'id_supplier'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_product'); ?>
		<?php echo $form->textField($model,'id_product',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'id_product'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_product_date'); ?>
		<?php echo $form->textField($model,'id_product_date',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'id_product_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'order_item_name'); ?>
		<?php echo $form->textField($model,'order_item_name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'order_item_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'product_name'); ?>
		<?php echo $form->textField($model,'product_name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'product_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'product_quantity'); ?>
		<?php echo $form->textField($model,'product_quantity',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'product_quantity'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'product_quantity_in_stock'); ?>
		<?php echo $form->textField($model,'product_quantity_in_stock'); ?>
		<?php echo $form->error($model,'product_quantity_in_stock'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'on_refunded'); ?>
		<?php echo $form->textField($model,'on_refunded'); ?>
		<?php echo $form->error($model,'on_refunded'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'on_return'); ?>
		<?php echo $form->textField($model,'on_return'); ?>
		<?php echo $form->error($model,'on_return'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'quantity_price'); ?>
		<?php echo $form->textField($model,'quantity_price',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'quantity_price'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'agent_quantity_price'); ?>
		<?php echo $form->textField($model,'agent_quantity_price',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'agent_quantity_price'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'reduction_percent'); ?>
		<?php echo $form->textField($model,'reduction_percent',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'reduction_percent'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'reduction_amount'); ?>
		<?php echo $form->textField($model,'reduction_amount',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'reduction_amount'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'product_quantity_discount'); ?>
		<?php echo $form->textField($model,'product_quantity_discount',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'product_quantity_discount'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'total_price'); ?>
		<?php echo $form->textField($model,'total_price',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'total_price'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'agent_total_price'); ?>
		<?php echo $form->textField($model,'agent_total_price',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'agent_total_price'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'product_weight'); ?>
		<?php echo $form->textField($model,'product_weight'); ?>
		<?php echo $form->error($model,'product_weight'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tax_name'); ?>
		<?php echo $form->textField($model,'tax_name',array('size'=>16,'maxlength'=>16)); ?>
		<?php echo $form->error($model,'tax_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tax_rate'); ?>
		<?php echo $form->textField($model,'tax_rate',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'tax_rate'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'discount_quantity_applied'); ?>
		<?php echo $form->textField($model,'discount_quantity_applied'); ?>
		<?php echo $form->error($model,'discount_quantity_applied'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->