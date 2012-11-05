<?php
/* @var $this CartProductController */
/* @var $model CartProduct */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'cart-product-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'id_cart'); ?>
		<?php 
			//echo $form->textField($model,'id_cart',array('size'=>10,'maxlength'=>10)); 
			echo $form->dropDownList($model, 'id_cart', Cart::items());
		?>
		<?php echo $form->error($model,'id_cart'); ?>
	</div>

	<div class="row">
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

	<div class="row">
		<?php echo $form->labelEx($model,'id_product_date'); ?>
		<?php
			//echo $form->textField($model,'id_product_date',array('size'=>10,'maxlength'=>10));
			$productDateList = ProductDate::model()->findAll('id_product = :id_product', array(':id_product'=>$model->id_product));
			$listData = CHtml::listData($productDateList, 'id_product_date', 'id_product_date');
		
			echo $form->dropDownList($model,'id_product_date', $listData);
		?>
		<?php echo $form->error($model,'id_product_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'quantity'); ?>
		<?php echo $form->textField($model,'quantity',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'quantity'); ?>
	</div>

<?php /* ?>
	<div class="row">
		<?php echo $form->labelEx($model,'date_add'); ?>
		<?php echo $form->textField($model,'date_add'); ?>
		<?php echo $form->error($model,'date_add'); ?>
	</div>
<?php */ ?>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->