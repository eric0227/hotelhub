<?php
/* @var $this HotelImageController */
/* @var $model HotelImage */

$this->breadcrumbs=array(
	'Hotel Images'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List HotelImage', 'url'=>array('index')),
	array('label'=>'Manage HotelImage', 'url'=>array('admin')),
);
?>

<h1>Create HotelImage</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>