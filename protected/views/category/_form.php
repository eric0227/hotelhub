<?php
/* @var $this CategoryController */
/* @var $model Category */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'category-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
	
	<div class="row">
		<?php echo $form->labelEx($model,'id_parent'); ?>
		<?php 
			// echo $form->textField($model,'id_parent',array('size'=>10,'maxlength'=>10));
			echo $form->dropDownList($model,'id_parent', $parentItems);			
		?>
		<?php echo $form->error($model,'id_parent'); ?>
	</div>

<?php /*
	<div class="row">
		<?php echo $form->labelEx($model,'level_depth'); ?>
		<?php echo $form->textField($model,'level_depth'); ?>
		<?php echo $form->error($model,'level_depth'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nleft'); ?>
		<?php echo $form->textField($model,'nleft',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'nleft'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'nright'); ?>
		<?php echo $form->textField($model,'nright',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'nright'); ?>
	</div>
*/ ?>

	<div class="row">
		<?php echo $form->labelEx($model,'active'); ?>
		<?php echo $form->textField($model,'active'); ?>
		<?php echo $form->error($model,'active'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'date_add'); ?>
		<?php echo $form->textField($model,'date_add'); ?>
		<?php echo $form->error($model,'date_add'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'date_upd'); ?>
		<?php echo $form->textField($model,'date_upd'); ?>
		<?php echo $form->error($model,'date_upd'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'position'); ?>
		<?php echo $form->textField($model,'position',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'position'); ?>
	</div>
	
	<?php 
		foreach($langModels as $langModel) {
			echo '<div class="row">';
			//echo $form->hiddenField($langModel,'id_lang');
			echo $form->textField($langModel,'id_lang');
			
			echo $form->labelEx($langModel,'name');
			echo $form->textField($langModel,'name');			
			echo '</div>';
		}	
	?>
	
	
	
	

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->