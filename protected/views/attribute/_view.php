<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_attribute')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_attribute),array('view','id'=>$data->id_attribute)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_attribute_group')); ?>:</b>
	<?php echo CHtml::encode($data->id_attribute_group); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('attr_type')); ?>:</b>
	<?php echo CHtml::encode($data->attr_type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('active')); ?>:</b>
	<?php echo CHtml::encode($data->active); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('position')); ?>:</b>
	<?php echo CHtml::encode($data->position); ?>
	<br />


</div>