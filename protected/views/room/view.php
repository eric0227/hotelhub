<?php
$this->breadcrumbs=array(
	'Rooms'=>array('index'),
	$model->id_product,
);

$this->menu=array(
	array('label'=>'List Room','url'=>array('index')),
	array('label'=>'Create Room','url'=>array('create')),
	array('label'=>'Update Room','url'=>array('update','id'=>$model->id_product)),
	array('label'=>'Delete Room','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_product),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Room','url'=>array('admin')),
	array('label'=>'Room Images', 'url'=>array('/imageProduct/index','id_product'=>$model->id_product)),
	array('label'=>'Room Date', 'url'=>array('/productDate/index', 'id_product'=>$model->id_product))
);
?>

<h1>View Room #<?php echo $model->id_product; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id_product',
		'id_supplier',
		'room_code',
		'room_type_code',
		'lead_in_room_type',
		'full_rate',
		'min_night_stay',
		'max_night_stay',
		'room_name',
		'root_description',
		'guests_tot_room_cap',
		'guests_included_price',
		'children_maxnum',
		'children_years',
		'children_extra',
		'adults_maxnum',
		'adults_extra',
	),
)); ?>
