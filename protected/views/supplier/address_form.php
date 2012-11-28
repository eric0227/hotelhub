<?php
$this->breadcrumbs=array(
	'Address Update',
);


?>

<h1>Update Address <?php echo $model->id_address; ?></h1>

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'address-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
	

	<?php echo $form->labelEx($model,'id_country'); ?>
	<?php 
		//echo $form->textField($model,'id_country',array('size'=>10,'maxlength'=>10));
		echo $form->dropDownList(
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
	
	<?php echo $form->error($model,'id_country'); ?>

	
	<?php echo $form->labelEx($model,'id_state'); ?>
	<?php
		$state = array();
		if(isset($model->id_country)) {
			$state = State::items($model->id_country);
		}
		echo $form->dropDownList($model,'id_state',$state,
			array(
				'prompt'=>'---Please select---',
				'ajax' => array(
					'type' => 'POST',
					'url' => CController::createUrl('address/destinationOptions'),
					'update'=>'#' . CHtml::activeId($model, 'id_destination')
				)
			)
		);
	?>
	<?php echo $form->error($model,'id_state'); ?>
	
	<?php echo $form->labelEx($model,'id_destination'); ?>
		<?php
			$destination = array();
			if(isset($model->id_country)) {
				$destination = Destination::items($model->id_country, $model->id_state);
			}
			echo $form->dropDownList($model,'id_destination',$destination,array('prompt'=>'---Please select---'));
		?>
	<?php echo $form->error($model,'id_destination'); ?>

	<?php echo $form->labelEx($model,'address_code'); ?>
	<?php 
		echo $form->dropDownList($model,'address_code', Code::items(Address::CODE_TYPE));
	?>
	<?php echo $form->error($model,'address_code'); ?>

	<?php //echo $form->textFieldRow($model,'alias',array('class'=>'span5','maxlength'=>32)); ?>

	<?php echo $form->textFieldRow($model,'company',array('class'=>'span5','maxlength'=>32)); ?>

	<?php echo $form->textFieldRow($model,'lastname',array('class'=>'span5','maxlength'=>32)); ?>

	<?php echo $form->textFieldRow($model,'firstname',array('class'=>'span5','maxlength'=>32)); ?>

	<?php echo $form->textFieldRow($model,'address1',array('class'=>'span5','maxlength'=>128)); ?>

	<?php echo $form->textFieldRow($model,'address2',array('class'=>'span5','maxlength'=>128)); ?>

	<?php echo $form->textFieldRow($model,'postcode',array('class'=>'span5','maxlength'=>12)); ?>

	<?php echo $form->textFieldRow($model,'city',array('class'=>'span5','maxlength'=>64)); ?>

	<?php echo $form->textAreaRow($model,'other',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textFieldRow($model,'phone',array('class'=>'span5','maxlength'=>16)); ?>

	<?php echo $form->textFieldRow($model,'phone_mobile',array('class'=>'span5','maxlength'=>16)); ?>

	<?php echo $form->textFieldRow($model,'vat_number',array('class'=>'span5','maxlength'=>32)); ?>

	<?php echo $form->textFieldRow($model,'dni',array('class'=>'span5','maxlength'=>16)); ?>
	
	<?php echo $form->textFieldRow($model,'latitude',array('class'=>'span5','maxlength'=>32)); ?>
	<?php echo $form->textFieldRow($model,'longitude',array('class'=>'span5','maxlength'=>32)); ?>
	
	<?php echo $form->textFieldRow($model,'date_add',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'date_upd',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'active',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'deleted',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
