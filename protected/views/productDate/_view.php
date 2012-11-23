<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_product_date')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_product_date),array('view','id'=>$data->id_product_date)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_product')); ?>:</b>
	<?php echo CHtml::encode($data->id_product); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('on_date')); ?>:</b>
	<?php echo CHtml::encode($data->on_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('price')); ?>:</b>
	<?php echo CHtml::encode($data->price); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('agent_price')); ?>:</b>
	<?php echo CHtml::encode($data->agent_price); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('quantity')); ?>:</b>
	<?php echo CHtml::encode($data->quantity); ?>
	<br />

	<div>
		<h4>Special Deal</h4>
		<div>
			<?php 
				$specialList = Special::model()->findAll();
				$specialValues = array_keys(CHtml::listData($data->specials, 'id_special', 'name'));
				echo CHtml::checkBoxList('Special', $specialValues, CHtml::listData($specialList, 'id_special', 'name'), array('readonly'=>true, 'template' => '<div>{input} {label}</div>', 'separator' => ''));
			?>
		</div>
	</div>

</div>