<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_group')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_group),array('view','id'=>$data->id_group)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('level')); ?>:</b>
	<?php echo CHtml::encode($data->level); ?>
	<br />


</div>