<?php
$this->breadcrumbs=array(
	'Destinations'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Destination','url'=>array('index')),
	array('label'=>'Create Destination','url'=>array('create')),
	array('label'=>'Update Destination','url'=>array('update','id'=>$model->id_destination)),
	array('label'=>'Delete Destination','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_destination),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Destination','url'=>array('admin')),
);
?>

<h1>View Destination #<?php echo $model->id_destination; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id_destination',
		'id_country',
		'id_state',
		'name',
		'position',
		'active',
	),
)); ?>
