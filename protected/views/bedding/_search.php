<?php
/* @var $this BeddingController */
/* @var $model Bedding */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_bedding'); ?>
		<?php echo $form->textField($model,'id_bedding',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_room'); ?>
		<?php echo $form->textField($model,'id_room',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'gest_num'); ?>
		<?php echo $form->textField($model,'gest_num',array('size'=>2,'maxlength'=>2)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'single_num'); ?>
		<?php echo $form->textField($model,'single_num',array('size'=>2,'maxlength'=>2)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'double_num'); ?>
		<?php echo $form->textField($model,'double_num',array('size'=>2,'maxlength'=>2)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'beddig_desc'); ?>
		<?php echo $form->textField($model,'beddig_desc',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'additional_cost'); ?>
		<?php echo $form->textField($model,'additional_cost',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cots_available'); ?>
		<?php echo $form->textField($model,'cots_available',array('size'=>2,'maxlength'=>2)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->