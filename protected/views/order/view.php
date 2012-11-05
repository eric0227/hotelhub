<?php
/* @var $this OrderController */
/* @var $model Order */

$this->breadcrumbs=array(
	'Orders'=>array('index'),
	$model->id_order,
);

$this->menu=array(
	array('label'=>'List Order', 'url'=>array('index')),
	array('label'=>'Create Order', 'url'=>array('create')),
	array('label'=>'Update Order', 'url'=>array('update', 'id'=>$model->id_order)),
	array('label'=>'Delete Order', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_order),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Order', 'url'=>array('admin')),
);
?>

<h1>View Order #<?php echo $model->id_order; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_order',
		'id_lang',
		'id_user',
		'id_cart',
		'id_currency',
		'id_address_delivery',
		'id_address_invoice',
		'secure_key',
		'payment',
		'conversion_rate',
		'gift',
		'gift_message',
		'total_products',
		'total_discounts',
		'total_paid',
		'total_paid_real',
		'invoice_number',
		'delivery_number',
		'invoice_date',
		'delivery_date',
		'date_add',
		'date_upd',
	),
)); ?>
