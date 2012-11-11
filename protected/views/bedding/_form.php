<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'bedding-form',
	'enableAjaxValidation'=>false,
	'type' => 'horizontal',
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>
	<div class="form-actions">
	<?php echo $form->errorSummary($model); ?>

	<?php
		//echo "<div class='control-group '>";
		//echo $form->labelEx($model,'id_room',
		//	array('class' => 'control-label'));
	?>
	<?php 
		// echo $form->textField($model,'id_room',array('size'=>10,'maxlength'=>10)); 
		echo $form->dropDownListRow($model, 'id_room', Room::items(),
			array('class' => 'span5'));
	?>
	<?php echo $form->error($model,'id_room'); ?>

	<?php echo $form->textFieldRow($model,'gest_num',array('class'=>'span5','maxlength'=>2)); ?>

	<?php echo $form->textFieldRow($model,'single_num',array('class'=>'span5','maxlength'=>2)); ?>

	<?php echo $form->textFieldRow($model,'double_num',array('class'=>'span5','maxlength'=>2)); ?>

	<?php echo $form->textFieldRow($model,'beddig_desc',array('class'=>'span5','maxlength'=>200)); ?>

	<?php echo $form->textFieldRow($model,'additional_cost',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'cots_available',array('class'=>'span5','maxlength'=>2)); ?>

	
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
