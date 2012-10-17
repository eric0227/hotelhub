<?php
/* @var $this SupplierController */
/* @var $model Supplier */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_supplier'); ?>
		<?php echo $form->textField($model,'id_supplier',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'manager_name'); ?>
		<?php echo $form->textField($model,'manager_name',array('size'=>60,'maxlength'=>64)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'manager_email'); ?>
		<?php echo $form->textField($model,'manager_email',array('size'=>60,'maxlength'=>128)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sales_name'); ?>
		<?php echo $form->textField($model,'sales_name',array('size'=>60,'maxlength'=>64)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sales_email'); ?>
		<?php echo $form->textField($model,'sales_email',array('size'=>60,'maxlength'=>128)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'reservations_name'); ?>
		<?php echo $form->textField($model,'reservations_name',array('size'=>60,'maxlength'=>64)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'reservations_email'); ?>
		<?php echo $form->textField($model,'reservations_email',array('size'=>60,'maxlength'=>128)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'reservations_phone'); ?>
		<?php echo $form->textField($model,'reservations_phone',array('size'=>60,'maxlength'=>64)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'reservations_fx'); ?>
		<?php echo $form->textField($model,'reservations_fx',array('size'=>60,'maxlength'=>64)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'accounts_name'); ?>
		<?php echo $form->textField($model,'accounts_name',array('size'=>60,'maxlength'=>64)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'accounts_email'); ?>
		<?php echo $form->textField($model,'accounts_email',array('size'=>60,'maxlength'=>128)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'accounts_phone'); ?>
		<?php echo $form->textField($model,'accounts_phone',array('size'=>60,'maxlength'=>64)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'accounts_fx'); ?>
		<?php echo $form->textField($model,'accounts_fx',array('size'=>60,'maxlength'=>64)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'supplier_abn'); ?>
		<?php echo $form->textField($model,'supplier_abn',array('size'=>60,'maxlength'=>64)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'member_chain_group'); ?>
		<?php echo $form->textField($model,'member_chain_group',array('size'=>60,'maxlength'=>64)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'room_count'); ?>
		<?php echo $form->textField($model,'room_count'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'website'); ?>
		<?php echo $form->textField($model,'website',array('size'=>60,'maxlength'=>128)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->