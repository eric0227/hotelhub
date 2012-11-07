<?php
$this->breadcrumbs=array(
	'Hotel Images'=>array('index'),
	$model->id_image=>array('view','id'=>$model->id_image),
	'Update',
);

$this->menu=array(
	array('label'=>'List HotelImage','url'=>array('index')),
	array('label'=>'Create HotelImage','url'=>array('create')),
	array('label'=>'View HotelImage','url'=>array('view','id'=>$model->id_image)),
	array('label'=>'Manage HotelImage','url'=>array('admin')),
);
?>

<h1>Update HotelImage <?php echo $model->id_image; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>