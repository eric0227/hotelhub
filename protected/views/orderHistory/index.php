<?php
$this->breadcrumbs=array(
	'Order Histories',
);

$this->menu=array(
	array('label'=>'Create OrderHistory','url'=>array('create')),
	array('label'=>'Manage OrderHistory','url'=>array('admin')),
);
?>

<h1>Order Histories</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
