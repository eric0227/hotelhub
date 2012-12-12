<?php
$this->breadcrumbs=array(
	'Special Suppliers',
);

$this->menu=array(
	array('label'=>'Create SpecialSupplier','url'=>array('create')),
	array('label'=>'Manage SpecialSupplier','url'=>array('admin')),
);
?>

<h1>Special Suppliers</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
