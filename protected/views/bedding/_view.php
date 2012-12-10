<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_bedding')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_bedding),array('view','id'=>$data->id_bedding)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_room')); ?>:</b>
	<?php echo CHtml::encode($data->id_room); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('single_num')); ?>:</b>
	<?php echo CHtml::encode($data->single_num); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('double_num')); ?>:</b>
	<?php echo CHtml::encode($data->double_num); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('bedding_desc')); ?>:</b>
	<?php echo CHtml::encode($data->bedding_desc); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('additional_cost')); ?>:</b>
	<?php echo CHtml::encode($data->additional_cost); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('cots_available')); ?>:</b>
	<?php echo CHtml::encode($data->cots_available); ?>
	<br />

	*/ ?>

</div>