<?php
/* @var $this CmsCategoryController */
/* @var $data CmsCategory */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_cms_category')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_cms_category), array('view', 'id'=>$data->id_cms_category)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_parent')); ?>:</b>
	<?php echo CHtml::encode($data->id_parent); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('level_depth')); ?>:</b>
	<?php echo CHtml::encode($data->level_depth); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('active')); ?>:</b>
	<?php echo CHtml::encode($data->active); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_add')); ?>:</b>
	<?php echo CHtml::encode($data->date_add); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_upd')); ?>:</b>
	<?php echo CHtml::encode($data->date_upd); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('position')); ?>:</b>
	<?php echo CHtml::encode($data->position); ?>
	<br />


</div>