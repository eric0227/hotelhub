<?php
$this->breadcrumbs=array(
	'Configurations'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Configuration','url'=>array('index')),
	array('label'=>'Create Configuration','url'=>array('create')),
	array('label'=>'Update Configuration','url'=>array('update','id'=>$model->id_configuration)),
	array('label'=>'Delete Configuration','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_configuration),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Configuration','url'=>array('admin')),
);
?>

<h1>View Configuration #<?php echo $model->id_configuration; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id_configuration',
		'name',
		'value',
		'date_add',
		'date_upd',
		'message'
	),
)); ?>
