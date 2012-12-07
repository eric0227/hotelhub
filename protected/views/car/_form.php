<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'car-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
	
	<?php //echo $form->textFieldRow($model,'id_product',array('class'=>'span5','maxlength'=>10)); ?>

	<?php
		if($product->isNewRecord && Yii::app()->user->isAdmin()) {
			echo $form->dropDownListRow($product,'id_supplier',Supplier::items(), array('class'=>'span5','maxlength'=>10));
		}
	?>

	<?php echo $form->dropDownListRow($model,'car_group_code',Code::items(CodeType::CAR_GROUP), array('class'=>'span5','maxlength'=>6)); ?>

	<?php echo $form->dropDownListRow($model,'class_code', Code::items(CodeType::CAR_CLASS), array('class'=>'span5','maxlength'=>6)); ?>

	<?php echo $form->dropDownListRow($model,'trans_type', Car::transTypeItems(), array('class'=>'span5','maxlength'=>9)); ?>

	<?php echo $form->dropDownListRow($model,'people_maxnum', 
		array('1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5','6'=>'6','7'=>'7','8'=>'8','9'=>'9','10'=>'10','11'=>'11','12'=>'12'), 
		array('class'=>'span5','maxlength'=>2)); ?>

	
	<?php echo $form->textFieldRow($product,'price',array('class'=>'span5'));  ?>
	<?php echo $form->textFieldRow($product,'agent_price',array('class'=>'span5'));  ?>
	
	<?php echo $form->errorSummary($product); ?>
	<?php $this->widget('MultiLangSelector'); ?>
	
	<?php		
		echo $form->dropDownListRow($product, 'id_category_default', Category::items(),array('class' => 'span5'));
	?>

	<?php echo $form->textFieldRow($product,'name',array('class'=>'span5', 'multilang'=>'1')); ?>
		
	<?php echo $form->textAreaRow($product,'description',array('rows'=>6, 'cols'=>30, 'class'=>'span5', 'multilang'=>'1')); ?>
	
	<?php echo $form->textAreaRow($product,'description_short',array('rows'=>6, 'cols'=>30, 'class'=>'span5', 'multilang'=>'1')); ?>		
	
	<?php echo $form->textFieldRow($product,'maker',array('class'=>'span5')); ?>



	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
