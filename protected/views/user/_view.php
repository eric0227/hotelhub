<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_user')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_user),array('view','id'=>$data->id_user)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_group')); ?>:</b>
	<?php echo CHtml::encode($data->id_group); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_lang')); ?>:</b>
	<?php echo CHtml::encode($data->id_lang); ?>
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
			//print_r($address);
			//echo $address->addressCode->name;			
			echo CHtml::link(CHtml::encode( $address->addressCode->name), array('address/view', 'id'=>$address->id_address));
			echo ',';
		}	
	?>

</div>