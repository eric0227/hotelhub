<?php
/* @var $this ConfigurationController */
/* @var $data Configuration */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_configuration')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_configuration), array('view', 'id'=>$data->id_configuration)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('value')); ?>:</b>
	<?php echo CHtml::encode($data->value); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_add')); ?>:</b>
	<?php echo CHtml::encode($data->date_add); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_upd')); ?>:</b>
	<?php echo CHtml::encode($data->date_upd); ?>
	<br />


</div>