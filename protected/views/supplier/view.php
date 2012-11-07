<?php
$this->breadcrumbs=array(
	'Suppliers'=>array('index'),
	$model->id_supplier,
);

$this->menu=array(
	array('label'=>'List Supplier','url'=>array('index')),
	array('label'=>'Create Supplier','url'=>array('create')),
	array('label'=>'Update Supplier','url'=>array('update','id'=>$model->id_supplier)),
	array('label'=>'Delete Supplier','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_supplier),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Supplier','url'=>array('admin')),
);
?>

<h1>View Supplier #<?php echo $model->id_supplier; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id_supplier',
		'manager_name',
		'manager_email',
		'sales_name',
		'sales_email',
		'reservations_name',
		'reservations_email',
		'reservations_phone',
		'reservations_fx',
		'accounts_name',
		'accounts_email',
		'accounts_phone',
		'accounts_fx',
		'supplier_abn',
		'member_chain_group',
		'room_count',
		'website',
	),
)); ?>
