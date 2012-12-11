<?php
$this->breadcrumbs=array(
	'Order Bookings'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List OrderBooking','url'=>array('index')),
	array('label'=>'Manage OrderBooking','url'=>array('admin')),
);
?>

<h1>Create OrderBooking</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>