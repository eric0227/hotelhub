<?php
/* @var $this CartController */
/* @var $model Cart */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_cart'); ?>
		<?php echo $form->textField($model,'id_cart',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_address_delivery'); ?>
		<?php echo $form->textField($model,'id_address_delivery',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_address_invoice'); ?>
		<?php echo $form->textField($model,'id_address_invoice',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_currency'); ?>
		<?php echo $form->textField($model,'id_currency',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_user'); ?>
		<?php echo $form->textField($model,'id_user',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'secure_key'); ?>
		<?php echo $form->textField($model,'secure_key',array('size'=>32,'maxlength'=>32)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'recyclable'); ?>
		<?php echo $form->textField($model,'recyclable'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'gift'); ?>
		<?php echo $form->textField($model,'gift'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'gift_message'); ?>
		<?php echo $form->textArea($model,'gift_message',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'date_add'); ?>
		<?php echo $form->textField($model,'date_add'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'date_upd'); ?>
		<?php echo $form->textField($model,'date_upd'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->