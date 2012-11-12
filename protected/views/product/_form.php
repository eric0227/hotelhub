<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'product-form',
	'enableAjaxValidation'=>false,
	'type' => 'horizontal',
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>
	<div class="form-actions">
	

	<?php $this->widget('MultiLangSelector'); ?>
	
	<?php echo $form->errorSummary($model); ?>

	<?php
		echo $form->dropDownListRow($model, 'id_supplier', Supplier::items(), array('class' => 'span5'));
	
	?>
		
	<?php		
		echo $form->dropDownListRow($model, 'id_category_default', Category::items(),array('class' => 'span5'));

	?>

	<?php echo $form->textFieldRow($model,'name',array('class'=>'span5', 'multilang'=>'1')); ?>
		
	<?php echo $form->textAreaRow($model,'description',array('rows'=>6, 'cols'=>30, 'class'=>'span5', 'multilang'=>'1')); ?>
	
	<?php echo $form->textAreaRow($model,'descriptionShort',array('rows'=>6, 'cols'=>30, 'class'=>'span5', 'multilang'=>'1')); ?>		

	
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
