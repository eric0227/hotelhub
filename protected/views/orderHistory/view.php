<?php
$this->breadcrumbs=array(
	'Order Histories'=>array('index'),
	$model->id_order_history,
);

$this->menu=array(
	array('label'=>'List OrderHistory','url'=>array('index')),
	array('label'=>'Create OrderHistory','url'=>array('create')),
	array('label'=>'Update OrderHistory','url'=>array('update','id'=>$model->id_order_history)),
	array('label'=>'Delete OrderHistory','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_order_history),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage OrderHistory','url'=>array('admin')),
);
?>

<h1>View OrderHistory #<?php echo $model->id_order_history; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id_order_history',
		'id_user',
		'id_order',
		'id_order_state',
		'date_add',
		'comment',
	),
)); ?>
