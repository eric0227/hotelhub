<?php
$this->breadcrumbs=array(
	'Order Bookings'=>array('index'),
	$model->id_order_booking,
);

$this->menu=array(
	array('label'=>'List OrderBooking','url'=>array('index')),
	array('label'=>'Create OrderBooking','url'=>array('create')),
	array('label'=>'Update OrderBooking','url'=>array('update','id'=>$model->id_order_booking)),
	array('label'=>'Delete OrderBooking','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_order_booking),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage OrderBooking','url'=>array('admin')),
);
?>

<h1>View OrderBooking #<?php echo $model->id_order_booking; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id_order_booking',
		'id_order',
		'id_service',
		'id_supplier',
		'id_product',
		'id_bedding',
		'on_refunded',
		'on_return',
		'total_price',
		'agent_total_price',
		'bookin_date',
		'bookout_date',
		'checkin_date',
		'checkout_date',
		'booking_name',
	),
)); ?>
