<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_country')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_country),array('view','id'=>$data->id_country)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_zone')); ?>:</b>
	<?php echo CHtml::encode($data->id_zone); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_currency')); ?>:</b>
	<?php echo CHtml::encode($data->id_currency); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('iso_code')); ?>:</b>
	<?php echo CHtml::encode($data->iso_code); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('call_prefix')); ?>:</b>
	<?php echo CHtml::encode($data->call_prefix); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('active')); ?>:</b>
	<?php echo CHtml::encode($data->active); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('contains_states')); ?>:</b>
	<?php echo CHtml::encode($data->contains_states); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('need_identification_number')); ?>:</b>
	<?php echo CHtml::encode($data->need_identification_number); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('need_zip_code')); ?>:</b>
	<?php echo CHtml::encode($data->need_zip_code); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('zip_code_format')); ?>:</b>
	<?php echo CHtml::encode($data->zip_code_format); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('display_tax_label')); ?>:</b>
	<?php echo CHtml::encode($data->display_tax_label); ?>
	<br />

	*/ ?>

</div>