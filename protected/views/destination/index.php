<?php
$this->breadcrumbs=array(
	'Destinations',
);

$this->menu=array(
	array('label'=>'Create Destination','url'=>array('create')),
	array('label'=>'Manage Destination','url'=>array('admin')),
);
?>

<h1>Destinations</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
