<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_product')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_product),array('view','id'=>$data->id_product)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_service')); ?>:</b>
	<?php echo CHtml::encode($data->id_service); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_category_default')); ?>:</b>
	<?php echo CHtml::encode($data->id_category_default); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('on_sale')); ?>:</b>
	<?php echo CHtml::encode($data->on_sale); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('quantity')); ?>:</b>
	<?php echo CHtml::encode($data->quantity); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('minimal_quantity')); ?>:</b>
	<?php echo CHtml::encode($data->minimal_quantity); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('price')); ?>:</b>
	<?php echo CHtml::encode($data->price); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('agent_price')); ?>:</b>
	<?php echo CHtml::encode($data->agent_price); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('wholesale_price')); ?>:</b>
	<?php echo CHtml::encode($data->wholesale_price); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('width')); ?>:</b>
	<?php echo CHtml::encode($data->width); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('height')); ?>:</b>
	<?php echo CHtml::encode($data->height); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('depth')); ?>:</b>
	<?php echo CHtml::encode($data->depth); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('weight')); ?>:</b>
	<?php echo CHtml::encode($data->weight); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('out_of_stock')); ?>:</b>
	<?php echo CHtml::encode($data->out_of_stock); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('active')); ?>:</b>
	<?php echo CHtml::encode($data->active); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('condition')); ?>:</b>
	<?php echo CHtml::encode($data->condition); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('show_price')); ?>:</b>
	<?php echo CHtml::encode($data->show_price); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('indexed')); ?>:</b>
	<?php echo CHtml::encode($data->indexed); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_add')); ?>:</b>
	<?php echo CHtml::encode($data->date_add); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_upd')); ?>:</b>
	<?php echo CHtml::encode($data->date_upd); ?>
	<br />

	*/ ?>

</div>