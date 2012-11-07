<?php
$this->breadcrumbs=array(
	'Cart Products',
);

$this->menu=array(
	array('label'=>'Create CartProduct','url'=>array('create')),
	array('label'=>'Manage CartProduct','url'=>array('admin')),
);
?>

<h1>Cart Products</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
