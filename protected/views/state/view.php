<?php
$this->breadcrumbs=array(
	'States'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List State','url'=>array('index')),
	array('label'=>'Create State','url'=>array('create')),
	array('label'=>'Update State','url'=>array('update','id'=>$model->id_state)),
	array('label'=>'Delete State','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_state),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage State','url'=>array('admin')),
);
?>

<h1>View State #<?php echo $model->id_state; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id_state',
		'id_country',
		'id_zone',
		'name',
		'iso_code',
		'tax_behavior',
		'active',
	),
)); ?>
