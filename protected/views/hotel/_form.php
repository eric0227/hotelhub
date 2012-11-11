<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'hotel-form',
	'enableAjaxValidation'=>false,
	'type' => 'horizontal',
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>
	<div class="form-actions">
	<?php echo $form->errorSummary($model); ?>

	<?php
		//echo "<div class='control-group '>";
		//echo $form->labelEx($model,'id_supplier',
		//	array('class' => 'control-label'));
	?>
	<?php
		//echo "	<div class='controls'>";
		echo $form->dropDownListRow($model,'id_supplier', User::items(User::SUPPLIER),
			array('class' => 'span5'));
		//echo "	</div>";
		//echo "</div>";
	?>
	<?php echo $form->error($model,'id_supplier'); ?>

	
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
