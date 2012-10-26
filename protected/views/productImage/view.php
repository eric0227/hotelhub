<?php
/* @var $this ProductImageController */
/* @var $model ProductImage */

$this->breadcrumbs=array(
	'Product Images'=>array('index'),
	$model->id_image,
);

$this->menu=array(
	array('label'=>'List ProductImage', 'url'=>array('index')),
	array('label'=>'Create ProductImage', 'url'=>array('create')),
	array('label'=>'Update ProductImage', 'url'=>array('update', 'id'=>$model->id_image)),
	array('label'=>'Delete ProductImage', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_image),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ProductImage', 'url'=>array('admin')),
);
?>

<h1>View ProductImage #<?php echo $model->id_image; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_image',
		'id_product',
		'position',
		'cover',
	),
)); ?>
