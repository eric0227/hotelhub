<?php
$this->breadcrumbs=array(
	'Currencies'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Currency','url'=>array('index')),
	array('label'=>'Create Currency','url'=>array('create')),
	array('label'=>'Update Currency','url'=>array('update','id'=>$model->id_currency)),
	array('label'=>'Delete Currency','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_currency),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Currency','url'=>array('admin')),
);
?>

<h1>View Currency #<?php echo $model->id_currency; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id_currency',
		'name',
		'iso_code',
		'iso_code_num',
		'sign',
		'blank',
		'format',
		'decimals',
		'conversion_rate',
		'deleted',
		'active',
	),
)); ?>
