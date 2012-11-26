<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'currency-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'name',array('class'=>'span5','maxlength'=>32)); ?>

	<?php echo $form->textFieldRow($model,'iso_code',array('class'=>'span5','maxlength'=>3)); ?>

	<?php echo $form->textFieldRow($model,'iso_code_num',array('class'=>'span5','maxlength'=>3)); ?>

	<?php echo $form->textFieldRow($model,'sign',array('class'=>'span5','maxlength'=>8)); ?>

	<?php echo $form->textFieldRow($model,'blank',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'format',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'decimals',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'conversion_rate',array('class'=>'span5','maxlength'=>13)); ?>

	<?php echo $form->textFieldRow($model,'deleted',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'active',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
