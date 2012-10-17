<?php
/* @var $this LangController */
/* @var $data Lang */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_lang')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_lang), array('view', 'id'=>$data->id_lang)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('active')); ?>:</b>
	<?php echo CHtml::encode($data->active); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('iso_code')); ?>:</b>
	<?php echo CHtml::encode($data->iso_code); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('language_code')); ?>:</b>
	<?php echo CHtml::encode($data->language_code); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_format_lite')); ?>:</b>
	<?php echo CHtml::encode($data->date_format_lite); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_format_full')); ?>:</b>
	<?php echo CHtml::encode($data->date_format_full); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('is_rtl')); ?>:</b>
	<?php echo CHtml::encode($data->is_rtl); ?>
	<br />

	*/ ?>

</div>