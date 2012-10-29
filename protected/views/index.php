<?php
/* @var $this ProductController */
/* @var $model Product */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'product-index-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'date_add'); ?>
		<?php echo $form->textField($model,'date_add'); ?>
		<?php echo $form->error($model,'date_add'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'date_upd'); ?>
		<?php echo $form->textField($model,'date_upd'); ?>
		<?php echo $form->error($model,'date_upd'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'on_sale'); ?>
		<?php echo $form->textField($model,'on_sale'); ?>
		<?php echo $form->error($model,'on_sale'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'quantity'); ?>
		<?php echo $form->textField($model,'quantity'); ?>
		<?php echo $form->error($model,'quantity'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'active'); ?>
		<?php echo $form->textField($model,'active'); ?>
		<?php echo $form->error($model,'active'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'show_price'); ?>
		<?php echo $form->textField($model,'show_price'); ?>
		<?php echo $form->error($model,'show_price'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'indexed'); ?>
		<?php echo $form->textField($model,'indexed'); ?>
		<?php echo $form->error($model,'indexed'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'width'); ?>
		<?php echo $form->textField($model,'width'); ?>
		<?php echo $form->error($model,'width'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'height'); ?>
		<?php echo $form->textField($model,'height'); ?>
		<?php echo $form->error($model,'height'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'depth'); ?>
		<?php echo $form->textField($model,'depth'); ?>
		<?php echo $form->error($model,'depth'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'weight'); ?>
		<?php echo $form->textField($model,'weight'); ?>
		<?php echo $form->error($model,'weight'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_category_default'); ?>
		<?php echo $form->textField($model,'id_category_default'); ?>
		<?php echo $form->error($model,'id_category_default'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'minimal_quantity'); ?>
		<?php echo $form->textField($model,'minimal_quantity'); ?>
		<?php echo $form->error($model,'minimal_quantity'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'out_of_stock'); ?>
		<?php echo $form->textField($model,'out_of_stock'); ?>
		<?php echo $form->error($model,'out_of_stock'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'price'); ?>
		<?php echo $form->textField($model,'price'); ?>
		<?php echo $form->error($model,'price'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'wholesale_price'); ?>
		<?php echo $form->textField($model,'wholesale_price'); ?>
		<?php echo $form->error($model,'wholesale_price'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'condition'); ?>
		<?php echo $form->textField($model,'condition'); ?>
		<?php echo $form->error($model,'condition'); ?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton('Submit'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->