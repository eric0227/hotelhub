<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'car-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'id_product',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'id_supplier',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'car_group_code',array('class'=>'span5','maxlength'=>6)); ?>

	<?php echo $form->textFieldRow($model,'class_code',array('class'=>'span5','maxlength'=>6)); ?>

	<?php echo $form->textFieldRow($model,'trans_type',array('class'=>'span5','maxlength'=>9)); ?>

	<?php echo $form->textFieldRow($model,'people_maxnum',array('class'=>'span5','maxlength'=>2)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
