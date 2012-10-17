<?php
/* @var $this CodeTypeController */
/* @var $model CodeType */

$this->breadcrumbs=array(
	'Code Types'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List CodeType', 'url'=>array('index')),
	array('label'=>'Create CodeType', 'url'=>array('create')),
	array('label'=>'Update CodeType', 'url'=>array('update', 'id'=>$model->type)),
	array('label'=>'Delete CodeType', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->type),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage CodeType', 'url'=>array('admin')),
);
?>

<h1>View CodeType #<?php echo $model->type; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'type',
		'name',
	),
)); ?>
