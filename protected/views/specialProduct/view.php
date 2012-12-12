<?php
$this->breadcrumbs=array(
	'Special Products'=>array('index'),
	$model->id_product,
);

$this->menu=array(
	array('label'=>'List SpecialProduct','url'=>array('index')),
	array('label'=>'Create SpecialProduct','url'=>array('create')),
	array('label'=>'Update SpecialProduct','url'=>array('update','id'=>$model->id_product)),
	array('label'=>'Delete SpecialProduct','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_product),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage SpecialProduct','url'=>array('admin')),
);
?>

<h1>View SpecialProduct #<?php echo $model->id_product; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id_product',
		'id_service',
		'position',
	),
)); ?>
