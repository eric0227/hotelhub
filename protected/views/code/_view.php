<?php
/* @var $this CodeController */
/* @var $data Code */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_code')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_code), array('view', 'id'=>$data->id_code)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('type')); ?>:</b>
	<?php echo CHtml::encode($data->type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('code')); ?>:</b>
	<?php echo CHtml::encode($data->code); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('position')); ?>:</b>
	<?php echo CHtml::encode($data->position); ?>
	<br />
</div>