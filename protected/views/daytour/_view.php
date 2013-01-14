<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_product')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_product),array('view','id'=>$data->id_product)); ?>
	<br />
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('id_supplier')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_supplier)); ?>
	<br />
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode(CHtml::encode($data->name)); ?>
	<br />
		
	<b><?php echo CHtml::encode($data->getAttributeLabel('maker')); ?>:</b>
	<?php echo CHtml::encode($data->maker); ?>
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

	<b><?php echo CHtml::encode($data->getAttributeLabel('price')); ?>:</b>
	<?php echo CHtml::encode($data->price); ?>
	<br />

	

</div>