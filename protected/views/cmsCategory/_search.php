<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?php echo $form->textFieldRow($model,'id_cms_category',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'id_parent',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'level_depth',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'nleft',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'nright',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'active',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'date_add',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'date_upd',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'position',array('class'=>'span5','maxlength'=>10)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
