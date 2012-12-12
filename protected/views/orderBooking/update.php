<?php
$this->breadcrumbs=array(
	'Order Bookings'=>array('index'),
	$model->id_order_booking=>array('view','id'=>$model->id_order_booking),
	'Update',
);

$this->menu=array(
	array('label'=>'List OrderBooking','url'=>array('index')),
	array('label'=>'Create OrderBooking','url'=>array('create')),
	array('label'=>'View OrderBooking','url'=>array('view','id'=>$model->id_order_booking)),
	array('label'=>'Manage OrderBooking','url'=>array('admin')),
);
?>

<h1>Update OrderBooking <?php echo $model->id_order_booking; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>