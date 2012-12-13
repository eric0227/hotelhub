<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_currency')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_currency),array('view','id'=>$data->id_currency)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('iso_code')); ?>:</b>
	<?php echo CHtml::encode($data->iso_code); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('iso_code_num')); ?>:</b>
	<?php echo CHtml::encode($data->iso_code_num); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sign')); ?>:</b>
	<?php echo CHtml::encode($data->sign); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('blank')); ?>:</b>
	<?php echo CHtml::encode($data->blank); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('format')); ?>:</b>
	<?php echo CHtml::encode($data->format); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('decimals')); ?>:</b>
	<?php echo CHtml::encode($data->decimals); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('conversion_rate')); ?>:</b>
	<?php echo CHtml::encode($data->conversion_rate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('deleted')); ?>:</b>
	<?php echo CHtml::encode($data->deleted); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('active')); ?>:</b>
	<?php echo CHtml::encode($data->active); ?>
	<br />

	*/ ?>

</div>