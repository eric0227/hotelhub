<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'image-form',
	'enableAjaxValidation'=>false,
	'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
	
	<?php 
		if(empty($_REQUEST['id_product']) && $model->isNewRecord) {
			echo CHtml::label('Product', 'Product');
			echo CHtml::dropDownList('id_product', null, Product::items());
		} else {
			echo CHtml::hiddenField('id_product', $_REQUEST['id_product']);
		}
	?>
			
	<?php echo $form->textFieldRow($model,'image_title',array('class'=>'span5','maxlength'=>100)); ?>
		
	<?php 
		if($model->isNewRecord) {
			echo $form->fileField($model,'image',array('class'=>'span5','maxlength'=>100));
		}
	?>

	<?php //echo $form->textFieldRow($model,'image_path',array('class'=>'span5','maxlength'=>200)); ?>

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
