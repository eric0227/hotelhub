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
		if($model->isNewRecord) {
			echo $form->dropDownListRow($model, 'id_supplier', Supplier::items(), array('class' => 'span5'));
		}
	?>
		
	<?php		
		echo $form->dropDownListRow($model, 'id_category_default', Category::items(),array('class' => 'span5'));

	?>

	<?php echo $form->textFieldRow($model,'name',array('class'=>'span5', 'multilang'=>'1')); ?>
		
	<?php echo $form->textAreaRow($model,'description',array('rows'=>6, 'cols'=>30, 'class'=>'span5', 'multilang'=>'1')); ?>
	
	<?php echo $form->textAreaRow($model,'description_short',array('rows'=>6, 'cols'=>30, 'class'=>'span5', 'multilang'=>'1')); ?>		

	<div class="control-group ">
		<?php echo $form->label($model,'on_sale', array('class'=>'control-label')); ?>
		<div class="controls">
			<?php echo $form->checkBox($model,'on_sale',array('value'=>'1', 'class'=>'span1')); ?>
		</div>
	</div>	

	<?php echo $form->textFieldRow($model,'quantity',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'price',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'agent_price',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'wholesale_price',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'width',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'height',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'depth',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'weight',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'out_of_stock',array('class'=>'span5','maxlength'=>10)); ?>

	<div class="control-group ">
		<?php echo $form->label($model,'active', array('class'=>'control-label')); ?>
		<div class="controls">
			<?php echo $form->checkBox($model,'active',array('value'=>'1', 'class'=>'span1')); ?>
		</div>
	</div>

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
