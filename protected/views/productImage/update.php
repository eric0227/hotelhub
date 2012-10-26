<?php
/* @var $this ProductImageController */
/* @var $model ProductImage */

$this->breadcrumbs=array(
	'Product Images'=>array('index'),
	$model->id_image=>array('view','id'=>$model->id_image),
	'Update',
);

$this->menu=array(
	array('label'=>'List ProductImage', 'url'=>array('index')),
	array('label'=>'Create ProductImage', 'url'=>array('create')),
	array('label'=>'View ProductImage', 'url'=>array('view', 'id'=>$model->id_image)),
	array('label'=>'Manage ProductImage', 'url'=>array('admin')),
);
?>

<h1>Update ProductImage <?php echo $model->id_image; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>