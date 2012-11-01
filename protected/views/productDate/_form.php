<?php
/* @var $this ProductDateController */
/* @var $model ProductDate */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'product-date-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'id_product'); ?>
		<?php 
			//echo $form->textField($model,'id_product',array('size'=>10,'maxlength'=>10)); 
			echo $form->dropDownList($model, 'id_product', Product::items());
		?>
		<?php echo $form->error($model,'id_product'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'on_date'); ?>
		<?php 
			//echo $form->textField($model,'on_date'); 
			$this->widget('zii.widgets.jui.CJuiDatePicker', array(
				'model'=>$model,
			    'name'=>'ProductDate[on_date]',
				'value'=>(!empty($model->on_date))? substr($model->on_date, 0, 10) : date('Y-m-d'),
			    'options'=>array(
			        'showAnim'=>'fold',
					'mode'=>'datetime',
					'dateFormat'=>'yy-mm-dd',
					
				),
			    'htmlOptions'=>array(
			        'style'=>'height:20px;',
					
				),
			));
			
			//echo Yii::app()->dateFormatter->formatDateTime('yyyy-MM-dd', $model->on_date) ;
			//echo substr($model->on_date, 0, 10);
		?>
		<?php echo $form->error($model,'on_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'price'); ?>
		<?php echo $form->textField($model,'price',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'price'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'agent_price'); ?>
		<?php echo $form->textField($model,'agent_price',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'agent_price'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'quantity'); ?>
		<?php echo $form->textField($model,'quantity',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'quantity'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->