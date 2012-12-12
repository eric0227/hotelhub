<?php
$this->breadcrumbs=array(
	'Special Products',
);

$this->menu=array(
	array('label'=>'Create SpecialProduct','url'=>array('create')),
	array('label'=>'Manage SpecialProduct','url'=>array('admin')),
);
?>

<h1>Special Products</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
