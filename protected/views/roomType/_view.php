<?php
/* @var $this RoomTypeController */
/* @var $data RoomType */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_room_type')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_room_type), array('view', 'id'=>$data->id_room_type)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />


</div>