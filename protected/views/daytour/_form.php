<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'product-form',
	'enableAjaxValidation'=>false,
	'type' => 'horizontal',
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>
	<div class="form-actions">
	

	<?php $this->widget('MultiLangSelector'); ?>
	
	<?php echo $form->errorSummary($product); ?>

	<?php
		if($product->isNewRecord) {
			echo $form->dropDownListRow($product, 'id_supplier', Supplier::items(), array('class' => 'span5'));
		}
	?>
		
	<?php		
		echo $form->dropDownListRow($product, 'id_category_default', Category::items(),array('class' => 'span5'));

	?>

	<?php echo $form->textFieldRow($product,'name',array('class'=>'span5', 'multilang'=>'1')); ?>
		
	<?php echo $form->textAreaRow($product,'description',array('rows'=>6, 'cols'=>30, 'class'=>'span5 tinymce', 'multilang'=>'1')); ?>
	
	<?php echo $form->textAreaRow($product,'description_short',array('rows'=>6, 'cols'=>30, 'class'=>'span5 tinymce', 'multilang'=>'1')); ?>		
	
	<?php echo $form->textFieldRow($product,'maker',array('class'=>'span5')); ?>

	<div class="control-group ">
		<?php echo $form->label($product,'on_sale', array('class'=>'control-label')); ?>
		<div class="controls">
			<?php echo $form->checkBox($product,'on_sale',array('value'=>'1', 'class'=>'span1')); ?>
		</div>
	</div>	

	<?php echo $form->textFieldRow($product,'quantity',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($product,'price',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($product,'agent_price',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($product,'wholesale_price',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($product,'width',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($product,'height',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($product,'depth',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($product,'weight',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($product,'out_of_stock',array('class'=>'span5','maxlength'=>10)); ?>

	<div class="control-group ">
		<?php echo $form->label($product,'active', array('class'=>'control-label')); ?>
		<div class="controls">
			<?php echo $form->checkBox($product,'active',array('value'=>'1', 'class'=>'span1')); ?>
		</div>
	</div>

	<?php echo $form->textFieldRow($product,'condition',array('class'=>'span5','maxlength'=>11)); ?>

	<?php echo $form->textFieldRow($product,'show_price',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($product,'indexed',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($product,'date_add',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($product,'date_upd',array('class'=>'span5')); ?>

	
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$product->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
