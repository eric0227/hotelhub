<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'user-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>


	<?php echo $form->labelEx($model,'id_group'); ?>
	<?php 
		//echo $form->textField($model,'id_group',array('size'=>10,'maxlength'=>10));
		echo $form->dropDownList($model,'id_group', Group::items());
	?>
	<?php echo $form->error($model,'id_group'); ?>

	<?php echo $form->labelEx($model,'id_lang'); ?>
	<?php 
		//echo $form->textField($model,'id_lang',array('size'=>10,'maxlength'=>10));
		echo $form->dropDownList($model,'id_lang', Lang::items());		
	?>
	<?php echo $form->error($model,'id_lang'); ?>


	<?php echo $form->textFieldRow($model,'lastname',array('class'=>'span5','maxlength'=>32)); ?>

	<?php echo $form->textFieldRow($model,'firstname',array('class'=>'span5','maxlength'=>32)); ?>

	<?php echo $form->textFieldRow($model,'email',array('class'=>'span5','maxlength'=>128)); ?>

	<?php echo $form->passwordFieldRow($model,'passwd',array('class'=>'span5','maxlength'=>32)); ?>
	<?php echo $form->passwordFieldRow($model,'repeat_passwd',array('class'=>'span5','maxlength'=>32)); ?>
	

	<?php echo $form->textFieldRow($model,'id_address_default',array('class'=>'span5','maxlength'=>10)); ?>
	<?php echo $form->textFieldRow($model,'id_address_delivery',array('class'=>'span5','maxlength'=>10)); ?>
	<?php echo $form->textFieldRow($model,'id_address_invoice',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'is_guest',array('class'=>'span5')); ?>

	<?php echo $form->textAreaRow($model,'note',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textFieldRow($model,'birthday',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'active',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'deleted',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
