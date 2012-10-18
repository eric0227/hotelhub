<?php
/* @var $this UserController */
/* @var $data User */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_user')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_user), array('view', 'id'=>$data->id_user)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_group')); ?>:</b>
	<?php 
		//echo CHtml::encode($data->id_group);
		echo CHtml::encode($data->group->name);
	?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_lang')); ?>:</b>
	<?php 
		//echo CHtml::encode($data->id_lang);
	echo CHtml::encode($data->lang->name);
	?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lastname')); ?>:</b>
	<?php echo CHtml::encode($data->lastname); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('firstname')); ?>:</b>
	<?php echo CHtml::encode($data->firstname); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('email')); ?>:</b>
	<?php echo CHtml::encode($data->email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('passwd')); ?>:</b>
	<?php echo CHtml::encode($data->passwd); ?>
	<br />
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('addresses')); ?>:</b>
	
	<?php 
		foreach($data->addresses as $address) {
			echo $address->addressCode->name;

			echo ',';
		}	
	?>
	
	<br />
	
	
</div>