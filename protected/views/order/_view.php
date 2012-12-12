<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_order')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_order),array('view','id'=>$data->id_order)); ?>
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
</div>
