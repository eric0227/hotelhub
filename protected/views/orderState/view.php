<?php
/* @var $this OrderStateController */
/* @var $model OrderState */

$this->breadcrumbs=array(
	'Order States'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List OrderState', 'url'=>array('index')),
	array('label'=>'Create OrderState', 'url'=>array('create')),
	array('label'=>'Update OrderState', 'url'=>array('update', 'id'=>$model->id_order_state)),
	array('label'=>'Delete OrderState', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_order_state),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage OrderState', 'url'=>array('admin')),
);
?>

<h1>View OrderState #<?php echo $model->id_order_state; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_order_state',
		'invoice',
		'send_email',
		'color',
		'unremovable',
		'hidden',
		'logable',
		'delivery',
		'name',
		'template',
	),
)); ?>
