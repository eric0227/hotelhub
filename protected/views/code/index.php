<?php
$this->breadcrumbs=array(
	'Codes',
);

$this->menu=array(
	array('label'=>'Create Code','url'=>array('create')),
	array('label'=>'Manage Code','url'=>array('admin')),
);
?>

<h1>Codes</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
