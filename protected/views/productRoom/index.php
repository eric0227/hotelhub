<?php
/* @var $this ProductRoomController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Product Rooms',
);

$this->menu=array(
	array('label'=>'Create ProductRoom', 'url'=>array('create')),
	array('label'=>'Manage ProductRoom', 'url'=>array('admin')),
);
?>

<h1>Product Rooms</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
