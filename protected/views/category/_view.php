<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_category')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_category),array('view','id'=>$data->id_category)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_parent')); ?>:</b>
	<?php echo CHtml::encode($data->id_parent); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_service')); ?>:</b>
	<?php echo CHtml::encode($data->id_service); ?>
	<br />
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('level_depth')); ?>:</b>
	<?php echo CHtml::encode($data->level_depth); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nleft')); ?>:</b>
	<?php echo CHtml::encode($data->nleft); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nright')); ?>:</b>
	<?php echo CHtml::encode($data->nright); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('active')); ?>:</b>
	<?php echo CHtml::encode($data->active); ?>
	<br />


</div>