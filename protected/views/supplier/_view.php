<?php
/* @var $this SupplierController */
/* @var $data Supplier */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_supplier')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_supplier), array('view', 'id'=>$data->id_supplier)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('manager_name')); ?>:</b>
	<?php echo CHtml::encode($data->manager_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('manager_email')); ?>:</b>
	<?php echo CHtml::encode($data->manager_email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sales_name')); ?>:</b>
	<?php echo CHtml::encode($data->sales_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sales_email')); ?>:</b>
	<?php echo CHtml::encode($data->sales_email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('reservations_name')); ?>:</b>
	<?php echo CHtml::encode($data->reservations_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('reservations_email')); ?>:</b>
	<?php echo CHtml::encode($data->reservations_email); ?>
	<br />

</div>