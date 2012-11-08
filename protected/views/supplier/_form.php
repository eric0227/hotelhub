<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'supplier-form',
	'enableAjaxValidation'=>false,
	'type' => 'horizontal',
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->labelEx($model,'id_supplier',
			array('class' => 'floatleft')); ?>
	<?php 
		//echo $form->textField($model,'id_supplier',array('size'=>10,'maxlength'=>10));
		echo $form->dropDownList($model,'id_supplier', User::items(User::SUPPLIER));
	?>
	<?php echo $form->error($model,'id_supplier'); ?>

	<?php echo $form->textFieldRow($model,'manager_name',array('class'=>'span5','maxlength'=>64)); ?>

	<?php echo $form->textFieldRow($model,'manager_email',array('class'=>'span5','maxlength'=>128)); ?>

	<?php echo $form->textFieldRow($model,'sales_name',array('class'=>'span5','maxlength'=>64)); ?>

	<?php echo $form->textFieldRow($model,'sales_email',array('class'=>'span5','maxlength'=>128)); ?>

	<?php echo $form->textFieldRow($model,'reservations_name',array('class'=>'span5','maxlength'=>64)); ?>

	<?php echo $form->textFieldRow($model,'reservations_email',array('class'=>'span5','maxlength'=>128)); ?>

	<?php echo $form->textFieldRow($model,'reservations_phone',array('class'=>'span5','maxlength'=>64)); ?>

	<?php echo $form->textFieldRow($model,'reservations_fx',array('class'=>'span5','maxlength'=>64)); ?>

	<?php echo $form->textFieldRow($model,'accounts_name',array('class'=>'span5','maxlength'=>64)); ?>

	<?php echo $form->textFieldRow($model,'accounts_email',array('class'=>'span5','maxlength'=>128)); ?>

	<?php echo $form->textFieldRow($model,'accounts_phone',array('class'=>'span5','maxlength'=>64)); ?>

	<?php echo $form->textFieldRow($model,'accounts_fx',array('class'=>'span5','maxlength'=>64)); ?>

	<?php echo $form->textFieldRow($model,'supplier_abn',array('class'=>'span5','maxlength'=>64)); ?>

	<?php echo $form->textFieldRow($model,'member_chain_group',array('class'=>'span5','maxlength'=>64)); ?>

	<?php echo $form->textFieldRow($model,'room_count',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'website',array('class'=>'span5','maxlength'=>128)); ?>
	
	<h2> Supplier Facilities </h2>
	
	<div>
	<?php		
		$attributeInfos = $model->getAllSttributes();
		foreach($attributeInfos as $info) {
			echo '<div>';
			echo '<h4 class="custom">' . $info['attribute']->name . '</h4>';
				
			echo CHtml::checkBoxList('selectedAttributeItemIds' , $info['selectedAttributeItemIds'],
				CHtml::listData(
					$info['attributeItem'],
					'id_attribute_item',
					'item'
				),
				array('container' => 'span',
				'separator' => '',
				'template' => '<p class="label_checkbox_pair">{input}{label}</p>')
			);
			echo '</div>';
		}
	?>
	</div>
	<div class="cb"></div>
	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
