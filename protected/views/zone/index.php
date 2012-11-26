<?php
$this->breadcrumbs=array(
	'Zones',
);

$this->menu=array(
	array('label'=>'Create Zone','url'=>array('create')),
	array('label'=>'Manage Zone','url'=>array('admin')),
);
?>

<h1>Zones</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
