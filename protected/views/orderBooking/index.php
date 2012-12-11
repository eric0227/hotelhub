<?php
$this->breadcrumbs=array(
	'Order Bookings',
);

$this->menu=array(
	array('label'=>'Create OrderBooking','url'=>array('create')),
	array('label'=>'Manage OrderBooking','url'=>array('admin')),
);
?>

<h1>Order Bookings</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
