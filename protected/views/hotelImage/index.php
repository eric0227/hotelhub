<?php
/* @var $this HotelImageController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Hotel Images',
);

$this->menu=array(
	array('label'=>'Create HotelImage', 'url'=>array('create')),
	array('label'=>'Manage HotelImage', 'url'=>array('admin')),
);
?>

<h1>Hotel Images</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
