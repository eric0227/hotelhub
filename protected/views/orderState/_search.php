<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?php echo $form->textFieldRow($model,'id_order_state',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'invoice',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'send_email',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'color',array('class'=>'span5','maxlength'=>32)); ?>

	<?php echo $form->textFieldRow($model,'unremovable',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'hidden',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'logable',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'delivery',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'name',array('class'=>'span5','maxlength'=>64)); ?>

	<?php echo $form->textFieldRow($model,'template',array('class'=>'span5','maxlength'=>64)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
