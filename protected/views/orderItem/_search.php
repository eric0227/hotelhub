<?php
/* @var $this OrderItemController */
/* @var $model OrderItem */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_order_item'); ?>
		<?php echo $form->textField($model,'id_order_item',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_order'); ?>
		<?php echo $form->textField($model,'id_order',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_service'); ?>
		<?php echo $form->textField($model,'id_service',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_supplier'); ?>
		<?php echo $form->textField($model,'id_supplier',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_product'); ?>
		<?php echo $form->textField($model,'id_product',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_product_date'); ?>
		<?php echo $form->textField($model,'id_product_date',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'order_item_name'); ?>
		<?php echo $form->textField($model,'order_item_name',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'product_name'); ?>
		<?php echo $form->textField($model,'product_name',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'product_quantity'); ?>
		<?php echo $form->textField($model,'product_quantity',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'product_quantity_in_stock'); ?>
		<?php echo $form->textField($model,'product_quantity_in_stock'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'on_refunded'); ?>
		<?php echo $form->textField($model,'on_refunded'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'on_return'); ?>
		<?php echo $form->textField($model,'on_return'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'quantity_price'); ?>
		<?php echo $form->textField($model,'quantity_price',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'agent_quantity_price'); ?>
		<?php echo $form->textField($model,'agent_quantity_price',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'reduction_percent'); ?>
		<?php echo $form->textField($model,'reduction_percent',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'reduction_amount'); ?>
		<?php echo $form->textField($model,'reduction_amount',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'product_quantity_discount'); ?>
		<?php echo $form->textField($model,'product_quantity_discount',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'total_price'); ?>
		<?php echo $form->textField($model,'total_price',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'agent_total_price'); ?>
		<?php echo $form->textField($model,'agent_total_price',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'product_weight'); ?>
		<?php echo $form->textField($model,'product_weight'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tax_name'); ?>
		<?php echo $form->textField($model,'tax_name',array('size'=>16,'maxlength'=>16)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tax_rate'); ?>
		<?php echo $form->textField($model,'tax_rate',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'discount_quantity_applied'); ?>
		<?php echo $form->textField($model,'discount_quantity_applied'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->