<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'category-form',
	'enableAjaxValidation'=>false,
	'type' => 'horizontal',
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>
	<div class="form-actions">
	

	<?php $this->widget('MultiLangSelector'); ?>

	<?php echo $form->errorSummary($model); ?>

	<?php 
		echo $form->dropDownListRow($model,'id_parent', $parentItems,
			array('class' => 'span5'));
	?>
	<?php echo $form->error($model,'id_parent'); ?>

	<?php echo $form->textFieldRow($model,'name',array('class'=>'span5', 'multilang'=>'1')); ?>
	
	<?php echo $form->textAreaRow($model,'description',array('rows'=>6, 'cols'=>30, 'class'=>'span5', 'multilang'=>'1')); ?>
	
	<?php echo $form->textFieldRow($model,'active',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'date_add',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'date_upd',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'position',array('class'=>'span5','maxlength'=>10)); ?>

	
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
