<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_product')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_product),array('view','id'=>$data->id_product)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_supplier')); ?>:</b>
	<?php echo CHtml::encode($data->id_supplier); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('car_group_code')); ?>:</b>
	<?php echo CHtml::encode($data->car_group_code); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('class_code')); ?>:</b>
	<?php echo CHtml::encode($data->class_code); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('trans_type')); ?>:</b>
	<?php echo CHtml::encode($data->trans_type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('people_maxnum')); ?>:</b>
	<?php echo CHtml::encode($data->people_maxnum); ?>
	<br />


</div>