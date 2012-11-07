<?php
$this->breadcrumbs=array(
	'Cart Products'=>array('index'),
	$model->id_cart_product,
);

$this->menu=array(
	array('label'=>'List CartProduct','url'=>array('index')),
	array('label'=>'Create CartProduct','url'=>array('create')),
	array('label'=>'Update CartProduct','url'=>array('update','id'=>$model->id_cart_product)),
	array('label'=>'Delete CartProduct','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_cart_product),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage CartProduct','url'=>array('admin')),
);
?>

<h1>View CartProduct #<?php echo $model->id_cart_product; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id_cart_product',
		'id_cart',
		'id_product',
		'id_product_date',
		'quantity',
		'date_add',
	),
)); ?>
