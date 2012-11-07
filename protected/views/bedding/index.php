<?php
$this->breadcrumbs=array(
	'Beddings',
);

$this->menu=array(
	array('label'=>'Create Bedding','url'=>array('create')),
	array('label'=>'Manage Bedding','url'=>array('admin')),
);
?>

<h1>Beddings</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
