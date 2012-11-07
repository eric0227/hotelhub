<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'room-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>


	<?php echo $form->labelEx($model,'id_product'); ?>
	<?php 
		//echo $form->textField($model,'id_product',array('size'=>10,'maxlength'=>10));
		echo $form->dropDownList($model, 'id_product', Product::items());
	?>
	<?php echo $form->error($model,'id_product'); ?>

	<?php echo $form->labelEx($model,'id_hotel'); ?>
	<?php 
		//echo $form->textField($model,'id_hotel',array('size'=>10,'maxlength'=>10));
		echo $form->dropDownList($model, 'id_hotel', Hotel::items()); 
	?>
	<?php echo $form->error($model,'id_hotel'); ?>

	<?php echo $form->labelEx($model,'room_code'); ?>
	<?php 
		//echo $form->textField($model,'room_code',array('size'=>6,'maxlength'=>6));
		echo $form->dropDownList($model,'room_code', Code::items(CodeType::ROOM)); 
	?>
	<?php echo $form->error($model,'room_code'); ?>


	<?php echo $form->textFieldRow($model,'room_type_code',array('class'=>'span5','maxlength'=>64)); ?>

	<?php echo $form->textFieldRow($model,'lead_in_room_type',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'full_rate',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'min_night_stay',array('class'=>'span5','maxlength'=>2)); ?>

	<?php echo $form->textFieldRow($model,'max_night_stay',array('class'=>'span5','maxlength'=>2)); ?>

	<?php echo $form->textFieldRow($model,'room_name',array('class'=>'span5','maxlength'=>64)); ?>

	<?php echo $form->textFieldRow($model,'root_description',array('class'=>'span5','maxlength'=>300)); ?>

	<?php echo $form->textFieldRow($model,'guests_tot_room_cap',array('class'=>'span5','maxlength'=>2)); ?>

	<?php echo $form->textFieldRow($model,'guests_included_price',array('class'=>'span5','maxlength'=>2)); ?>

	<?php echo $form->textFieldRow($model,'children_maxnum',array('class'=>'span5','maxlength'=>2)); ?>

	<?php echo $form->textFieldRow($model,'children_years',array('class'=>'span5','maxlength'=>2)); ?>

	<?php echo $form->textFieldRow($model,'children_extra',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'adults_maxnum',array('class'=>'span5','maxlength'=>2)); ?>

	<?php echo $form->textFieldRow($model,'adults_extra',array('class'=>'span5','maxlength'=>20)); ?>
	
	<div>
		<?php 
			$attributeInfos = $model->getAllSttributes();
			foreach($attributeInfos as $info) {
				echo '<div>';
				echo '<h4>' . $info['attribute']->name . '</h4>';
					
				echo CHtml::checkBoxList('selectedAttributeItemIds' , $info['selectedAttributeItemIds'],
					CHtml::listData(
						$info['attributeItem'],
						'id_attribute_item',
						'item'
					)
				);
				echo '</div>';
			}
		?>
	</div>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
