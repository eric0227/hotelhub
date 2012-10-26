<?php
/* @var $this ProductRoomController */
/* @var $model ProductRoom */

$this->breadcrumbs=array(
	'Product Rooms'=>array('index'),
	$model->id_product_room=>array('view','id'=>$model->id_product_room),
	'Update',
);

$this->menu=array(
	array('label'=>'List ProductRoom', 'url'=>array('index')),
	array('label'=>'Create ProductRoom', 'url'=>array('create')),
	array('label'=>'View ProductRoom', 'url'=>array('view', 'id'=>$model->id_product_room)),
	array('label'=>'Manage ProductRoom', 'url'=>array('admin')),
);
?>

<h1>Update ProductRoom <?php echo $model->id_product_room; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>