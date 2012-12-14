<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_product')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_product),array('view','id'=>$data->id_product)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_supplier')); ?>:</b>
	<?php echo CHtml::encode($data->id_supplier); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('room_code')); ?>:</b>
	<?php echo CHtml::encode($data->roomCode->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('room_type')); ?>:</b>
	<?php echo CHtml::encode($data->room_type_code); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('room_name')); ?>:</b>
	<?php echo CHtml::encode($data->product->name); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('max_night_stay')); ?>:</b>
	<?php echo CHtml::encode($data->max_night_stay); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('room_name')); ?>:</b>
	<?php echo CHtml::encode($data->room_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('root_description')); ?>:</b>
	<?php echo CHtml::encode($data->root_description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('guests_tot_room_cap')); ?>:</b>
	<?php echo CHtml::encode($data->guests_tot_room_cap); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('guests_included_price')); ?>:</b>
	<?php echo CHtml::encode($data->guests_included_price); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('children_maxnum')); ?>:</b>
	<?php echo CHtml::encode($data->children_maxnum); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('children_years')); ?>:</b>
	<?php echo CHtml::encode($data->children_years); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('children_extra')); ?>:</b>
	<?php echo CHtml::encode($data->children_extra); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('adults_maxnum')); ?>:</b>
	<?php echo CHtml::encode($data->adults_maxnum); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('adults_extra')); ?>:</b>
	<?php echo CHtml::encode($data->adults_extra); ?>
	<br />

	*/ ?>

</div>