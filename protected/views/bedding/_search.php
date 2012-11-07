<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?php echo $form->textFieldRow($model,'id_bedding',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'id_room',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'gest_num',array('class'=>'span5','maxlength'=>2)); ?>

	<?php echo $form->textFieldRow($model,'single_num',array('class'=>'span5','maxlength'=>2)); ?>

	<?php echo $form->textFieldRow($model,'double_num',array('class'=>'span5','maxlength'=>2)); ?>

	<?php echo $form->textFieldRow($model,'beddig_desc',array('class'=>'span5','maxlength'=>200)); ?>

	<?php echo $form->textFieldRow($model,'additional_cost',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'cots_available',array('class'=>'span5','maxlength'=>2)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
