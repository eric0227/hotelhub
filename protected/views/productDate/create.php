<?php
/* @var $this ProductDateController */
/* @var $model ProductDate */

$this->breadcrumbs=array(
	'Product Dates'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ProductDate', 'url'=>array('index')),
	array('label'=>'Manage ProductDate', 'url'=>array('admin')),
);
?>

<h1>Create ProductDate</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>