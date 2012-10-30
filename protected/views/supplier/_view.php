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

	<div>
	<?php			
		$attributeList = Attribute::model()->findAll(
			"id_attribute_group = :id_attribute_group", 
			array('id_attribute_group' => AttributeGroup::SUPPLIER)
		);
		
		foreach($attributeList as $attribute) {
			echo '<div>';
			echo '	<ul>' . $attribute->name . '</ul>';
			foreach($attribute->attributeItems as $item) {
				echo '<li>';
				echo '<input type="checkbox" >';
				echo $item->item;
				echo '</li>';				
				//echo CHtml::activeCheckBox($item, $item->item);
				echo '</ul>';
			}
			echo '</div>';
			echo '<BR><BR>';
		}
	?>
	</div>
</div>