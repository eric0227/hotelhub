<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?php echo $form->textFieldRow($model,'id_order_booking',array('class'=>'span5','maxlength'=>10)); ?>

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
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
