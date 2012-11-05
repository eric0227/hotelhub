<?php
/* @var $this OrderStateController */
/* @var $data OrderState */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_order_state')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_order_state), array('view', 'id'=>$data->id_order_state)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('invoice')); ?>:</b>
	<?php echo CHtml::encode($data->invoice); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('send_email')); ?>:</b>
	<?php echo CHtml::encode($data->send_email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('color')); ?>:</b>
	<?php echo CHtml::encode($data->color); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('unremovable')); ?>:</b>
	<?php echo CHtml::encode($data->unremovable); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hidden')); ?>:</b>
	<?php echo CHtml::encode($data->hidden); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('logable')); ?>:</b>
	<?php echo CHtml::encode($data->logable); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('delivery')); ?>:</b>
	<?php echo CHtml::encode($data->delivery); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('template')); ?>:</b>
	<?php echo CHtml::encode($data->template); ?>
	<br />

	*/ ?>

</div>