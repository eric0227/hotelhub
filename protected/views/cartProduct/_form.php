<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'cart-product-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div>
		<?php echo $form->labelEx($model,'id_cart'); ?>
		<?php 
			//echo $form->textField($model,'id_cart',array('size'=>10,'maxlength'=>10)); 
			echo $form->dropDownList($model, 'id_cart', Cart::items());
		?>
		<?php echo $form->error($model,'id_cart'); ?>
	</div>

	<div>
		<?php echo $form->labelEx($model,'id_product'); ?>
		<?php 
			//echo $form->textField($model,'id_product',array('size'=>10,'maxlength'=>10)); 
			echo $form->dropDownList(
				$model, 'id_product', Product::items(),
				array(
					'prompt' => '--Please select--',		
					'ajax' => array(
						'type' => 'POST',
						'url' => CController::createUrl('productDate/prodectDateOptions'),
						'update'=>'#' . CHtml::activeId($model, 'id_product_date')
					)
				)
			);
		?>
		<?php echo $form->error($model,'id_product'); ?>
	</div>

	<div>
		<?php echo $form->labelEx($model,'id_product_date'); ?>
		<?php
			//echo $form->textField($model,'id_product_date',array('size'=>10,'maxlength'=>10));
			$productDateList = ProductDate::model()->findAll('id_product = :id_product', array(':id_product'=>$model->id_product));
			$listData = CHtml::listData($productDateList, 'id_product_date', 'id_product_date');
		
			echo $form->dropDownList($model,'id_product_date', $listData);
		?>
		<?php echo $form->error($model,'id_product_date'); ?>
	</div>

	<?php echo $form->textFieldRow($model,'quantity',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'date_add',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
