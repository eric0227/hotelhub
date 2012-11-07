<?php
$this->breadcrumbs=array(
	'Order States',
);

$this->menu=array(
	array('label'=>'Create OrderState','url'=>array('create')),
	array('label'=>'Manage OrderState','url'=>array('admin')),
);
?>

<h1>Order States</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
