<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?php echo $form->textFieldRow($model,'id_country',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'id_zone',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'id_currency',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'iso_code',array('class'=>'span5','maxlength'=>3)); ?>

	<?php echo $form->textFieldRow($model,'name',array('class'=>'span5','maxlength'=>64)); ?>

	<?php echo $form->textFieldRow($model,'call_prefix',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'active',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'contains_states',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'need_identification_number',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'need_zip_code',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'zip_code_format',array('class'=>'span5','maxlength'=>12)); ?>

	<?php echo $form->textFieldRow($model,'display_tax_label',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
