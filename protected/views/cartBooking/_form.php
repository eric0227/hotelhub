<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'cart-booking-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->dropDownListRow($model,'id_cart', Cart::items(), array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo 
		//$form->textFieldRow($model,'id_product',array('class'=>'span5','maxlength'=>10)); 
		$form->dropDownListRow(
			$model, 'id_product', Product::items()
		);
	?>

	<?php echo $form->textFieldRow($model,'id_bedding',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'bookin_date',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'bookout_date',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'date_add',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
