<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?php echo $form->textFieldRow($model,'id_currency',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'name',array('class'=>'span5','maxlength'=>32)); ?>

	<?php echo $form->textFieldRow($model,'iso_code',array('class'=>'span5','maxlength'=>3)); ?>

	<?php echo $form->textFieldRow($model,'iso_code_num',array('class'=>'span5','maxlength'=>3)); ?>

	<?php echo $form->textFieldRow($model,'sign',array('class'=>'span5','maxlength'=>8)); ?>

	<?php echo $form->textFieldRow($model,'blank',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'format',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'decimals',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'conversion_rate',array('class'=>'span5','maxlength'=>13)); ?>

	<?php echo $form->textFieldRow($model,'deleted',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'active',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
