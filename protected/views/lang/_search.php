<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?php echo $form->textFieldRow($model,'id_lang',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'name',array('class'=>'span5','maxlength'=>32)); ?>

	<?php echo $form->textFieldRow($model,'active',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'iso_code',array('class'=>'span5','maxlength'=>2)); ?>

	<?php echo $form->textFieldRow($model,'language_code',array('class'=>'span5','maxlength'=>5)); ?>

	<?php echo $form->textFieldRow($model,'date_format_lite',array('class'=>'span5','maxlength'=>32)); ?>

	<?php echo $form->textFieldRow($model,'date_format_full',array('class'=>'span5','maxlength'=>32)); ?>

	<?php echo $form->textFieldRow($model,'is_rtl',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
