<?php
$this->breadcrumbs=array(
	'Specials'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Special','url'=>array('index')),
	array('label'=>'Create Special','url'=>array('create')),
	array('label'=>'Update Special','url'=>array('update','id'=>$model->id_special)),
	array('label'=>'Delete Special','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_special),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Special','url'=>array('admin')),
);
?>

<h1>View Special #<?php echo $model->id_special; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id_special',
		'name',
	),
)); ?>
