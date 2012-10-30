<?php
/* @var $this SupplierController */
/* @var $model Supplier */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'supplier-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'id_supplier'); ?>
		<?php 
			// echo $form->textField($model,'id_supplier',array('size'=>10,'maxlength'=>10));
			
			echo $form->dropDownList($model,'id_supplier', User::items(User::$SUPPLIER));
		?>
		<?php echo $form->error($model,'id_supplier'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'manager_name'); ?>
		<?php echo $form->textField($model,'manager_name',array('size'=>60,'maxlength'=>64)); ?>
		<?php echo $form->error($model,'manager_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'manager_email'); ?>
		<?php echo $form->textField($model,'manager_email',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'manager_email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sales_name'); ?>
		<?php echo $form->textField($model,'sales_name',array('size'=>60,'maxlength'=>64)); ?>
		<?php echo $form->error($model,'sales_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sales_email'); ?>
		<?php echo $form->textField($model,'sales_email',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'sales_email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'reservations_name'); ?>
		<?php echo $form->textField($model,'reservations_name',array('size'=>60,'maxlength'=>64)); ?>
		<?php echo $form->error($model,'reservations_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'reservations_email'); ?>
		<?php echo $form->textField($model,'reservations_email',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'reservations_email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'reservations_phone'); ?>
		<?php echo $form->textField($model,'reservations_phone',array('size'=>60,'maxlength'=>64)); ?>
		<?php echo $form->error($model,'reservations_phone'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'reservations_fx'); ?>
		<?php echo $form->textField($model,'reservations_fx',array('size'=>60,'maxlength'=>64)); ?>
		<?php echo $form->error($model,'reservations_fx'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'accounts_name'); ?>
		<?php echo $form->textField($model,'accounts_name',array('size'=>60,'maxlength'=>64)); ?>
		<?php echo $form->error($model,'accounts_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'accounts_email'); ?>
		<?php echo $form->textField($model,'accounts_email',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'accounts_email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'accounts_phone'); ?>
		<?php echo $form->textField($model,'accounts_phone',array('size'=>60,'maxlength'=>64)); ?>
		<?php echo $form->error($model,'accounts_phone'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'accounts_fx'); ?>
		<?php echo $form->textField($model,'accounts_fx',array('size'=>60,'maxlength'=>64)); ?>
		<?php echo $form->error($model,'accounts_fx'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'supplier_abn'); ?>
		<?php echo $form->textField($model,'supplier_abn',array('size'=>60,'maxlength'=>64)); ?>
		<?php echo $form->error($model,'supplier_abn'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'member_chain_group'); ?>
		<?php echo $form->textField($model,'member_chain_group',array('size'=>60,'maxlength'=>64)); ?>
		<?php echo $form->error($model,'member_chain_group'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'room_count'); ?>
		<?php echo $form->textField($model,'room_count'); ?>
		<?php echo $form->error($model,'room_count'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'website'); ?>
		<?php echo $form->textField($model,'website',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'website'); ?>
	</div>
	
	<h2> Supplier Facilities </h2>
	
	<div>
	<?php			
		$attributeList = Attribute::model()->findAll(
			"id_attribute_group = :id_attribute_group", 
			array('id_attribute_group' => AttributeGroup::SUPPLIER)
		);
		
		foreach($attributeList as $attribute) {
			echo '<div>';
			echo '	<ul><h4>' . $attribute->name . '</h4></ul>';

			
						
			
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

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->