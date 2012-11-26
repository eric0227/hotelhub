<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'country-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->dropDownListRow($model,'id_zone', Zone::items()); ?>

	<?php echo $form->dropDownListRow($model,'id_currency', Currency::items()); ?>

	<?php echo $form->textFieldRow($model,'iso_code',array('class'=>'span5','maxlength'=>3)); ?>

	<?php echo $form->textFieldRow($model,'name',array('class'=>'span5','maxlength'=>64)); ?>

	<?php echo $form->textFieldRow($model,'call_prefix',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'active',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'contains_states',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'need_identification_number',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'need_zip_code',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'zip_code_format',array('class'=>'span5','maxlength'=>12)); ?>

	<?php echo $form->textFieldRow($model,'display_tax_label',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
