<?php
/* @var $this ProductRoomController */
/* @var $model ProductRoom */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'product-room-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'id_product'); ?>
		<?php echo $form->textField($model,'id_product',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'id_product'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_hotel'); ?>
		<?php echo $form->textField($model,'id_hotel',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'id_hotel'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_room_type'); ?>
		<?php echo $form->textField($model,'id_room_type',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'id_room_type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'room_type_code'); ?>
		<?php echo $form->textField($model,'room_type_code',array('size'=>60,'maxlength'=>64)); ?>
		<?php echo $form->error($model,'room_type_code'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'lead_in_room_type'); ?>
		<?php echo $form->textField($model,'lead_in_room_type'); ?>
		<?php echo $form->error($model,'lead_in_room_type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'full_rate'); ?>
		<?php echo $form->textField($model,'full_rate',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'full_rate'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'min_night_stay'); ?>
		<?php echo $form->textField($model,'min_night_stay',array('size'=>2,'maxlength'=>2)); ?>
		<?php echo $form->error($model,'min_night_stay'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'max_night_stay'); ?>
		<?php echo $form->textField($model,'max_night_stay',array('size'=>2,'maxlength'=>2)); ?>
		<?php echo $form->error($model,'max_night_stay'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'room_name'); ?>
		<?php echo $form->textField($model,'room_name',array('size'=>60,'maxlength'=>64)); ?>
		<?php echo $form->error($model,'room_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'root_description'); ?>
		<?php echo $form->textField($model,'root_description',array('size'=>60,'maxlength'=>300)); ?>
		<?php echo $form->error($model,'root_description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'guests_tot_room_cap'); ?>
		<?php echo $form->textField($model,'guests_tot_room_cap',array('size'=>2,'maxlength'=>2)); ?>
		<?php echo $form->error($model,'guests_tot_room_cap'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'guests_included_price'); ?>
		<?php echo $form->textField($model,'guests_included_price',array('size'=>2,'maxlength'=>2)); ?>
		<?php echo $form->error($model,'guests_included_price'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->