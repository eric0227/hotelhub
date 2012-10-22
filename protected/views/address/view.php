<?php
/* @var $this AddressController */
/* @var $model Address */

$this->breadcrumbs=array(
	'Addresses'=>array('index'),
	$model->id_address,
);

$this->menu=array(
	array('label'=>'List Address', 'url'=>array('index')),
	array('label'=>'Create Address', 'url'=>array('create')),
	array('label'=>'Update Address', 'url'=>array('update', 'id'=>$model->id_address)),
	array('label'=>'Delete Address', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_address),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Address', 'url'=>array('admin')),
);
?>

<h1>View Address #<?php echo $model->id_address; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_address',
		'id_country',
		'id_state',
		'id_user',
		'address_code',
		'alias',
		'company',
		'lastname',
		'firstname',
		'address1',
		'address2',
		'postcode',
		'city',
		'other',
		'phone',
		'phone_mobile',
		'vat_number',
		'dni',
		'date_add',
		'date_upd',
		'active',
		'deleted',
	),
)); ?>
