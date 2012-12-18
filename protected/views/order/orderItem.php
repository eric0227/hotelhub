<?php
/* @var $this OrderItemController */
/* @var $model OrderItem */

$this->breadcrumbs=array(
	'Order'=>array('index'),
	$model->id_order_item,
);

$this->menu=array(
	array('label'=>'List Order','url'=>array('index')),
	array('label'=>'Create Order','url'=>array('create')),
	array('label'=>'View Order','url'=>array('view','id'=>$model->id_order)),
	array('label'=>'Manage Order','url'=>array('admin')),
	array('label'=>'Order History','url'=>array('orderHistory','id'=>$model->id_order)),
);
?>

<h1>View OrderItem #<?php echo $model->id_order_item; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_order_item',
		'id_order',
		'id_service',
		'id_supplier',
		'id_product',
		'id_product_date',
		'order_item_name',
		'product_name',
		'product_quantity',
		'product_quantity_in_stock',
		'on_refunded',
		'on_return',
		'quantity_price',
		'agent_quantity_price',
		'quantity_extra_price',
		'reduction_percent',
		'reduction_amount',
		'product_quantity_discount',
		'total_price',
		'agent_total_price',
		'product_weight',
		'tax_name',
		'tax_rate',
		'discount_quantity_applied',
	),
)); ?>
