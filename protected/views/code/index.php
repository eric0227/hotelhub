<?php
/* @var $this CodeController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Codes',
);

$this->menu=array(
	array('label'=>'Create Code', 'url'=>array('create')),
	array('label'=>'Manage Code', 'url'=>array('admin')),
);
?>

<h1>Codes</h1>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'code-form',
	'enableAjaxValidation'=>false,
)); ?>


<div class="row">
<?php echo CHtml::label('CodeType', 'type'); ?>
<?php 
	echo $form->dropDownList($model,'type', CodeType::items(), array('empty' => '-- ALL --'));
?>
</div>

<?php
	echo CHtml::submitButton(
		'Search'
	); 
?>
<?php $this->endWidget(); ?>
</div>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
