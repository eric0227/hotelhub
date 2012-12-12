<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_product')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_product),array('view','id'=>$data->id_product)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_service')); ?>:</b>
	<?php echo CHtml::encode($data->id_service); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('position')); ?>:</b>
	<?php echo CHtml::encode($data->position); ?>
	<br />


</div>