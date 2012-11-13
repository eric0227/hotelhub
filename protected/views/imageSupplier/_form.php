<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'image-form',
	'enableAjaxValidation'=>false,
	'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php 
		if($model->isNewRecord) { 
			echo CHtml::label('Supplier', 'id_supplier');
			echo CHtml::dropDownList('id_supplier', null, Supplier::items());
		}
	?>	
	
	<?php echo $form->textFieldRow($model,'image_title',array('class'=>'span5','maxlength'=>100)); ?>
	
	<br />
	
	<?php 
		if($model->isNewRecord) {
			echo $form->fileFieldRow($model,'image',array('class'=>'span5','maxlength'=>100));
		}
	?>

	<?php echo $form->textFieldRow($model,'position',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'cover',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
