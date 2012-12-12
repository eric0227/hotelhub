<?php
$this->breadcrumbs=array(
	'Cart Bookings'=>array('index'),
	$model->id_cart_booking,
);

$this->menu=array(
	array('label'=>'List CartBooking','url'=>array('index')),
	array('label'=>'Create CartBooking','url'=>array('create')),
	array('label'=>'Update CartBooking','url'=>array('update','id'=>$model->id_cart_booking)),
	array('label'=>'Delete CartBooking','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_cart_booking),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage CartBooking','url'=>array('admin')),
);
?>

<h1>View CartBooking #<?php echo $model->id_cart_booking; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id_cart_booking',
		'id_cart',
		'id_product',
		'id_bedding',
		'bookin_date',
		'bookout_date',
		'date_add',
	),
)); ?>
