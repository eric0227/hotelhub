<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_cms')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_cms),array('view','id'=>$data->id_cms)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_cms_category')); ?>:</b>
	<?php echo CHtml::encode($data->id_cms_category); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('position')); ?>:</b>
	<?php echo CHtml::encode($data->position); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('active')); ?>:</b>
	<?php echo CHtml::encode($data->active); ?>
	<br />


</div>