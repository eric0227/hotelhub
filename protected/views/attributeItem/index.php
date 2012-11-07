<?php
$this->breadcrumbs=array(
	'Attribute Items',
);

$this->menu=array(
	array('label'=>'Create AttributeItem','url'=>array('create')),
	array('label'=>'Manage AttributeItem','url'=>array('admin')),
);
?>

<h1>Attribute Items</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
