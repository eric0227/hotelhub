<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'order-booking-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'id_order',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'id_service',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'id_supplier',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'id_product',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'id_bedding',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'on_refunded',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'on_return',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'total_price',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'agent_total_price',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'bookin_date',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'bookout_date',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'checkin_date',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'checkout_date',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'booking_name',array('class'=>'span5','maxlength'=>255)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
