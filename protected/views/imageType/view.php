<?php
$this->breadcrumbs=array(
	'Image Types'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List ImageType','url'=>array('index')),
	array('label'=>'Create ImageType','url'=>array('create')),
	array('label'=>'Update ImageType','url'=>array('update','id'=>$model->id_image_type)),
	array('label'=>'Delete ImageType','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_image_type),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ImageType','url'=>array('admin')),
);
?>

<h1>View ImageType #<?php echo $model->id_image_type; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id_image_type',
		'name',
		'width',
		'height',
		'quality',
		'sharpen',
		'rotate',
		'product',
		'supplier',
	),
)); ?>
