<?php
/* @var $this OrderStateController */
/* @var $model OrderState */

$this->breadcrumbs=array(
	'Order States'=>array('index'),
	$model->name=>array('view','id'=>$model->id_order_state),
	'Update',
);

$this->menu=array(
	array('label'=>'List OrderState', 'url'=>array('index')),
	array('label'=>'Create OrderState', 'url'=>array('create')),
	array('label'=>'View OrderState', 'url'=>array('view', 'id'=>$model->id_order_state)),
	array('label'=>'Manage OrderState', 'url'=>array('admin')),
);
?>

<h1>Update OrderState <?php echo $model->id_order_state; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>