<?php
$this->breadcrumbs=array(
	'Special Suppliers'=>array('index'),
	$model->id_supplier,
);

$this->menu=array(
	array('label'=>'List SpecialSupplier','url'=>array('index')),
	array('label'=>'Create SpecialSupplier','url'=>array('create')),
	array('label'=>'Update SpecialSupplier','url'=>array('update','id'=>$model->id_supplier)),
	array('label'=>'Delete SpecialSupplier','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_supplier),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage SpecialSupplier','url'=>array('admin')),
);
?>

<h1>View SpecialSupplier #<?php echo $model->id_supplier; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id_supplier',
		'id_service',
		'position',
	),
)); ?>
