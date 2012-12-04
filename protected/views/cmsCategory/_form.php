<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'cms-category-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
	
	<?php $this->widget('MultiLangSelector'); ?>

	<?php 
		echo $form->dropDownListRow($model,'id_parent', $parentItems, array('class' => 'span5'));
	?>
	
	<?php echo $form->textFieldRow($model,'name',array('class'=>'span5', 'multilang'=>'1')); ?>	
	
	<?php echo $form->textAreaRow($model,'description',array('rows'=>6, 'cols'=>30, 'class'=>'span5', 'multilang'=>'1')); ?>	
	
	<?php echo $form->textFieldRow($model,'active',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'position',array('class'=>'span5','maxlength'=>10)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
