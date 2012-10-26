<?php
/* @var $this HotelController */
/* @var $data Hotel */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_hotel')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_hotel), array('view', 'id'=>$data->id_hotel)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_supplier')); ?>:</b>
	<?php echo CHtml::encode($data->id_supplier); ?>
	<br />


</div>