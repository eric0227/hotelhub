<?php
$this->breadcrumbs=array(
	'Attribute Items'=>array('index'),
	$model->id_attribute_item,
);

$this->menu=array(
	array('label'=>'List AttributeItem','url'=>array('index')),
	array('label'=>'Create AttributeItem','url'=>array('create')),
	array('label'=>'Update AttributeItem','url'=>array('update','id'=>$model->id_attribute_item)),
	array('label'=>'Delete AttributeItem','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_attribute_item),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage AttributeItem','url'=>array('admin')),
);
?>

<h1>View AttributeItem #<?php echo $model->id_attribute_item; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id_attribute_item',
		'id_attribute',
		'item',
		'position',
	),
)); ?>
