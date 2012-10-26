<?php
/* @var $this ProductRoomController */
/* @var $model ProductRoom */

$this->breadcrumbs=array(
	'Product Rooms'=>array('index'),
	$model->id_product_room,
);

$this->menu=array(
	array('label'=>'List ProductRoom', 'url'=>array('index')),
	array('label'=>'Create ProductRoom', 'url'=>array('create')),
	array('label'=>'Update ProductRoom', 'url'=>array('update', 'id'=>$model->id_product_room)),
	array('label'=>'Delete ProductRoom', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_product_room),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ProductRoom', 'url'=>array('admin')),
);
?>

<h1>View ProductRoom #<?php echo $model->id_product_room; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_product_room',
		'id_product',
		'id_hotel',
		'id_room_type',
		'room_type_code',
		'lead_in_room_type',
		'full_rate',
		'min_night_stay',
		'max_night_stay',
		'room_name',
		'root_description',
		'guests_tot_room_cap',
		'guests_included_price',
	),
)); ?>
