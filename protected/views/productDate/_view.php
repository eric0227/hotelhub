<?php
/* @var $this ProductDateController */
/* @var $data ProductDate */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_product_date')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_product_date), array('view', 'id'=>$data->id_product_date)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_product')); ?>:</b>
	<?php echo CHtml::encode($data->id_product); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('on_date')); ?>:</b>
	<?php echo CHtml::encode($data->on_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('price')); ?>:</b>
	<?php echo CHtml::encode($data->price); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('agent_price')); ?>:</b>
	<?php echo CHtml::encode($data->agent_price); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('quantity')); ?>:</b>
	<?php echo CHtml::encode($data->quantity); ?>
	<br />


</div>