<?php
$this->breadcrumbs=array(
	'Products'=>array('index'),
	$model->id_product,
);

$this->menu=array(
	array('label'=>'List Product','url'=>array('index')),
	array('label'=>'Create Product','url'=>array('create')),
	array('label'=>'Update Product','url'=>array('update','id'=>$model->id_product)),
	array('label'=>'Delete Product','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_product),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Images', 'url'=>array('/imageProduct/index','id_product'=>$model->id_product)),
	array('label'=>'Update Address','url'=>array('address','id'=>$model->id_product)),
//array('label'=>'Manage Product','url'=>array('admin')),
);
?>

<h1>View Product #<?php echo $model->id_product; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id_product',
		'id_service',
		'id_supplier',
		'id_category_default',
		'name',
		'description',
		'description_short',
		'maker',
		'on_sale',
		'quantity',
		'price',
		'agent_price',
		'wholesale_price',
		'width',
		'height',
		'depth',
		'weight',
		'out_of_stock',
		'active',
		'condition',
		'show_price',
		'indexed',
		'date_add',
		'date_upd',
	),
)); ?>
