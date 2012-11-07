<?php
$this->breadcrumbs=array(
	'Beddings'=>array('index'),
	$model->id_bedding,
);

$this->menu=array(
	array('label'=>'List Bedding','url'=>array('index')),
	array('label'=>'Create Bedding','url'=>array('create')),
	array('label'=>'Update Bedding','url'=>array('update','id'=>$model->id_bedding)),
	array('label'=>'Delete Bedding','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_bedding),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Bedding','url'=>array('admin')),
);
?>

<h1>View Bedding #<?php echo $model->id_bedding; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id_bedding',
		'id_room',
		'gest_num',
		'single_num',
		'double_num',
		'beddig_desc',
		'additional_cost',
		'cots_available',
	),
)); ?>
