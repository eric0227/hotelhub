<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'product-date-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div >
		<?php echo $form->labelEx($model,'id_product'); ?>
		<?php 
			//echo $form->textField($model,'id_product',array('size'=>10,'maxlength'=>10)); 
			echo $form->dropDownList($model, 'id_product', Product::items());
		?>
		<?php echo $form->error($model,'id_product'); ?>
	</div>

	<div >
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

	<?php echo $form->textFieldRow($model,'price',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'agent_price',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'quantity',array('class'=>'span5','maxlength'=>10)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
