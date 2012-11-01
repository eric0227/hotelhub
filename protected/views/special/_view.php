<?php
/* @var $this SpecialController */
/* @var $data Special */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_special')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_special), array('view', 'id'=>$data->id_special)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />


</div>