<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'order-history-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php //echo $form->textFieldRow($model,'id_user',array('class'=>'span5','maxlength'=>10)); ?>

	<div>
		<?php echo $form->labelEx($model,'id_order'); ?>
		<?php 
			//echo $form->textField($model,'id_order',array('size'=>10,'maxlength'=>10)); 
			echo $form->dropDownList($model, 'id_order', Order::items());
		?>
		<?php echo $form->error($model,'id_order'); ?>
	</div>

	<div>
		<?php echo $form->labelEx($model,'id_order_state'); ?>
		<?php 
			// echo $form->textField($model,'id_order_state',array('size'=>10,'maxlength'=>10));
			echo $form->dropDownList($model, 'id_order_state', OrderState::items());
		?>
		<?php echo $form->error($model,'id_order_state'); ?>
	</div>

	<?php echo $form->textFieldRow($model,'date_add',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'comment',array('class'=>'span5','maxlength'=>300)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
