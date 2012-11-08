<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'special-form',
	'enableAjaxValidation'=>false,
	'type' => 'horizontal',
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>
	<div class="form-actions">
	<?php echo $form->errorSummary($model); ?>

	<?php
		echo $form->textFieldRow($model,'name',array('class'=>'span5','maxlength'=>128),
			array('class' => 'span5'));
	?>

		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
