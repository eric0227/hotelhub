<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'order-state-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'invoice',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'send_email',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'color',array('class'=>'span5','maxlength'=>32)); ?>

	<?php echo $form->textFieldRow($model,'unremovable',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'hidden',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'logable',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'delivery',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'name',array('class'=>'span5','maxlength'=>64)); ?>

	<?php echo $form->textFieldRow($model,'template',array('class'=>'span5','maxlength'=>64)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
