<?php
/* @var $this ProductImageController */
/* @var $model ProductImage */

$this->breadcrumbs=array(
	'Product Images'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ProductImage', 'url'=>array('index')),
	array('label'=>'Manage ProductImage', 'url'=>array('admin')),
);
?>

<h1>Create ProductImage</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>