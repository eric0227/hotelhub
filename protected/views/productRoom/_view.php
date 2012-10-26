<?php
/* @var $this ProductRoomController */
/* @var $data ProductRoom */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_product_room')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_product_room), array('view', 'id'=>$data->id_product_room)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_product')); ?>:</b>
	<?php echo CHtml::encode($data->id_product); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_hotel')); ?>:</b>
	<?php echo CHtml::encode($data->id_hotel); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_room_type')); ?>:</b>
	<?php echo CHtml::encode($data->id_room_type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('room_type_code')); ?>:</b>
	<?php echo CHtml::encode($data->room_type_code); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lead_in_room_type')); ?>:</b>
	<?php echo CHtml::encode($data->lead_in_room_type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('full_rate')); ?>:</b>
	<?php echo CHtml::encode($data->full_rate); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('min_night_stay')); ?>:</b>
	<?php echo CHtml::encode($data->min_night_stay); ?>
	<br />

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

	*/ ?>

</div>