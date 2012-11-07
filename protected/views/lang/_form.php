<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'lang-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'name',array('class'=>'span5','maxlength'=>32)); ?>

	<?php echo $form->textFieldRow($model,'active',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'iso_code',array('class'=>'span5','maxlength'=>2)); ?>

	<?php echo $form->textFieldRow($model,'language_code',array('class'=>'span5','maxlength'=>5)); ?>

	<?php echo $form->textFieldRow($model,'date_format_lite',array('class'=>'span5','maxlength'=>32)); ?>

	<?php echo $form->textFieldRow($model,'date_format_full',array('class'=>'span5','maxlength'=>32)); ?>

	<?php echo $form->textFieldRow($model,'is_rtl',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
