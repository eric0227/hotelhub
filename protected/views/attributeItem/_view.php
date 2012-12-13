<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_attribute_item')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_attribute_item),array('view','id'=>$data->id_attribute_item)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_attribute')); ?>:</b>
	<?php echo CHtml::encode($data->id_attribute); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('item')); ?>:</b>
	<?php echo CHtml::encode($data->item); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('position')); ?>:</b>
	<?php echo CHtml::encode($data->position); ?>
	<br />


</div>