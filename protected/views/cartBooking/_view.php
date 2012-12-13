<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_cart_booking')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_cart_booking),array('view','id'=>$data->id_cart_booking)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_cart')); ?>:</b>
	<?php echo CHtml::encode($data->id_cart); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_product')); ?>:</b>
	<?php echo CHtml::encode($data->id_product); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_bedding')); ?>:</b>
	<?php echo CHtml::encode($data->id_bedding); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('bookin_date')); ?>:</b>
	<?php echo CHtml::encode($data->bookin_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('bookout_date')); ?>:</b>
	<?php echo CHtml::encode($data->bookout_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_add')); ?>:</b>
	<?php echo CHtml::encode($data->date_add); ?>
	<br />


</div>