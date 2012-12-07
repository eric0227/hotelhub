<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'product-date-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
	
	<?php 
		if(empty($_REQUEST['id_product']) && $model->isNewRecord) {
			echo $form->dropDownList($model, 'id_product', Product::items());
		} else {
			echo $form->hiddenField($model, 'id_product', array('value'=>$_REQUEST['id_product']));
		}
	?>

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
	
	<div>
		<h4>Special Deal</h4>
		<div>
			<?php 
				$specialList = Special::model()->findAllByAttributes(array('id_service'=>Service::getCurrentService()));
				$specialValues = array_keys(CHtml::listData($model->specials, 'id_special', 'name'));
				echo CHtml::checkBoxList('Special', $specialValues, CHtml::listData($specialList, 'id_special', 'name'), array('template' => '<div>{input} {label}</div>', 'separator' => '', 'checkAll' => 'Check all'));
			?>
		</div>
	</div>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
