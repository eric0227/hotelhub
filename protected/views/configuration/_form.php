<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'configuration-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'name',array('class'=>'span5','maxlength'=>32)); ?>

	<?php //echo $form->textAreaRow($model,'value',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textFieldRow($model,'date_add',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'value',array('class'=>'span5', 'multilang'=>'1')); ?>
	
	
	<?php 
// 		$this->widget('application.components.MultiLangField', array(
// 			'form' => $form,
// 			'model' => $model,
// 			'fieldName' => name,
// 			'options' => array('class'=>'span5','maxlength'=>32)
// 		));
	?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
