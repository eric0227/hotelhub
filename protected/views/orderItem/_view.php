<?php
/* @var $this OrderItemController */
/* @var $data OrderItem */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_order_item')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_order_item), array('view', 'id'=>$data->id_order_item)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_order')); ?>:</b>
	<?php echo CHtml::encode($data->id_order); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_service')); ?>:</b>
	<?php echo CHtml::encode($data->id_service); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_supplier')); ?>:</b>
	<?php echo CHtml::encode($data->id_supplier); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_product')); ?>:</b>
	<?php echo CHtml::encode($data->id_product); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_product_date')); ?>:</b>
	<?php echo CHtml::encode($data->id_product_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('order_item_name')); ?>:</b>
	<?php echo CHtml::encode($data->order_item_name); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('product_name')); ?>:</b>
	<?php echo CHtml::encode($data->product_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('product_quantity')); ?>:</b>
	<?php echo CHtml::encode($data->product_quantity); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('product_quantity_in_stock')); ?>:</b>
	<?php echo CHtml::encode($data->product_quantity_in_stock); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('on_refunded')); ?>:</b>
	<?php echo CHtml::encode($data->on_refunded); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('on_return')); ?>:</b>
	<?php echo CHtml::encode($data->on_return); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('quantity_price')); ?>:</b>
	<?php echo CHtml::encode($data->quantity_price); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('agent_quantity_price')); ?>:</b>
	<?php echo CHtml::encode($data->agent_quantity_price); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('reduction_percent')); ?>:</b>
	<?php echo CHtml::encode($data->reduction_percent); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('reduction_amount')); ?>:</b>
	<?php echo CHtml::encode($data->reduction_amount); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('product_quantity_discount')); ?>:</b>
	<?php echo CHtml::encode($data->product_quantity_discount); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('total_price')); ?>:</b>
	<?php echo CHtml::encode($data->total_price); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('agent_total_price')); ?>:</b>
	<?php echo CHtml::encode($data->agent_total_price); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('product_weight')); ?>:</b>
	<?php echo CHtml::encode($data->product_weight); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tax_name')); ?>:</b>
	<?php echo CHtml::encode($data->tax_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tax_rate')); ?>:</b>
	<?php echo CHtml::encode($data->tax_rate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('discount_quantity_applied')); ?>:</b>
	<?php echo CHtml::encode($data->discount_quantity_applied); ?>
	<br />

	*/ ?>

</div>