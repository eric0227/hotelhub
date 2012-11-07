<?php
$this->breadcrumbs=array(
	'Carts'=>array('index'),
	$model->id_cart,
);

$this->menu=array(
	array('label'=>'List Cart','url'=>array('index')),
	array('label'=>'Create Cart','url'=>array('create')),
	array('label'=>'Update Cart','url'=>array('update','id'=>$model->id_cart)),
	array('label'=>'Delete Cart','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_cart),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Cart','url'=>array('admin')),
);
?>

<h1>View Cart #<?php echo $model->id_cart; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id_cart',
		'id_address_delivery',
		'id_address_invoice',
		'id_currency',
		'id_user',
		'secure_key',
		'recyclable',
		'gift',
		'gift_message',
		'date_add',
		'date_upd',
		'on_order',
	),
)); ?>
