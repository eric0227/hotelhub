<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'product-form',
	'enableAjaxValidation'=>false,
	'type' => 'horizontal',
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>
	<div class="form-actions">
	<?php echo $form->errorSummary($model); ?>

	<?php //echo $form->textFieldRow($model,'id_service',array('class'=>'span5','maxlength'=>10)); ?>

	<?php 
		//echo "<div class='control-group '>";
		//echo $form->labelEx($model,'id_category_default',
		//	array('class' => 'control-label'));
	?>
	<?php 
		// echo $form->textField($model,'id_category_default',array('size'=>10,'maxlength'=>10));
		//echo "	<div class='controls'>";
		echo $form->dropDownListRow($model, 'id_category_default', Category::items(),
			array('class' => 'span5'));
		//echo "	</div>";
		//echo "</div>";
	?>
	<?php echo $form->error($model,'id_category_default'); ?>

	<?php echo $form->textFieldRow($model,'on_sale',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'quantity',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'price',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'agent_price',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'wholesale_price',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'width',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'height',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'depth',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'weight',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'out_of_stock',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'active',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'condition',array('class'=>'span5','maxlength'=>11)); ?>

	<?php echo $form->textFieldRow($model,'show_price',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'indexed',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'date_add',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'date_upd',array('class'=>'span5')); ?>

	
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
