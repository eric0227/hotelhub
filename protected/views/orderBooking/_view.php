<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_order_booking')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_order_booking),array('view','id'=>$data->id_order_booking)); ?>
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

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_bedding')); ?>:</b>
	<?php echo CHtml::encode($data->id_bedding); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('on_refunded')); ?>:</b>
	<?php echo CHtml::encode($data->on_refunded); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('on_return')); ?>:</b>
	<?php echo CHtml::encode($data->on_return); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('total_price')); ?>:</b>
	<?php echo CHtml::encode($data->total_price); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('agent_total_price')); ?>:</b>
	<?php echo CHtml::encode($data->agent_total_price); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('bookin_date')); ?>:</b>
	<?php echo CHtml::encode($data->bookin_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('bookout_date')); ?>:</b>
	<?php echo CHtml::encode($data->bookout_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('checkin_date')); ?>:</b>
	<?php echo CHtml::encode($data->checkin_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('checkout_date')); ?>:</b>
	<?php echo CHtml::encode($data->checkout_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('booking_name')); ?>:</b>
	<?php echo CHtml::encode($data->booking_name); ?>
	<br />

	*/ ?>

</div>