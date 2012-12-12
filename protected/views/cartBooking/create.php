<?php
$this->breadcrumbs=array(
	'Cart Bookings'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List CartBooking','url'=>array('index')),
	array('label'=>'Manage CartBooking','url'=>array('admin')),
);
?>

<h1>Create CartBooking</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>