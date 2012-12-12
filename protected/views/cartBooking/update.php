<?php
$this->breadcrumbs=array(
	'Cart Bookings'=>array('index'),
	$model->id_cart_booking=>array('view','id'=>$model->id_cart_booking),
	'Update',
);

$this->menu=array(
	array('label'=>'List CartBooking','url'=>array('index')),
	array('label'=>'Create CartBooking','url'=>array('create')),
	array('label'=>'View CartBooking','url'=>array('view','id'=>$model->id_cart_booking)),
	array('label'=>'Manage CartBooking','url'=>array('admin')),
);
?>

<h1>Update CartBooking <?php echo $model->id_cart_booking; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>