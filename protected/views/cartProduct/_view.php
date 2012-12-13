<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_cart_product')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_cart_product),array('view','id'=>$data->id_cart_product)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_cart')); ?>:</b>
	<?php echo CHtml::encode($data->id_cart); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_product')); ?>:</b>
	<?php echo CHtml::encode($data->id_product); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_product_date')); ?>:</b>
	<?php echo CHtml::encode($data->id_product_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('quantity')); ?>:</b>
	<?php echo CHtml::encode($data->quantity); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_add')); ?>:</b>
	<?php echo CHtml::encode($data->date_add); ?>
	<br />


</div>