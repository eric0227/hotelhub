<?php
$this->breadcrumbs=array(
	'Images'=>array('index'),
	$model->id_image,
);

$this->menu=array(
	array('label'=>'List Image','url'=>array('index','id_product'=>$model->productImage->id_product)),
	array('label'=>'Create Image','url'=>array('create','id_product'=>$model->productImage->id_product)),
	array('label'=>'Update Image','url'=>array('update','id_product'=>$model->productImage->id_product,'id'=>$model->id_image)),
	array('label'=>'Delete Image','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_image),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Image','url'=>array('admin','id_product'=>$model->productImage->id_product)),
);
?>

<h1>View Image #<?php echo $model->id_image; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id_image',
		'image',
		'image_path',
		'image_title',
		'position',
		'cover',
	),
)); ?>
