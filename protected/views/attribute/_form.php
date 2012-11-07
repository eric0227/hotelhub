<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'attribute-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>


	<?php echo $form->labelEx($model,'id_attribute_group'); ?>
	<?php 
		//echo $form->textField($model,'id_attribute_group',array('size'=>10,'maxlength'=>10));
		echo $form->dropDownList($model,'id_attribute_group', AttributeGroup::items());
	?>
	<?php echo $form->error($model,'id_attribute_group'); ?>


	<?php echo $form->textFieldRow($model,'name',array('class'=>'span5','maxlength'=>128)); ?>


	<?php echo $form->labelEx($model,'attr_type'); ?>
	<?php 
		// echo $form->textArea($model,'attr_type',array('rows'=>6, 'cols'=>50));
		echo $form->dropDownList($model,'attr_type', Attribute::$TYPE);
	?>
	<?php echo $form->error($model,'attr_type'); ?>


	<?php echo $form->textFieldRow($model,'active',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'position',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
