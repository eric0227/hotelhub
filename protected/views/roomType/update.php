<?php
/* @var $this RoomTypeController */
/* @var $model RoomType */

$this->breadcrumbs=array(
	'Room Types'=>array('index'),
	$model->name=>array('view','id'=>$model->id_room_type),
	'Update',
);

$this->menu=array(
	array('label'=>'List RoomType', 'url'=>array('index')),
	array('label'=>'Create RoomType', 'url'=>array('create')),
	array('label'=>'View RoomType', 'url'=>array('view', 'id'=>$model->id_room_type)),
	array('label'=>'Manage RoomType', 'url'=>array('admin')),
);
?>

<h1>Update RoomType <?php echo $model->id_room_type; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>