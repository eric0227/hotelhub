<?php
/* @var $this OrderController */
/* @var $data Order */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_order')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_order), array('view', 'id'=>$data->id_order)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_lang')); ?>:</b>
	<?php echo CHtml::encode($data->id_lang); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_user')); ?>:</b>
	<?php echo CHtml::encode($data->id_user); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_cart')); ?>:</b>
	<?php echo CHtml::encode($data->id_cart); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_currency')); ?>:</b>
	<?php echo CHtml::encode($data->id_currency); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_address_delivery')); ?>:</b>
	<?php echo CHtml::encode($data->id_address_delivery); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_address_invoice')); ?>:</b>
	<?php echo CHtml::encode($data->id_address_invoice); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('secure_key')); ?>:</b>
	<?php echo CHtml::encode($data->secure_key); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('payment')); ?>:</b>
	<?php echo CHtml::encode($data->payment); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('conversion_rate')); ?>:</b>
	<?php echo CHtml::encode($data->conversion_rate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('gift')); ?>:</b>
	<?php echo CHtml::encode($data->gift); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('gift_message')); ?>:</b>
	<?php echo CHtml::encode($data->gift_message); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('total_price')); ?>:</b>
	<?php echo CHtml::encode($data->total_price); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('total_agent_price')); ?>:</b>
	<?php echo CHtml::encode($data->total_agent_price); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('total_discount')); ?>:</b>
	<?php echo CHtml::encode($data->total_discount); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('total_paid')); ?>:</b>
	<?php echo CHtml::encode($data->total_paid); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('invoice_number')); ?>:</b>
	<?php echo CHtml::encode($data->invoice_number); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('delivery_number')); ?>:</b>
	<?php echo CHtml::encode($data->delivery_number); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('invoice_date')); ?>:</b>
	<?php echo CHtml::encode($data->invoice_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('delivery_date')); ?>:</b>
	<?php echo CHtml::encode($data->delivery_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_add')); ?>:</b>
	<?php echo CHtml::encode($data->date_add); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_upd')); ?>:</b>
	<?php echo CHtml::encode($data->date_upd); ?>
	<br />

	*/ ?>

</div>