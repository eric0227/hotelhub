<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'id_group'); ?>
		<?php 
			//echo $form->textField($model,'id_group',array('size'=>10,'maxlength'=>10));
			echo $form->dropDownList($model,'id_group', Group::items());
		?>
		<?php echo $form->error($model,'id_group'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_lang'); ?>
		<?php 
			//echo $form->textField($model,'id_lang',array('size'=>10,'maxlength'=>10));
			echo $form->dropDownList($model,'id_lang', Lang::items());		
		?>
		<?php echo $form->error($model,'id_lang'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'lastname'); ?>
		<?php echo $form->textField($model,'lastname',array('size'=>32,'maxlength'=>32)); ?>
		<?php echo $form->error($model,'lastname'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'firstname'); ?>
		<?php echo $form->textField($model,'firstname',array('size'=>32,'maxlength'=>32)); ?>
		<?php echo $form->error($model,'firstname'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'passwd'); ?>
		<?php echo $form->passwordField($model,'passwd',array('size'=>32,'maxlength'=>32)); ?>
		<?php echo $form->error($model,'passwd'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'is_guest'); ?>
		<?php echo $form->textField($model,'is_guest'); ?>
		<?php echo $form->error($model,'is_guest'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'note'); ?>
		<?php echo $form->textArea($model,'note',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'note'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'birthday'); ?>
		<?php echo $form->textField($model,'birthday'); ?>
		<?php echo $form->error($model,'birthday'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'active'); ?>
		<?php echo $form->textField($model,'active'); ?>
		<?php echo $form->error($model,'active'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'deleted'); ?>
		<?php echo $form->textField($model,'deleted'); ?>
		<?php echo $form->error($model,'deleted'); ?>
	</div>
	
	<div class="row">	
		
		<?php echo $form->labelEx($model,'addresses'); ?>
		manage
		
		<?php 
			foreach($model->addresses as $address) {
				//print_r($address);
// 				/echo $address->addressCode->name;
	
				echo ',<br>';
			}
		?>	
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->