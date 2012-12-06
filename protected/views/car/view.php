<?php
$this->breadcrumbs=array(
	'Cars'=>array('index'),
	$model->id_product,
);

$this->menu=array(
	array('label'=>'List Car','url'=>array('index')),
	array('label'=>'Create Car','url'=>array('create')),
	array('label'=>'Update Car','url'=>array('update','id'=>$model->id_product)),
	array('label'=>'Delete Car','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_product),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Car','url'=>array('admin')),
);
?>

<h1>View Car #<?php echo $model->id_product; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id_product',
		'id_supplier',
		'car_group_code',
		'class_code',
		'trans_type',
		'people_maxnum',
	),
)); ?>
