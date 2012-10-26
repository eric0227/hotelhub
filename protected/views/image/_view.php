<?php
/* @var $this ImageController */
/* @var $data Image */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_image')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_image), array('view', 'id'=>$data->id_image)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('image_path')); ?>:</b>
	<?php echo CHtml::encode($data->image_path); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('image_title')); ?>:</b>
	<?php echo CHtml::encode($data->image_title); ?>
	<br />


</div>