<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?php echo $form->textFieldRow($model,'id_order',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'id_lang',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'id_user',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'id_cart',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'id_currency',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'id_address_delivery',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'id_address_invoice',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'secure_key',array('class'=>'span5','maxlength'=>32)); ?>

	<?php echo $form->textFieldRow($model,'payment',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'conversion_rate',array('class'=>'span5','maxlength'=>13)); ?>

	<?php echo $form->textFieldRow($model,'gift',array('class'=>'span5')); ?>

	<?php echo $form->textAreaRow($model,'gift_message',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textFieldRow($model,'total_price',array('class'=>'span5','maxlength'=>17)); ?>

	<?php echo $form->textFieldRow($model,'total_agent_price',array('class'=>'span5','maxlength'=>17)); ?>

	<?php echo $form->textFieldRow($model,'total_discount',array('class'=>'span5','maxlength'=>17)); ?>

	<?php echo $form->textFieldRow($model,'total_paid',array('class'=>'span5','maxlength'=>17)); ?>

	<?php echo $form->textFieldRow($model,'invoice_number',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'delivery_number',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'invoice_date',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'delivery_date',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'date_add',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'date_upd',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'on_agent',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
