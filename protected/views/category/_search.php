<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?php echo $form->textFieldRow($model,'id_category',array('class'=>'span5','maxlength'=>10)); ?>
	
	<div class="form-actions">
		<?php echo CHtml::submitButton('Search');?>
	</div>

<?php $this->endWidget(); ?>
