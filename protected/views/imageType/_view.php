<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_image_type')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_image_type),array('view','id'=>$data->id_image_type)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('width')); ?>:</b>
	<?php echo CHtml::encode($data->width); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('height')); ?>:</b>
	<?php echo CHtml::encode($data->height); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('quality')); ?>:</b>
	<?php echo CHtml::encode($data->quality); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sharpen')); ?>:</b>
	<?php echo CHtml::encode($data->sharpen); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('rotate')); ?>:</b>
	<?php echo CHtml::encode($data->rotate); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('product')); ?>:</b>
	<?php echo CHtml::encode($data->product); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('supplier')); ?>:</b>
	<?php echo CHtml::encode($data->supplier); ?>
	<br />

	*/ ?>

</div>