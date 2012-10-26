<?php
/* @var $this ProductRoomController */
/* @var $model ProductRoom */

$this->breadcrumbs=array(
	'Product Rooms'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ProductRoom', 'url'=>array('index')),
	array('label'=>'Manage ProductRoom', 'url'=>array('admin')),
);
?>

<h1>Create ProductRoom</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>