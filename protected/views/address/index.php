<?php
/* @var $this AddressController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Addresses',
);

$this->menu=array(
	array('label'=>'Create Address', 'url'=>array('create')),
	array('label'=>'Manage Address', 'url'=>array('admin')),
);
?>

<h1>Addresses</h1>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'address-form',
	'enableAjaxValidation'=>false,
)); ?>

	<div class="row">
	<?php echo CHtml::label('User', 'id_user'); ?>
	<?php 
		// echo $form->textField($model,'id_user',array('size'=>10,'maxlength'=>10));
		echo $form->dropDownList($model,'id_user', User::items(), array('empty' => '-- ALL --'));
	?>
	</div>
	
<?php
	echo CHtml::submitButton(
		'Search'
	); 
?>
<?php $this->endWidget(); ?>
</div><!-- form -->

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
