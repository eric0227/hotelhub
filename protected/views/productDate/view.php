<?php
$this->breadcrumbs=array(
	'Product Dates'=>array('index'),
	$model->id_product_date,
);

$this->menu=array(
	array('label'=>'List ProductDate','url'=>array('index')),
	array('label'=>'Create ProductDate','url'=>array('create')),
	array('label'=>'Update ProductDate','url'=>array('update','id'=>$model->id_product_date)),
	array('label'=>'Delete ProductDate','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_product_date),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ProductDate','url'=>array('admin')),
);
?>

<h1>View ProductDate #<?php echo $model->id_product_date; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id_product_date',
		'id_product',
		'on_date',
		'price',
		'agent_price',
		'quantity',
	),
)); ?>
