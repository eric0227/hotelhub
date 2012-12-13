<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'destination-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php //echo $form->textFieldRow($model,'id_country',array('class'=>'span5','maxlength'=>11)); ?>
	
	<?php 
		//echo $form->textField($model,'id_country',array('size'=>10,'maxlength'=>10));
		echo $form->dropDownListRow(
			$model,'id_country', Country::items(),
			array(
				'prompt' => '--Please select--',		
				'ajax' => array(
					'type' => 'POST',
					'url' => CController::createUrl('address/stateOptions'),
					'update'=>'#' . CHtml::activeId($model, 'id_state')
				)
			)
		);
	?>	

	<?php //echo $form->textFieldRow($model,'id_state',array('class'=>'span5','maxlength'=>11)); ?>

	<?php
		$state = array();
		if(isset($model->id_country)) {
			$state = State::items($model->id_country);
		}
		echo $form->dropDownListRow($model,'id_state',$state,array('prompt'=>'---Please select---'));
	?>
	
	<?php echo $form->textFieldRow($model,'name',array('class'=>'span5','maxlength'=>120)); ?>

	<?php echo $form->textFieldRow($model,'position',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'active',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
