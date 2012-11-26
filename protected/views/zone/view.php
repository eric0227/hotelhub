<?php
$this->breadcrumbs=array(
	'Zones'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Zone','url'=>array('index')),
	array('label'=>'Create Zone','url'=>array('create')),
	array('label'=>'Update Zone','url'=>array('update','id'=>$model->id_zone)),
	array('label'=>'Delete Zone','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_zone),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Zone','url'=>array('admin')),
);
?>

<h1>View Zone #<?php echo $model->id_zone; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id_zone',
		'name',
		'active',
	),
)); ?>
