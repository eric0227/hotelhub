
<?php
$this->breadcrumbs=array(
	'Users'=>array('index'),
	$id=>array('view','id'=>$id_user),
	'Update Address',
);

$this->menu=array(
	array('label'=>'List User','url'=>array('index')),
	array('label'=>'Create User','url'=>array('create')),
	array('label'=>'View User','url'=>array('view','id'=>$id)),
	array('label'=>'Update Address','url'=>array('address','id'=>$id)),
	array('label'=>'Change Password','url'=>array('password','id'=>$model->id_user)),	
	array('label'=>'Manage User','url'=>array('admin')),
);
?>


<h1>Update Address <?php echo $model->id_address; ?></h1>

<script type="text/javascript" >
function changeAddressCode(address_code){
	//alert($(address_code).val());
	$('#address-form').submit();
}
</script>

	<?php 
		Yii::app()->clientScript->registerScript(
	       'myHideEffect',
	       '$(".flash-success").animate({opacity: 1.0}, 3000).fadeOut("slow");',
				CClientScript::POS_READY
		);
		
		$form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
			'id'=>'address-form',
			'enableAjaxValidation'=>false,
		)); 
	?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>
	
	<?php if(Yii::app()->user->hasFlash('success')):?>
	    <div class="flash-success">
	        <?php echo Yii::app()->user->getFlash('success'); ?>
	    </div>
	<?php endif; ?>
	
	<?php echo $form->errorSummary($model); ?>

	<?php 
		echo $form->dropDownListRow($model,'address_code', Code::items(Address::CODE_TYPE), array('onChange'=>'changeAddressCode(this)'));
	?>
		
	<?php
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

	<?php
		$state = array();
		if(isset($model->id_country)) {
			$state = State::items($model->id_country);
		}
		echo $form->dropDownListRow($model,'id_state',$state,
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

	<?php
		$destination = array();
		if(isset($model->id_country)) {
			$destination = Destination::items($model->id_country, $model->id_state);
		}
		echo $form->dropDownListRow($model,'id_destination',$destination,array('prompt'=>'---Please select---'));
	?>

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
