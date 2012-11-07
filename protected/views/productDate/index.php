<?php
$this->breadcrumbs=array(
	'Product Dates',
);

$this->menu=array(
	array('label'=>'Create ProductDate','url'=>array('create')),
	array('label'=>'Manage ProductDate','url'=>array('admin')),
);
?>

<h1>Product Dates</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
