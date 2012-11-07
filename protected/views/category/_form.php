<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'category-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->labelEx($model,'id_parent'); ?>
	<?php 
		// echo $form->textField($model,'id_parent',array('size'=>10,'maxlength'=>10));
		echo $form->dropDownList($model,'id_parent', $parentItems);			
	?>
	<?php echo $form->error($model,'id_parent'); ?>

<?php /*	
	<?php echo $form->textFieldRow($model,'id_service',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'level_depth',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'nleft',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'nright',array('class'=>'span5','maxlength'=>10)); ?>
*/ ?>
	
	<?php echo $form->textFieldRow($model,'active',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'date_add',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'date_upd',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'position',array('class'=>'span5','maxlength'=>10)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
