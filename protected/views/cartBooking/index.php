<?php
$this->breadcrumbs=array(
	'Cart Bookings',
);

$this->menu=array(
	array('label'=>'Create CartBooking','url'=>array('create')),
	array('label'=>'Manage CartBooking','url'=>array('admin')),
);
?>

<h1>Cart Bookings</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
