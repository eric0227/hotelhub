<?php
/* @var $this OrderStateController */
/* @var $model OrderState */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_order_state'); ?>
		<?php echo $form->textField($model,'id_order_state',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'invoice'); ?>
		<?php echo $form->textField($model,'invoice'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'send_email'); ?>
		<?php echo $form->textField($model,'send_email'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'color'); ?>
		<?php echo $form->textField($model,'color',array('size'=>32,'maxlength'=>32)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'unremovable'); ?>
		<?php echo $form->textField($model,'unremovable'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'hidden'); ?>
		<?php echo $form->textField($model,'hidden'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'logable'); ?>
		<?php echo $form->textField($model,'logable'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'delivery'); ?>
		<?php echo $form->textField($model,'delivery'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>64)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'template'); ?>
		<?php echo $form->textField($model,'template',array('size'=>60,'maxlength'=>64)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->