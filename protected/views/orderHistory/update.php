<?php
$this->breadcrumbs=array(
	'Order Histories'=>array('index'),
	$model->id_order_history=>array('view','id'=>$model->id_order_history),
	'Update',
);

$this->menu=array(
	array('label'=>'List OrderHistory','url'=>array('index')),
	array('label'=>'Create OrderHistory','url'=>array('create')),
	array('label'=>'View OrderHistory','url'=>array('view','id'=>$model->id_order_history)),
	array('label'=>'Manage OrderHistory','url'=>array('admin')),
);
?>

<h1>Update OrderHistory <?php echo $model->id_order_history; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>