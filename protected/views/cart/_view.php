<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_cart')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_cart),array('view','id'=>$data->id_cart)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_address_delivery')); ?>:</b>
	<?php echo CHtml::encode($data->id_address_delivery); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_address_invoice')); ?>:</b>
	<?php echo CHtml::encode($data->id_address_invoice); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_currency')); ?>:</b>
	<?php echo CHtml::encode($data->id_currency); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_user')); ?>:</b>
	<?php echo CHtml::encode($data->id_user); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('secure_key')); ?>:</b>
	<?php echo CHtml::encode($data->secure_key); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('recyclable')); ?>:</b>
	<?php echo CHtml::encode($data->recyclable); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('gift')); ?>:</b>
	<?php echo CHtml::encode($data->gift); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('gift_message')); ?>:</b>
	<?php echo CHtml::encode($data->gift_message); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_add')); ?>:</b>
	<?php echo CHtml::encode($data->date_add); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_upd')); ?>:</b>
	<?php echo CHtml::encode($data->date_upd); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('on_order')); ?>:</b>
	<?php echo CHtml::encode($data->on_order); ?>
	<br />

	*/ ?>

</div>