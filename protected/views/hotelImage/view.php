<?php
$this->breadcrumbs=array(
	'Hotel Images'=>array('index'),
	$model->id_image,
);

$this->menu=array(
	array('label'=>'List HotelImage','url'=>array('index')),
	array('label'=>'Create HotelImage','url'=>array('create')),
	array('label'=>'Update HotelImage','url'=>array('update','id'=>$model->id_image)),
	array('label'=>'Delete HotelImage','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_image),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage HotelImage','url'=>array('admin')),
);
?>

<h1>View HotelImage #<?php echo $model->id_image; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id_image',
		'id_hotel',
		'position',
		'cover',
	),
)); ?>
