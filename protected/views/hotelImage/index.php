<?php
$this->breadcrumbs=array(
	'Hotel Images',
);

$this->menu=array(
	array('label'=>'Create HotelImage','url'=>array('create')),
	array('label'=>'Manage HotelImage','url'=>array('admin')),
);
?>

<h1>Hotel Images</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
