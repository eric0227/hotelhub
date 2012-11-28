<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_address')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_address),array('view','id'=>$data->id_address)); ?>
	(<?php echo $data->addressCode->name?>)
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_country')); ?>:</b>
	<?php echo CHtml::encode($data->id_country); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_state')); ?>:</b>
	<?php echo CHtml::encode($data->id_state); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('alias')); ?>:</b>
	<?php echo CHtml::encode($data->alias); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('company')); ?>:</b>
	<?php echo CHtml::encode($data->company); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lastname')); ?>:</b>
	<?php echo CHtml::encode($data->lastname); ?>
	<br />

	

</div>