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
	array('label'=>'Car Images', 'url'=>array('/imageProduct/index','id_product'=>$model->id_product)),
	array('label'=>'Car Date', 'url'=>array('/productDate/index', 'id_product'=>$model->id_product))
);
?>

<h1>View Car #<?php echo $model->id_product; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id_product',
		'id_supplier',
		array('name'=>'product.car_name', 'value'=>$model->product->name),
		array('name'=>'classCode.class', 'value'=>$model->classCode->name),
		array('name'=>'carGroupCode.group', 'value'=>$model->carGroupCode->name),
		'trans_type',
		'people_maxnum',
		array('name'=>'product.price', 'value'=>$model->product->price),
		array('name'=>'product.agent_price', 'value'=>$model->product->agent_price),
	),
)); ?>
