
<?php
$this->breadcrumbs=array(
	'Users'=>array('index'),
	$id=>array('view','id'=>$id_user),
	'Change Password',
);

$this->menu=array(
	array('label'=>'List User','url'=>array('index')),
	array('label'=>'Create User','url'=>array('create')),
	array('label'=>'View User','url'=>array('view','id'=>$id)),
	array('label'=>'Update Address','url'=>array('address','id'=>$id)),
	array('label'=>'Change Password','url'=>array('password','id'=>$id)),	
	array('label'=>'Manage User','url'=>array('admin')),
);
?>


<h1>Change Password <?php echo $model->id_user; ?></h1>

<script type="text/javascript" >
function changeAddressCode(address_code){
	//alert($(address_code).val());
	$('#password-form').submit();
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

	<?php echo $form->passwordFieldRow($model,'passwd',array('class'=>'span5','maxlength'=>32)); ?>
	<?php echo $form->passwordFieldRow($model,'repeat_passwd',array('class'=>'span5','maxlength'=>32)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
