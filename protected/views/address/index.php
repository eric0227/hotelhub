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
<?php echo CHtml::beginForm(); ?>
	<div class="row">
	<?php echo CHtml::label('User', 'user'); ?>
	<?php echo CHtml::textField('user', ''); ?>
	</div>
	
<?php
	echo CHtml::submitButton(
		''
	); 
?>

<?php echo CHtml::endForm(); ?>
</div><!-- form -->

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
